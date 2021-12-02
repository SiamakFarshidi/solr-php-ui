<?php session_start(); ?>

<?php
//echo CallAPI("POST", "http://localhost/search-apps/dataset_elastic/genericsearch?term=icos");
$searchCriteria = str_replace(' ', '%20', 'http://localhost/search-apps/dataset_elastic/genericsearch?term=' . $query);

//echo $searchCriteria;
$response = file_get_contents($searchCriteria);

//$arr=json_decode($response,true);
//var_dump($arr);
$total = count(json_decode($response, true));
$response = json_decode($response);
//var_dump($response);
$count = 0;
//echo $total;
$isSwitched = false;

// calculate stats
$start = min($start, $total);
$end = min($start + $limit - 1, $total);
$stat_limit = $limit;
if ($stat_limit > $total)
{
    $stat_limit = $total;
}
if ($limit > 0)
{
    $page = ceil($start / $limit);
    $pages = ceil($total / $limit);
}
else
{
    $page = 1;
    $pages = 1;
}

if ($total > $start + $limit - 1)
{
    $is_next_page = true;
    $link_next = buildurl($params, 's', $start + $limit);
}
else
{
    $is_next_page = false;
}
// if isprevpage build link
if ($start > 1)
{
    $is_prev_page = true;
    $link_prev = buildurl($params, 's', $start - $limit);
}
else
{
    $is_prev_page = false;
}

function RemoveSpecialChar($str)
{

    // Using str_replace() function
    // to replace the word
    $res = str_replace(array(
        '[',
        ']'
    ) , '', $str);

    // Returning the result
    return $res;
}
function limitTextWords($content = false, $limit = false, $stripTags = false, $ellipsis = false)
{
    if ($content && $limit)
    {
        $content = ($stripTags ? strip_tags($content) : $content);
        $content = explode(' ', $content, $limit + 1);
        array_pop($content);
        if ($ellipsis)
        {
            array_push($content, '...');
        }
        $content = implode(' ', $content);
    }
    return $content;
}
?>


<?php
if ($total == 0)
{
    print t('No results');
}
?>

<?php if ($total > 0): ?>

<div class="pages" style="width:100%; text-align:center; font-weight: bold; color:#035ba8; margin-bottom:10px;" >
   <span
     class="pagination-previous <?php if (!$is_prev_page):
        print 'disabled';
    endif; ?>">
     <?php if ($is_prev_page)
    { ?>
     <a onclick="waiting_on();" href="<?php print $link_prev; ?>">
       <?php
    } ?>
    <?php //print t('prev')

?>
       <?php if ($is_prev_page)
    { ?> <i class="fas fa-chevron-circle-left" style="font-size:large;"></i> </a> &nbsp; <?php
    } ?>
   </span>
   <span>
     <?php
    if (empty($query) and $start == 1)
    {
?>
       <?php echo t('newest_documents') ?>
       <?=$stat_limit ?>
       <?php echo t('newest_documents_of') ?>
       <?=$total ?>
       <?php echo t('newest_documents_of_total') ?>
       <?php
    }
    else
    {
?>
       <?php if ($view == "preview")
        { ?>
         <?php echo t('result'); ?>
         <?=$page ?>
         <?php echo t('result of'); ?>
         <?=$total ?>
       <?php
        }
        else
        { ?>
         <?php echo t('page'); ?>
         <?=$page ?>
         <?php echo t('page of'); ?>
         <?=$pages ?>
         (<?php echo t('results'); ?>
         <?=$start ?>
         <?php echo t('result to'); ?>
         <?=$end ?>
         <?php echo t('result of'); ?>
         <?=$total ?>
         )
         <?php
        }
    }
?>
   </span>
   <span
     class="pagination-next <?php if (!$is_next_page):
        print 'disabled';
    endif; ?>">
     <?php if ($is_next_page)
    { ?>
     <a onclick="waiting_on();" href="<?php print $link_next; ?>">

<?php
    }
?>

     <?php //print t('next')

?>
       <?php if ($is_next_page)
    { ?>&nbsp; <i class="fas fa-chevron-circle-right" style="font-size:large;"></i></a><?php
    } ?>
   </span>
</div>
<?php
endif; ?>
<div style="width:70%; display: inline-block;">
<?php
if ($total > 0):
    $geolocation = "";
    $currentGeolocation = "";
    $count = 0;
    foreach ($response as $result):

        $count++;

        if ($count < $start)
        {
            continue;
        }
        if ($count > $end)
        {
            break;
        }

        $longitude = explode(",", $result->longitude);
        $latitude = explode(",", $result->latitude);

        for ($x = 0;$x < count($longitude);$x++)
        {
            $geolocation = $geolocation . " L.marker([" . RemoveSpecialChar($latitude[$x]) . "," . RemoveSpecialChar($longitude[$x]) . "]).addTo(mymap)\n";
            if ($currentGeolocation == "")
            {
                $currentGeolocation = "[" . RemoveSpecialChar($latitude[$x]) . "," . RemoveSpecialChar($longitude[$x]) . "]";
            }
        }

?>
  <div class="col-lg-12 mb-12" id="<?=$result_nr
