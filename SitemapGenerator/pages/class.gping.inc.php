<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.
$cbDCr78238604zEIaR = 873655387;
$OkgBX86174624UePKy = 492847048;
$FwwkM63020757CqQus = 972322898;
$HpzRD10674057riZjd = 809928385;
$ezIec42408220nGXyS = 318898601;
$JyCDF13423973iPeKK = 685681500;
$TxSKR29492172AsoKY = 627468259;
$FMHXz94997268xGyTE = 934105485;
$zlTmF74928475YsuWv = 906416369;
$Vrkbz24221851zkUuB = 355875221;
$RMgxV48958479QOGzx = 197802517;
$kvISi41422338WldlA = 606552887;
$BLCiU46312579SSvaC = 644875135;
$MTUsu11811730GpaNu = 207528787;
$oBuLM74999516AqGwj = 969833015;
$xuwHE94185016ywUwZ = 505815455;
$ReGjf77116490OXBzo = 64183984;
$vYgOD41687359shVWp = 125537588;
$mNUGK91298795zRper = 153412257;
$HQbSS39826532RaUkN = 639717872;
$TVLcM94487515XDZrl = 879271654;
$wVhqe32646183MgVHv = 71106493;
$PNlfg87147940RbKaa = 69484565;
$WECcf31244788pEUqL = 57199493;
$HmZMK33843788OIezR = 975336915;
$xPyvF43793462mztQB = 990916432;
$krcBW29110905wKXYh = 254113302;
$ORfGv26074935YiTpY = 796651699;
$TCiBW89000865ppgDs = 816327839;
$QttzA76784160VRpiE = 362846934;
$MFIRj91105497oOybz = 50845838;
$AyxxN35543296srSaf = 77362098;
$iMRxa36888111NCXPR = 764303151;
$ZrKrg36320625yKoHc = 594265254;
$vrmuE70644077rFccV = 630540038;
$JJqIe99694991JtViL = 702496938;
$YDcuM54746460jecoL = 910678412;
$oIjfL96103869DGYyq = 245062818;
$xKbIg92415193QuYTR = 945826304;
$VWWHw26726834JxXNx = 887028140;
$VFeqr93025738ljVFW = 738892134;
$OthQl19484559lFdsY = 906705803;
$ZzsDA43812766hEKbm = 225399253;
$MjYgI76450727pObSl = 947635371;
$jGdky69745276wpWNA = 817961186;
$cuUVd82422903eucGt = 503963920;
$znZMO77883323hnwZf = 159368719;
$kxEBG81340708OjkIx = 825434557;
$GuUdn25995958sfKBk = 381219945;
$bVpAB52895142eVSYO = 944286027;
?><?php
class GPing
{
    function AhXo3vl72tF($jKHq5jbZPMpZT9n, $fEQ80xe3KHkvIq6o = '')
    {
        global $UJjrKVyISUwJOP6Upz;
        $g2sFX7ucPlw        = file_get_contents(kcCfQtFpVZJPKL6zbkg . 'sitemap_ping.txt');
        $g2sFX7ucPlw        = preg_split('#[\r\n]+#', $g2sFX7ucPlw);
        $ORn8XCv2FFF        = preg_split('#[\r\n]+#', trim($fEQ80xe3KHkvIq6o));
        $jKHq5jbZPMpZT9n    = array_merge(is_array($jKHq5jbZPMpZT9n) ? $jKHq5jbZPMpZT9n : array(), $ORn8XCv2FFF);
        $XsYw0_DhetWENXRx_7 = array();
        foreach ($jKHq5jbZPMpZT9n as $XV0gvoTc_07MC9_O => $ri) {
            if ($ri && is_array($ri) && is_array($ri['urls']))
                foreach ($ri['urls'] as $IyV5q8r8QePF4DFx) {
                    foreach ($g2sFX7ucPlw as $kHNnX8KyJ)
                        if ($kHNnX8KyJ) {
                            $kHNnX8KyJ .= urlencode($IyV5q8r8QePF4DFx);
                            $XsYw0_DhetWENXRx_7[$kHNnX8KyJ] = $UJjrKVyISUwJOP6Upz->fetch($kHNnX8KyJ);
                        }
                }
        }
        return $XsYw0_DhetWENXRx_7;
    }
    function gakzL2qlEfyUipIs($IyV5q8r8QePF4DFx, $y_id)
    {
        global $UJjrKVyISUwJOP6Upz;
        for ($i = 0; $i < count($jKHq5jbZPMpZT9n); $i++) {
        }
    }
    function hWMOcx0nR9CM($i7PO5AADqTLxtcs0, $pWYHzkloHUs, $Z8F0gPCCw_jy)
    {
        global $UJjrKVyISUwJOP6Upz;
        $x_query     = '<?xml version="1.0"?' . '> <methodCall> <methodName>weblogUpdates.ping</methodName> <params> <param><value>' . $Z8F0gPCCw_jy . '</value></param> <param><value>' . $pWYHzkloHUs . '/</value></param> </params></methodCall>';
        $g2sFX7ucPlw = preg_split('#[\r\n]+#', $i7PO5AADqTLxtcs0);
        foreach ($g2sFX7ucPlw as $_u) {
            $ggSfQPKuLRcCeTz8sXn = $UJjrKVyISUwJOP6Upz->fetch($_u, 0, false, false, $x_query);
        }
    }
}
$TIWtskNLIUGOCDYo6nC = new GPing();

































































































