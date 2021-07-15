<style>
div.gallery {
  border: 1px solid #4e73df;
  margin:3px;
  border-radius:5px;
  min-height: 63px;
  height: 200px;
 background-color:#c7dffc  ;
  position: relative;
}
.hide {
  display: none;
}

div.gallery:hover {
  border: 1px solid #4e73df;
  opacity:0.6 !important;
  filter:alpha(opacity=60) !important; /* For IE8 and earlier */
}

div.gallery:hover  .middle {

  opacity: 1;
}

.middle {
  transition: .5s ease;
  opacity: 0;
margin:0px;
  text-align: center;
}

.text {

  position: absolute;
  height:60px;
  background-color: #4e73df;
  color: black;
  font-size: 16px;
  padding: 16px 32px;
   bottom: 0px;
   width:100%;
  opacity:0.8!important;
  filter:alpha(opacity=80) !important; /* For IE8 and earlier */
}

div.gallery img {

padding:3px;
  width: 100%;
  height: auto;
  max-height: 200px;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 16.6666%;

}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>

<?php
include ('HTML_DOM_Parser/simple_html_dom.php');
require_once (__DIR__ . '/helpers.php');
$imageStep = 10;
$imageMaxBound = $imageStep;
$currentCntImages = 0;
$maxDocs = count($results->response->docs);
$currentDoc = 0;
?>
<div class="col-lg-12 mb-12">
  <div class="card shadow mb-4 border-left-primary ">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
           Search for images
      </h6>
    </div>
    <div class="card-body">
            <?php
while ($currentDoc <= $maxDocs) {
    $doc = $results->response->docs[$currentDoc++];
    if (!is_valid_result($doc)):
        continue;
    endif;
    if (validate_url($doc->id)) {
        extractShowImages($doc->id);
    }
    if ($currentCntImages > $imageMaxBound) {
        $imageMaxBound = $currentCntImages + $imageStep;
        break;
    }
}
?>
   </div>
  </div>
</div>
<div style="width:100%; text-align:center; margin:30px;">
        <input type="button" id="btn-submit" name="ShowMorePictures" class="btn btn-primary" value="Show more pictures" />
</div>
<?php
function extractShowImages($url) {
    global $currentCntImages;
    $html = file_get_html($url); //chosen page
    // Find all images
    $images = array();
    foreach ($html->find('img') as $element) {
        $cntimgs = substr_count($element->src, "//");
        if ($cntimgs > 1) {
            $mainSRC = $element->src;
            for ($x = 0;$x < $cntimgs;$x++) {
                if (validImageURL($mainSRC)) {
                    if (strpos($mainSRC, ".png") > 0) {
                        $startPos = strpos($mainSRC, ".png") + 4;
                    } elseif (strpos($mainSRC, ".jpg") > 0) {
                        $startPos = strpos($mainSRC, ".jpg") + 4;
                    } elseif (strpos($mainSRC, ".bmp") > 0) {
                        $startPos = strpos($mainSRC, ".bmp") + 4;
                    } elseif (strpos($mainSRC, ".gif") > 0) {
                        $startPos = strpos($mainSRC, ".gif") + 4;
                    }
                    $endPos = strrpos($mainSRC, "http");
                    $img = substr($mainSRC, ($startPos * -1), ($startPos - $endPos));
                    $mainSRC = substr($mainSRC, $endPos);
                    if (validImageURL($img) && !in_array($img, $images) && validImageURL($img)) {
                        $images[] = $img;
                    }
                }
            }
        } else {
            $img = $element->src;
            if (validImageElement($element) && validImageURL($img)) {
                $images[] = $img;
            }
        }
    }
        reset($images);
        $cntResultImages = count($images);
        $url_info = parse_url($url);
        $Website = $url_info['host'];
        foreach ($images as $out) {
            $currentCntImages++;
            $imgurl = (($out != "" && strpos($out, "//") == false) ? ("//" . $Website . '/' . $out) : ($out));
            $id = generateRandomString();
            echo '<div class="responsive" id="div_' . $id . '">
                      <div class="gallery">
                        <a target="_blank" href="' . $url . '" target="_blank">
                          <img src="' . $imgurl . '" alt="' . substrwords($url, 45) . '" width="600" height="400" onerror="document.getElementById(\'div_' . $id . '\').style.display=\'none\';" >
                          <div class="middle">
                            <div class="text">' . substrwords($url, 45) . '</div>
                          </div>
                        </a>
                      </div>
                    </div>';
    }
}
//----------------------------------------------------------------------------------------
function validate_url($url) {
    $path = parse_url($url, PHP_URL_PATH);
    $encoded_path = array_map('urlencode', explode('/', $path));
    $url = str_replace($path, implode('/', $encoded_path), $url);
    return filter_var($url, FILTER_VALIDATE_URL) ? true : false;
}
//----------------------------------------------------------------------------------------
function is_valid_result($doc) {
    $Result = $doc->content_type_ss;
    $result = true;
    if (!is_array($Result) && $Result == 'text/plain; charset=ISO-8859-1') $result = false;
    return $result;
}
//----------------------------------------------------------------------------------------
function validImageURL($url) {
    if ($url != "" && (strpos($url, ".png") > 0 || strpos($url, ".jpg") > 0 || strpos($url, ".bmp") > 0 || strpos($url, ".gif") > 0)) {
        return true;
    }
    return false;
}
//----------------------------------------------------------------------------------------
function validImageElement($element) {
    $width = $element->width;
    $height = $element->height;
    $src = $element->src;
    if ($width < 100 || $height < 100) {
        return false;
    }
    return true;
}
//----------------------------------------------------------------------------------------
function validImage($file) {
    $size = getimagesize($file);
    if ($size[0] == "" || $size[1] == "") return false;
    //if($size[0] < 200 || $size[1] <200) return false;
    return (strtolower(substr($size['mime'], 0, 5)) == 'image' ? true : false);
}
//----------------------------------------------------------------------------------------
function remote_file_exists($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($httpCode == 200) {
        return true;
    }
}
//----------------------------------------------------------------------------------------
?>
<script>
$.ajax({
        url: 'yourpage.php',
        type: 'POST',
        data:'',
        success: function(resp) {

        // put your response where you want to

        }
    });
</script>
