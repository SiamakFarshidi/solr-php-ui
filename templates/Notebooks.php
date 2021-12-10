<?php session_start(); ?>

<?php
//echo CallAPI("GET", "http://localhost/search-apps/dataset_elastic/genericsearch?term=icos");

//echo $_SESSION["selectedFacets"];


if ( $query==""){
    $query="*";
}

$searchCriteria = str_replace(' ', '%20', 'http://localhost/search-apps/notebookSearch/genericsearch?term=' . $query);
//echo $searchCriteria;
$response = file_get_contents($searchCriteria);
//echo $response ;
$response = json_decode($response);


$total= count($response->hits);

if ($total == 0)
{
    print t('No results');
}
?>

<?php
if ($total > 0):?>
<div style="width:100%; padding-bottom:10px;  padding-left:20px; font-size:small;"> <i> <?php echo $total; ?> results found. </i></div>
<div style="width:100%; display: inline-block; ">

    <?php  foreach ($response->hits as $result) { ?>

      <div class="col-lg-12 mb-12" id="<?=$result_nr ?>">
        <div class="card shadow mb-4 border-left-primary ">
           <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">
               <a href="<?= $result->html_url ?>" target="_blank">  <?= $result->name ?> </a>
             </h6>
           </div>
           <div class="card-body">

                <div> <span class="facet-name"> Description </span> <span class="textualItem"> <?= $result->description ?></span> </div>
                <div> <span class="facet-name"> Size </span> <span class="textualItem"> <?= $result->size ?> KB</span> </div>
                <div> <a href="<?= $result->git_url ?>" target="_blank">  Github </a> </div>

            </div>
        </div>
      </div>

    <?php  } ?>
</div>
<?php endif; ?>




<?php

echo "<br/><br/><br/>";

//var_dump($response);

function getName($arr,$RI){
    $strResult="";

    foreach($arr as $value){
        $strResult= $strResult . $value. " . ";
    }

    $RI = getResearchInfrastructure($RI);

    if (strlen($strResult) > strlen($RI)){
        $strResult=str_replace($RI. " . ","",$strResult);
    }
    $strResult = limitTextWords($strResult, 20, true, true);
    $strResult=str_replace(" . [...]","...",$strResult);
    $strResult=str_replace(" [...]","...",$strResult);
    return $strResult;
}

function printPublishersFacets($response){
    if($response->aggregations->publisher->buckets != null){
        echo "<h5 style='color:#4e73df;'> Publishers: </h5>";
        foreach ($response->aggregations->publisher->buckets as $result) {
            if($result->doc_count>0){
                echo '<input  style="margin-right:3px" type="checkbox" id="FT__'.$result->key.'" name="'.$result->key.'" onclick="selectFacet();" '.checked($result->key).'>'.
                '<label style="vertical-align: middle;"  for="'.$result->key.'">'.
                 truncate($result->key,5,35) . "<span style='color:#6610f2;'> (" . $result->doc_count .")  </span> </label> <br/>" ;
            }
        }
        echo "<hr/>";
    }
}

function printmeasurementTechniqueFacets($response){
    if($response->aggregations->measurementTechnique->buckets != null){
        echo "<h5 style='color:#4e73df;'> Measurement Technique: </h5>";
        foreach ($response->aggregations->measurementTechnique->buckets as $result) {
            if($result->doc_count>0 and $result->key!="unknown"){
                echo '<input  style="margin-right:3px" type="checkbox" id="FT__'.$result->key.'" name="'.$result->key.'" onclick="selectFacet();" '.checked($result->key).'>'.
                '<label style="vertical-align: middle;"  for="'.$result->key.'">'.
                 truncate($result->key,5,50)  . "<span style='color:#6610f2;'> (" . $result->doc_count .")  </span> </label> <br/>" ;            }
        }
        echo "<hr/>";
    }
}

function printspatialCoverageFacets($response){
    if($response->aggregations->spatialCoverage->buckets != null){
        echo "<h5 style='color:#4e73df;'> Spatial Coverage: </h5>";
        foreach ($response->aggregations->spatialCoverage->buckets as $result) {
            if($result->doc_count>0){
                echo '<input  style="margin-right:3px" type="checkbox" id="FT__'.$result->key.'" name="'.$result->key.'" onclick="selectFacet();"'.checked($result->key).' >'.
                '<label style="vertical-align: middle;"  for="'.$result->key.'">'.
                 truncate($result->key,5,50)  . "<span style='color:#6610f2;'> (" . $result->doc_count .")  </span> </label> <br/>" ;            }
        }
        echo "<hr/>";
    }
}

