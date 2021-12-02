<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.

$zPgXs27283659pXBGn = 253593982;
$QNabI55870648lMklr = 319393254;
$hcbzs42860984YeIHE = 567145907;
$dQxlk48369299QDbuQ = 105253972;
$Mstmd15196464BrzBp = 245585121;
$rADln77966914mhYOn = 933392588;
$whhfY53722413DOlTx = 700031365;
$cClvN57482236rbjLI = 390453345;
$fYLQk42128279rcdJN = 374811171;
$GUXJA80247455mbgel = 879835999;
$HLtVI41608207ekReB = 303784936;
$LTzYo29021768XfzcC = 123857420;
$VROFV50493850UtIKx = 871192741;
$CcJkE97641515kVPMK = 669017173;
$pxiVh44244090MkuQN = 478888461;
$BDypK55407936YGQDR = 713017605;
$GFdxv31795427IqfKJ = 631222335;
$ASLfi33421117DQwsk = 719238781;
$gsAgz22885730ArYUO = 888057727;
$cLLRt94792837aUteJ = 315890593;
$IiRIn41562547SSqLu = 211124700;
$UclAf52151231PtxrU = 604513695;
$QpwpA48869316bTwvY = 990359844;
$QenSl44429979VTVYE = 861249087;
$FGfpQ60531608aLqhl = 73580604;
$OukUR88268819BFUqr = 915419358;
$LlaFZ26041659QdGpw = 185112733;
$NZVHC35650410GZRTh = 438721013;
$YMQfv81099981EXQQT = 778403684;
$vjgNT88079820bGliW = 763854726;
$HlGlx34439495sbdWZ = 379359930;
$SPhcp46212709lnhHh = 559021634;
$FtluH16198096ToxGe = 109433388;
$cHhij27791097qAqBN = 88934502;
$OZtdq67197042uhIaa = 568527704;
$pVrpc81645891tFcQP = 379053561;
$aYqOk18056061ZAFIo = 946325141;
$zdimX52676786iWozi = 401440112;
$ZGxGd31957760EkASM = 23479023;
$rcvZk62907013yAhrB = 364124868;
$pGGqT79797651fduuV = 93031076;
$piQgt44393744KAefM = 693949316;
$hccoB42465199cFgMW = 377590104;
$BwIKH56224717PYxqH = 209203390;
$lHIsQ21203509ziAHM = 35889174;
$AWSkK65399582eDNSr = 150520591;
$YQjil26970775UodZa = 736511182;
$lEdYC81796972IRnTC = 291008137;
$XWBgE61053740iFBPQ = 738051299;
$kGqlE60931520MkBkw = 522142773;
include alxOxyN3nuW_GHjHsq . 'page-top.inc.php';


?>
<div id="sidenote">
<?php include alxOxyN3nuW_GHjHsq . 'page-sitemap-detail.inc.php'; ?>
</div>
<div id="shifted">
<h2><i class="material-icons inline-icon">view_module</i> Knowledge Ingestion Process</h2>

<?php
function get_http_request($uri, $time_out = 100, $headers = 0)
{
    $ch = curl_init(); // Initializing
    curl_setopt($ch, CURLOPT_URL, trim($uri)); // Set URI
    curl_setopt($ch, CURLOPT_HEADER, $headers); //Set Header
    curl_setopt($ch, CURLOPT_TIMEOUT, $time_out); // Time-out in seconds
    $result = curl_exec($ch); // Executing
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($httpCode != 200) {
        $result = ""; // Executing
    }
    curl_close($ch); // Closing the channel
    return $result;
}

$filename= UlOVtEq9IhpvJhr . $hNfgpQEOfpU9IQEr5zn;
$txtURLs = fopen($filename, "r") or die("Unable to open file!");

if ($txtURLs) {
    while (($line = fgets($txtURLs)) !== false) {
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
        $REST_API= $root."search-apps/api/index-web?uri=".$line;
        ?>

        <div class="inptitle"><?php echo get_http_request($REST_API); ?> </div>
        <h4><a href="<?php echo $line;?>" target="_blank"><?php echo $line; ?></a></h4>
        <?php
    }
}
fclose($txtURLs);


?>








<div class="inptitle">HTML SiteMap </div>
<h4><a href="<?php echo $grab_parameters[
    'htmlurl'
]; ?>"><?php echo $grab_parameters['htmlurl']; ?></a></h4>
<div class="inptitle">Text SiteMap </div>
<h4><a href="<?php echo UlOVtEq9IhpvJhr . $hNfgpQEOfpU9IQEr5zn; ?>"><?php
echo $grab_parameters['xs_sm_text_url'] ? '' : $dJrwBWl4PG3TcV6XW . '/';
echo UlOVtEq9IhpvJhr . $hNfgpQEOfpU9IQEr5zn;
?></a></h4>
<div class="inptitle">ROR SiteMap </div>
<h4><a href="<?php echo fuea0ABrAp4gOawa6p; ?>"><?php echo fuea0ABrAp4gOawa6p; ?></a></h4>
<?php
if ($Jw6Vzo9vDDMLUc['rinfo']) {
    $Jw6Vzo9vDDMLUc['files'] = array();
    foreach ($Jw6Vzo9vDDMLUc['rinfo'] as $XV0gvoTc_07MC9_O => $ri) {
        $Jw6Vzo9vDDMLUc['files'] = @array_merge(
            $Jw6Vzo9vDDMLUc['files'],
            $ri['urls']
        );
    }
}
$W4gG28CLjg = dirname($grab_parameters['xs_smname']) . '/';
for ($i = 0; $i < count($Jw6Vzo9vDDMLUc['files']); $i++) {

    $Xs6cbDJIR_Y0T8vQr2 = $Jw6Vzo9vDDMLUc['files'][$i];
    $fl = $W4gG28CLjg . basename($Xs6cbDJIR_Y0T8vQr2);
    $FQCkMbezKE8 = $i == 0 && count($Jw6Vzo9vDDMLUc['files']) > 1;
    $INTjZBuk9YJDNIv3tL = strstr($fl, '.gz')
        ? implode('', gzfile($fl))
        : tSVH9XRZbaKn($fl);
    ?>
<div class="inptitle"><?php echo $i + 1; ?>. XML SiteMap <?php echo $FQCkMbezKE8
    ? 'Index'
    : 'File'; ?></div>
<h4><a href="<?php echo $Xs6cbDJIR_Y0T8vQr2; ?>"><?php echo $Xs6cbDJIR_Y0T8vQr2; ?></a>
</h4>
<textarea style="width:100%;height:300px"><?php echo htmlspecialchars(
    $INTjZBuk9YJDNIv3tL
); ?></textarea>
<?php
}
?>
</div>
<?php include alxOxyN3nuW_GHjHsq . 'page-bottom.inc.php';
