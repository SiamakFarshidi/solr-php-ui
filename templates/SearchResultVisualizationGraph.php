
<?php
session_start();
require_once(__DIR__ . '/helpers.php');
$result_nr = 0;

 $RI_List = array();
 $WebsiteList = array();
 $WebpageList = array();
 $Website_RI_List=array();

 $str_genralInfo="";

 $str_website_RI_class="";
 $str_website_RI_classAttribute="";

 $str_property="";
 $str_propertyAttribute="";

foreach ($results->response->docs as $doc):

  if(!is_valid_result($doc)) continue;

    //---------------------------------------------------- Extract knowledge (1)
    $result_nr++;
    $id = $doc->id;
    $container = isset($doc->container_s) ? $doc->container_s : NULL;
    list ($url_display, $url_display_basename, $url_preview, $url_openfile, $url_annotation, $url_container_display, $url_container_display_basename) = get_urls($doc->id, $container);
    $url_prioritize = NULL;
    //---------------------------------------------------- Extract knowledge (2)
    $Website= getBaseURL($doc);
    $RIs = getResearchInfrastructures($result_nr,$doc, $cfg);
    $Webpage_title = getTitle($doc);
    $Webpage_Url=$url_openfile;
    $Webpage_description=getBriefDescription($doc, $cfg, $results, $result_nr,$results->highlighting->$id->content_txt);
    //----------------------------------------------------

    if($view=='VisualizeWebpages'){

        $Website=trim(str_replace(array("\r", "\n",","), '',html_entity_decode((strlen($Webpage_title)>20? substr($Webpage_title,0, 20)."...": $Webpage_title), ENT_QUOTES, "UTF-8")));
        $WesiteDescrition="";//$Webpage_description;
        $Website_URL=$Webpage_Url;
    }
    else{
        $Website_URL=$Webpage_Url;
        $WesiteDescrition="Please visit the website for more information: " . $Website_URL;
    }


        if($Website!="" and !in_array($Website,$WebsiteList)){
            array_push($WebsiteList,$Website);
            $str_website_RI_class= (strlen($str_website_RI_class)>0 ? $str_website_RI_class ."," : "") . '{"id" : "'.$Website.'", "type" : "owl:Class" } ';
            $str_website_RI_classAttribute=(strlen($str_website_RI_classAttribute)>0 ? $str_website_RI_classAttribute ."," : "") . '{ "label" : "'.$Website.'", "id" : "'. $Website.'" ,
            "comment" : {"en" : "'. $WesiteDescrition .'"}, "iri": "'. $Website_URL.'"  }';
        }

    foreach ($RIs as $RI):
        if($RI!="" and !in_array($RI,$RI_List)){
            array_push($RI_List,$RI);
            $str_website_RI_class= (strlen($str_website_RI_class)>0 ? $str_website_RI_class ."," : "") . '{"id" : "'.$RI.'", "type" : "rdfs:Datatype" }';
            $str_website_RI_classAttribute=(strlen($str_website_RI_classAttribute)>0 ? $str_website_RI_classAttribute ."," : "") . '{ "label" : "'.$RI.'", "id" : "'. $RI.'" }';
        }
        $Website_RI_List[$Website][$RI]++;
    endforeach;
endforeach;

$sum=0;
foreach ($WebsiteList as $W):
    foreach ($RI_List as $I):
        if(isset($Website_RI_List[$W][$I])){

            $sum++;
            $propertyTitle=$W."_".$I;
            $str_property= (strlen($str_property)>0 ? $str_property ."," : "") . '{"id" : "'.$propertyTitle.'", "type" : "owl:objectProperty" }';
            $str_propertyAttribute= (strlen($str_propertyAttribute)>0 ? $str_propertyAttribute ."," : "") .
            '{ "id": "'.$propertyTitle.'" , "domain" : "'.$W.'",  "range" : "'.$I.'", "label": "'.$Website_RI_List[$W][$I].'"}';
        }
    endforeach;
endforeach;

GenerateJSONFileVisualization( $str_website_RI_class,
                           $str_website_RI_classAttribute,
                           $str_property,
                           $str_propertyAttribute,
                           count($WebsiteList),
                           count($RI_List),
                           count($WebpageList),
                           $sum,
                           (count($WebsiteList) + count($RI_List)),
                           '0',
                           "Visualization of the search results.",
                           $query,
                           "OntologyVisualization/data/foaf.json" );



echo "<script> window.open('/OntologyVisualization/OntologyVisualization.php','_self'); </script>";

//----------------------------------------------------------------------------------------
function is_valid_result($doc) {
    $Result=$doc->content_type_ss;
    $result=true;
    if(!is_array($Result) && $Result=='text/plain; charset=ISO-8859-1')
        $result=false;
    return $result;
}
//----------------------------------------------------------------------------------------