function printthemeFacets($response){
    if($response->aggregations->theme->buckets != null){
        echo "<h5 style='color:#4e73df;'> Theme: </h5>";
        foreach ($response->aggregations->theme->buckets as $result) {
            if($result->doc_count>0){
                echo '<input  style="margin-right:3px" type="checkbox" id="FT__'.$result->key.'" name="'.$result->key.'" onclick="selectFacet();" '.checked($result->key).'>'.
                '<label style="vertical-align: middle;"  for="'.$result->key.'">'.
                 truncate($result->key,5,50)  . "<span style='color:#6610f2;'> (" . $result->doc_count .")  </span> </label> <br/>" ;            }
        }
        echo "<hr/>";
    }
}



function printRIFacets($response){
    if($response->aggregations->ResearchInfrastructure->buckets != null){
        echo "<h5 style='color:#4e73df;'> Research Infrastructure: </h5>";
        foreach ($response->aggregations->ResearchInfrastructure->buckets as $result) {
            if($result->doc_count>0){
                echo '<input  style="margin-right:3px" type="checkbox" id="FT__'.$result->key.'" name="'.$result->key.'"  onclick="selectFacet();" '.checked($result->key).' >'.
                '<label style="vertical-align: middle;"  for="'.$result->key.'">'.
                 truncate($result->key,5,50) . "<span style='color:#6610f2;'> (" . $result->doc_count .")  </span> </label> <br/>" ;            }
        }
        echo "<hr/>";
    }
}

function truncate($input, $maxWords, $maxChars) {
   $words = preg_split('/\s+/', $input);
   $words = array_slice($words, 0, $maxWords);
   $words = array_reverse($words);

   $chars = 0;
   $truncated = array();

   while (count($words) > 0) {
      $fragment = trim(array_pop($words));
      $chars += strlen($fragment);

      if ($chars > $maxChars) break;

      $truncated[] = $fragment;
   }

   $result = implode($truncated, ' ');

   if ($input == $result) {
      return $input;
   } else {
      return preg_replace('/[^\w]$/', '', $result).
      '...';
   }
}


function checked($id){
 $facetList= explode("&", $_SESSION["selectedFacets"]);
 foreach ($facetList as $key){
    if($key==$id){
        return "checked";
    }

 }
 return "";
}

function getspatialCoverage($arr){
    $strResult="";
    foreach($arr as $value){
        $strResult= $strResult . $value. " . ";
    }
    $strResult = limitTextWords($strResult, 200, true, true);
    return $strResult;
}

function getResearchInfrastructure($arr){
    $strResult="";
    foreach($arr as $value){
        $strResult= $strResult . $value;
    }
    return $strResult;
}

function getRILogo($arr){
    $strResult="";


    foreach($arr as $value){
        $image = getIRImage($value);
        if ($image != "")
        {
            $strResult = $strResult . "<img style='max-width:100px; max-height:40px; width:auto; height:auto; padding:10px;' src='images/RIs/" . $image . "' />";
        }
    }

    return $strResult;
}


function getURL($arr){
    $strResult="";


    foreach($arr as $value){
        $strResult= $strResult . preg_replace('/json$/', '', $value);
    }
    return $strResult;
}

function getEssentialVariables($arr){
    $strResult="";
    foreach($arr as $value){
        $strResult= $strResult . $value. " . ";
    }
    $strResult = limitTextWords($strResult, 100, true, true);
    return $strResult;
}

function getPotentialTopics($arr){
    $strResult="";
    foreach($arr as $value){
        $strResult= $strResult . $value. ", ";
    }
    $strResult = limitTextWords($strResult, 100, true, true);
    return $strResult;
}



function getDescription($arr){
    $strResult="";
    foreach($arr->description as $value){
        $strResult= $strResult . $value. " . ";
    }
    foreach($arr->abstract as $value){
        $strResult= $strResult . $value. " . ";
    }
    foreach($arr->abstract as $value){
        $strResult= $strResult . $value. " . ";
    }

    $strResult = limitTextWords($strResult, 150, true, true);
    return $strResult;
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
            array_push($content, '[...]');
        }
        $content = implode(' ', $content);
    }
    return $content;
}
?>

<script type="text/javascript"
src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js">
</script>

<script type="application/javascript">
function selectFacet(){
    facets=""
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');

    for (var i = 0; i < checkboxes.length; i++) {
        if(checkboxes[i].id.substring(0,4)=="FT__"){
            facets= facets+ "&"+ checkboxes[i].id.substring(4);
        }
    }
    facets=facets.substring(1);
    //alert(facets.substring(1));

        $.ajax
        ({
            url:"templates/datasetSearch.php",
            data: {"selectedFacets": facets},
            type: 'POST',
            success: function(result)
            {
            location.reload();
                //alert(result);
            }
        });
    //alert(facets.substring(1));
}
</script>