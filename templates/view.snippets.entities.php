<?php
$CurrentFacets=array();


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

if(count($CurrentFacets)>0):
     ?>
     <span class="facet-name" title="<?= $facet['title'] ?>"> Related to <span style="display:none;"><?= $facet['name'] ?></span> </span>
     <?php
     foreach ($CurrentFacets as $value):
          echo "<img style='max-width:100px; max-height:50px; width:auto; height:auto; padding:10px;' src='images/RIs/". getIRImage($value). "' />" ;
    endforeach;
endif;
?>