function getBaseURL($doc){
  $MainWebsite="";
  if(isset($doc->id)){
     $MainWebsite=$doc->id;
  }
  $url_info = parse_url($MainWebsite);
  return $url_info['host'];//hostname
}
//----------------------------------------------------------------------------------------
function getTitle($doc){
    return format_title($doc->title_txt, $url_display_basename);
}
//----------------------------------------------------------------------------------------
function getDateTime($doc){
  // Modified date
  $datetime = FALSE;
  if (isset($doc->file_modified_dt)) {
    $datetime = $doc->file_modified_dt;
  }
  elseif (isset($doc->last_modified)) {
    $datetime = $doc->last_modified;
  }
  return $datetime;
}
//----------------------------------------------------------------------------------------
function getResearchInfrastructures($result_nr, $doc, $cfg){
    $CurrentFacets=array();
    $facets = get_facets($result_nr, $doc, $cfg['facets']);
    foreach ($facets as $field => $facet):
              foreach ($facet['values'] as $value):
                $val=FacetsPreprocessing($value['value'],$facet['name']);
                if($val!="" and !in_array($val,$CurrentFacets))
                {
                    array_push($CurrentFacets,$val);
                }
              endforeach;
             if (!empty($facet['more-values'])):
                  foreach ($facet['more-values'] as $value):
                       $val=FacetsPreprocessing($value['value'],$facet['name']);
                        if($val!="" and !in_array($val,$CurrentFacets))
                        {
                            array_push($CurrentFacets,$val);
                        }
                endforeach;
                endif;
    endforeach;
    return $CurrentFacets;
}
//----------------------------------------------------------------------------------------
function getAuthors($doc){
    if (is_array($doc->author_ss)) {
        $authors = $doc->author_ss;
    } else {
        $authors = array($doc->author_ss);
    }

    return $authors;
}
//----------------------------------------------------------------------------------------
function getBriefDescription($doc, $cfg, $results, $result_nr,$content_txt){

      $snippets = array();

      if (isset($content_txt)) {
        $snippets = $content_txt;
      }


      foreach ($cfg['languages'] as $language) {
        $language_specific_fieldname = 'content_txt_' . $language;
        if (isset($results->highlighting->$id->$language_specific_fieldname)) {
          $snippets = $results->highlighting->$id->$language_specific_fieldname;
        }
      }

      if (count($snippets) === 0) {
        if (isset($results->highlighting->$id->ocr_t)) {
          $snippets = $results->highlighting->$id->ocr_t;
        }
		}

      if (count($snippets) === 0 && isset($doc->content_txt)) {
        // if no snippets available, use content as snippet
        $snippets = array($doc->content_txt);
        // and cut it to snippet size
        if (strlen($snippets[0]) > $cfg['snippetsize']) {
          $snippets[0] = substr($snippets[0], 0, $cfg['snippetsize']) . "...";
        }
      }
      $snippets = get_snippets($result_nr, $snippets);

      $briefDescription="";

      foreach ($snippets['values'] as $snip):
        if( strlen($snip['value'])>5){
            $briefDescription= $briefDescription . $snip['value'];
        }
      endforeach;

      return  $briefDescription;
}
//----------------------------------------------------------------------------------------
function GenerateJSONFileVisualization($class, $classAttribute, $property, $propertyAttribute,
                                       $classCount, $datatypeCount, $objectPropertyCount, $propertyCount,
                                       $nodeCount, $individualCount, $description, $querytitle, $filename){
    $str_genralInfo='
      "_comment" : " '. $querytitle .'",
      "header" : {
        "languages" : [ "en"],
        "baseIris" : [ "http://www.w3.org/2000/01/rdf-schema", "http://visualdataweb.de/test_cases_vowl/ontology/72" ],
        "iri" : "",
        "version" : "1.0",
        "author" : [],
        "description" : {
          "undefined" : "'. $description .'"
        },
        "title" : {
          "undefined" : "Search query: '. $querytitle .'"
        }
      },
      "namespace" : [ ],
      "metrics" : {
        "classCount" : '   . $classCount .',
        "datatypeCount" : '. $datatypeCount .',
        "objectPropertyCount" : '. $objectPropertyCount .',
        "propertyCount" : '. $propertyCount .',
        "nodeCount" : '    . $nodeCount .',
        "individualCount" : '. $individualCount .'
      }';

    $JSON_File='
    { '. $str_genralInfo. ',
     "class" : ['. $class .'],
     "classAttribute" : ['. $classAttribute .'],
     "property" : ['. $property .'],
     "propertyAttribute" : ['. $propertyAttribute .']
    }';

    //echo $JSON_File;

    $myfile = fopen($filename, "w") or die("Unable to open file!");
    fwrite($myfile, $JSON_File);
    fclose($myfile);
}
//----------------------------------------------------------------------------------------



?>