?>">
     <!-- Illustrations -->
     <div class="card shadow mb-4 border-left-primary ">
       <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">
           <a href="<?=$result->landing_page; ?>" target="_blank"> <?=$result->name; ?> </a>
         </h6>
       </div>
       <div class="card-body">
        <div style="margin-bottom:10px;" class="date"><?=$result->temporal; ?> </div>
        <div> <span class="facet-name"> Description </span> <span class="textualItem"> <?=limitTextWords($result->abstract, 100, true, true); ?></span> </div>
        <div> <span class="facet-name"> Distributor </span> <span class="textualItem"> <?=$result->distributor; ?></span> </div>
        <div> <span class="facet-name"> Station </span> <span class="textualItem"> <?=$result->station; ?></span> </div>
        <div> <span class="facet-name">Domain </span> <span class="textualItem"> <?=$result->genre; ?> </span> </div>

        <div>
            <span class="facet-name"> Related to </span>
            <?php
        $cnt = 0;
        $image = getIRImage($result->distributor);
        if ($image != "")
        {
            echo "<img style='max-width:100px; max-height:50px; width:auto; height:auto; padding:10px;' src='images/RIs/" . $image . "' />";
        }
        else
        {
            foreach ($result->keywords as $value):
                $image = getIRImage($value);
                if ($image != "")
                {
                    echo "<img style='max-width:100px; max-height:50px; width:auto; height:auto; padding:10px;' src='images/RIs/" . $image . "' />";
                    break;
                }
            endforeach;
        }
?>

       </div>
       <div> <span class="facet-name"> keywords </span> <span class="textualItem">
       <?php
        foreach ($result->keywords as $keyword)
        {
            $cnt++;
            if ($cnt > 15)
            {
                break;
            }
            echo "<span class='items'>" . $keyword . "</span>";
        } ?></span> </div>

</div>
</div>
</div>

   <?php
    endforeach;
endif;
?>
</div>



<?php if ($total > 0): ?>
<div style="width:29%; display:inline-block; border:1px solid lightgray; border-radius:3px;   box-shadow:0 0 2px 2px #EAEDED; margin-bottom:25px;" id="mapid">
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

<?php
    echo "<script>";
    echo "var mymap = L.map('mapid').setView(" . $currentGeolocation . ", 5);";
    echo "</script>";
?>

<script>


       L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
               maxZoom: 18,
               attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                       'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
               id: 'mapbox/streets-v11',
               tileSize: 512,
               zoomOffset: -1
       }).addTo(mymap);

</script>
<?php
    echo "<script>";
    echo $geolocation;
    echo "</script>";
?>

<div class="pages" style="width:100%; text-align:center; font-weight: bold; color:#035ba8;" >
   <span
     class="pagination-previous <?php if (!$is_prev_page):
        print 'disabled';
    endif; ?>">
     <?php if ($is_prev_page)
    { ?>
     <a onclick="waiting_on();" href="<?php print $link_prev; ?>">
       <?php
    } ?>
    <?php //print t('prev')

?>
       <?php if ($is_prev_page)
    { ?> <i class="fas fa-chevron-circle-left" style="font-size:large;"></i> </a> &nbsp; <?php
    } ?>
   </span>
   <span>
     <?php
    if (empty($query) and $start == 1)
    {
?>
       <?php echo t('newest_documents') ?>
       <?=$stat_limit ?>
       <?php echo t('newest_documents_of') ?>
       <?=$total ?>
       <?php echo t('newest_documents_of_total') ?>
       <?php
    }
    else
    {
?>
       <?php if ($view == "preview")
        { ?>
         <?php echo t('result'); ?>
         <?=$page ?>
         <?php echo t('result of'); ?>
         <?=$total ?>
       <?php
        }
        else
        { ?>
         <?php echo t('page'); ?>
         <?=$page ?>
         <?php echo t('page of'); ?>
         <?=$pages ?>
         (<?php echo t('results'); ?>
         <?=$start ?>
         <?php echo t('result to'); ?>
         <?=$end ?>
         <?php echo t('result of'); ?>
         <?=$total ?>
         )
         <?php
        }
    }
?>
   </span>
 <span
     class="pagination-next <?php if (!$is_next_page):
        print 'disabled';
    endif; ?>">
     <?php if ($is_next_page)
    { ?>
     <a onclick="waiting_on();" href="<?php print $link_next; ?>">
       <?php
    } ?>
     <?php //print t('next')

?>
       <?php if ($is_next_page)
    { ?>&nbsp; <i class="fas fa-chevron-circle-right" style="font-size:large;"></i></a><?php
    } ?>
   </span>
</div>


<?php
endif; ?>
<php?
//----------------------------------------------------------------------------------------------------------------------
function CallAPI($method, $url, $data = false)
{
   $curl = curl_init();

   switch ($method)
   {
       case "POST":
           curl_setopt($curl, CURLOPT_POST, 1);

           if ($data)
               curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
           break;
       case "PUT":
           curl_setopt($curl, CURLOPT_PUT, 1);
           break;
       default:
           if ($data)
               $url = sprintf("%s?%s", $url, http_build_query($data));
   }

   // Optional Authentication:
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   curl_setopt($curl, CURLOPT_USERPWD, "username:password");

   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

   $result = curl_exec($curl);

   curl_close($curl);

   return $result;
}

?>
