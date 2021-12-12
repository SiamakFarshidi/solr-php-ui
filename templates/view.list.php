<?php
// Standard view: a list.
//
// Number of snippets initially displayed.
require_once (__DIR__ . '/helpers.php');

function is_valid_result($Result)
{
    $result = true;
    if (!is_array($Result) && $Result == 'text/plain; charset=ISO-8859-1') $result = false;
    return $result;
}

function get_icon($ResultFileType)
{
    $icon = "";

    if (is_array($ResultFileType)) $RType = $ResultFileType[0];
    else $RType = $ResultFileType;

    if ($RType == 'application/msword') $icon = 'images/MSWord.png';
    elseif ($RType == 'application/pdf') $icon = 'images/AdobePDF.png';
    elseif ($RType == 'application/vnd.openxmlformats-officedocument.presentationml.presentation') $icon = 'images/MSPowerPoint.png';
    else $icon = 'images/WWW.png';

    return $icon;
}

?>

<?php
$result_nr = 0;

$strSearchResultAnalysis="";

foreach ($results->response->docs as $doc):

    //*------------Modify----Begin
    //print_r($doc->content_type_ss);
    if (!is_valid_result($doc->content_type_ss)) continue;
    print_r("<br />");
    //*------------Modify----End



    $result_nr++;
    $id = $doc->id;
    $container = isset($doc->container_s) ? $doc->container_s : NULL;
    list($url_display, $url_display_basename, $url_preview, $url_openfile, $url_annotation, $url_container_display, $url_container_display_basename) = get_urls($doc->id, $container);

    $url_prioritize = NULL;

    if ($cfg['etl_status'] && $count_open_etl_tasks_extraction > - 1)
    {
        if (isset($doc->etl_file_b) && !isset($doc->etl_enhance_extract_text_tika_server_b))
        {
            $url_prioritize = "/search-apps/files/prioritize?url=" . rawurlencode($id);
        }
    }

    // Authors
    if (is_array($doc->author_ss))
    {
        $authors = $doc->author_ss;
    }
    else
    {
        $authors = array(
            $doc->author_ss
        );
    }

    // Title
    $title = format_title($doc->title_txt, $url_display_basename);

    // Modified date
    $datetime = false;
    if (isset($doc->file_modified_dt))
    {
        $datetime = $doc->file_modified_dt;
    }
    elseif (isset($doc->last_modified))
    {
        $datetime = $doc->last_modified;
    }

    $file_size = 0;
    $file_size_formated = '';
    // File size
    $file_size_field = 'Content-Length_i';
    if (isset($doc->$file_size_field))
    {
        $file_size = $doc->$file_size_field;
        $file_size_formated = filesize_formatted($file_size);
    }





?>
<div class="col-lg-12 mb-12" id="<?=$result_nr?>">
  <!-- Illustrations -->
  <div class="card shadow mb-4 border-left-primary ">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
          <a class="title" href="<?=$url_openfile?>" target="_blank">
            <img src='<?=get_icon($doc->content_type_ss) ?>' style="margin-right:5px;margin-top:-4px;" width='20' height='20'><?=$title ?>
          </a>
      </h6>
    </div>
    <div class="card-body">
     <div class="date"><?=$datetime?> </div>
        <div>
          <?php if ($file_size_formated): ?>
            <span class="size">(<?=$file_size_formated?>)</span>
          <?php endif; ?>
        </div>
        <div class="snippets">
          <?php if ($authors): ?>
            <div class="author"><?=htmlspecialchars(implode(", ", $authors)) ?></div>
          <?php endif; ?>
          <?php include 'templates/view.snippets.text.php';?>
        </div>
        <span class="facets">
        <?php
            $facets = get_facets($result_nr, $doc, $cfg['facets']);
            include 'templates/view.snippets.entities.php';
       ?>
        </span>

        <?php  include 'templates/view.commands.php'; ?>
   </div>
  </div>
</div>
<?php


    //-------------------------------------------------------------------------------------
    $strSearchResultAnalysis=$strSearchResultAnalysis.
                             $id .",".
                             $title .",".
                             $datetime.",".
                             implode(" - ", $facets).",".
                             "\n";
    //--------------------------------------------------------------------------------------
    echo $strSearchResultAnalysis;


endforeach; ?>
