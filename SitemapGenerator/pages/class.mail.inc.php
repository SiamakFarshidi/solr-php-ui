<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.


$yPQFf96258145pXJVK = 254132786;
$fSiHP13680465dJtci = 216877916;
$TVpbe90205285iuYyd = 971305088;
$KWtDh12030190wyYKc = 457404247;
$eudGc82705004pZnsS = 120524238;
$QYKBx47894498hmJUa = 599674057;
$BVEnS27073181PchVl = 889929374;
$nNMNi31698834UAYSy = 959166395;
$DSMml28655172BewBY = 646576855;
$loWFV48022094faETs = 877297006;
$NTfny29819427liOil = 387269647;
$WcwFA77411223gFHyp = 445566894;
$XkLxY26446986nQIEW = 348262946;
$kVGwS69322145FdlIO = 235849887;
$YWWvs69413240hxxjJ = 530145681;
$RZpMK52506073nJWad = 198531555;
$bfQBm27564367VFLjT = 498600334;
$cABhA97871809iZedv = 603596928;
$dZpKf26756650nOacX = 563081696;
$jdFFi96114115hAvLI = 314203335;
$zMTWp64519208Xwwht = 299127885;
$cZXfW48894946ZdlVb = 181486784;
$MsWxx80402604OSPzT = 861745746;
$ETYQy53611988YXmSF = 473805100;
$FhwuG11780701TvuYB = 230131450;
$aiuPT25133865rqmxk = 163675710;
$CvqoV20021846aKSNp = 670014615;
$bJATZ95402235GiTZd = 206506892;
$aujaA96094752cZjzd = 489342804;
$HdcBZ49612738fXGom = 948448841;
$twKIq67706319cWVNQ = 32572816;
$HFBJw17080355ypoNb = 253398735;
$DLwgG58153372jDcso = 707727093;
$bjrkl83545960jXDKu = 935154107;
$kXtFO10431729RevZU = 197273606;
$Elslb66337267bKeYu = 883159074;
$aCyiJ50909370cPqiP = 865445326;
$tOvHl36079953UtBUY = 739132775;
$JIKns30477181DtivN = 804872311;
$YhvJL82449498hOLiO = 872834336;
$ErhKM85695092VYRwx = 68347137;
$jCwrG55294550rnGpw = 931143673;
$jdlcw78207377hjJsj = 197189919;
$zZQWA92065378knpUF = 958951630;
$evLfT97468842rgSAS = 965076532;
$tVshm38563101IGOyu = 793985935;
$rBqpB86551676MLnvm = 779409811;
$WZBWF88498115laJPh = 93580013;
$iIJpo55255637dpbxA = 526119729;
$oEzwJ72650294fTPJX = 61370814; ?><?php class MailProcessor
{
    function f_5YCNuXN2T($faq4LIMFskkEoo8HlA, $lneDbS9SWfZ490C, $U5whEjcvpM, $HhgRfvZAG7O, $GOiEwMMKZAjEWWj6lI = '')
    {
        global $OGJB24eyeE, $grab_parameters;
        if (!$GOiEwMMKZAjEWWj6lI) $GOiEwMMKZAjEWWj6lI = strstr($U5whEjcvpM, '<html') ? 'text/html' : 'text/plain';
        if ($OGJB24eyeE) echo " - $lneDbS9SWfZ490C - \n$body\n\n\n";
        $ttqY7j8pk = 'iso-8859-1';
        $TxKaE5Hkwuyb7VAs = "From: " . $HhgRfvZAG7O . "\r\n" . "MIME-Version: 1.0\r\n";
        if ($GOiEwMMKZAjEWWj6lI == 'text/plain')
        {
            $TxKaE5Hkwuyb7VAs .= "Content-Type: $GOiEwMMKZAjEWWj6lI; charset=\"$ttqY7j8pk\";\r\n";
            $PhymBFU3xW8GRs5x = $U5whEjcvpM;
        }
        else
        {
            $TxKaE5Hkwuyb7VAs .= "Content-Type: text/html; charset=\"$ttqY7j8pk\";\r\n";
            $PhymBFU3xW8GRs5x = $U5whEjcvpM;
        }
        return @mail($faq4LIMFskkEoo8HlA, ($lneDbS9SWfZ490C) , $PhymBFU3xW8GRs5x, $TxKaE5Hkwuyb7VAs, $grab_parameters['xs_email_f'] ? '-f' . preg_replace('#^.*<(.*?)>.*#', '$01', $HhgRfvZAG7O) : '');
    }
    function pCcyQY5XZxAjOThaI()
    {
        $tz = date("Z");
        $eCoZNme1OKz = ($tz < 0) ? "-" : "+";
        $tz = abs($tz);
        $tz = ($tz / 3600) * 100 + ($tz % 3600) / 60;
        $Uy0NtNGQNTIP = sprintf("%s %s%04d", date("D, j M Y H:i:s") , $eCoZNme1OKz, $tz);
        return $Uy0NtNGQNTIP;
    }
}
class GenMail
{
    function r97fFTXfLn4K7($Jw6Vzo9vDDMLUc)
    {
        global $grab_parameters, $dJrwBWl4PG3TcV6XW;
        if (!$grab_parameters['xs_email']) return;
        $hNfgpQEOfpU9IQEr5zn = ($grab_parameters['xs_compress'] == 1) ? '.gz' : '';
        $k = count($Jw6Vzo9vDDMLUc['rinfo'] ? $Jw6Vzo9vDDMLUc['rinfo'][0]['urls'] : $Jw6Vzo9vDDMLUc['files']);
        $XydTb2hXSHyO = $mMI8zLsPjh = array();
        if ($grab_parameters['xs_webinfo'])
        {
            $_su = $grab_parameters['xs_smurl'] . $hNfgpQEOfpU9IQEr5zn;
            $XydTb2hXSHyO[] = "XML sitemap\n" . $_su;
            $mMI8zLsPjh[] = array(
                'sttl' => 'XML sitemap',
                'surl' => $_su
            );
        }
        if ($grab_parameters['xs_maketxt'])
        {
            $_su = ($grab_parameters['xs_sm_text_url'] ? '' : $dJrwBWl4PG3TcV6XW . '/') . UlOVtEq9IhpvJhr . $hNfgpQEOfpU9IQEr5zn;
            $XydTb2hXSHyO[] = "Text sitemap\n" . $_su;
            $mMI8zLsPjh[] = array(
                'sttl' => 'Text sitemap',
                'surl' => $_su
            );
        }
        if ($grab_parameters['xs_makehtml'])
        {
            $_su = $grab_parameters['htmlurl'];
            $XydTb2hXSHyO[] = "HTML sitemap\n" . $_su;
            $mMI8zLsPjh[] = array(
                'sttl' => 'HTML sitemap',
                'surl' => $_su
            );
        }
        if ($grab_parameters['xs_makeror'])
        {
            $_su = fuea0ABrAp4gOawa6p;
            $XydTb2hXSHyO[] = "ROR sitemap\n" . $_su;
            $mMI8zLsPjh[] = array(
                'sttl' => 'ROR sitemap',
                'surl' => $_su
            );
        }
        if ($grab_parameters['xs_imginfo'])
        {
            $XydTb2hXSHyO[] = "Images sitemap" . ($Jw6Vzo9vDDMLUc['images_no'] ? " (" . intval($Jw6Vzo9vDDMLUc['images_no']) . " images)\n" : "\n") . eCuhqSzChM3N90B2UJ('xs_imgfilename');
            $mMI8zLsPjh[] = array(
                'sttl' => 'Images sitemap',
                'sno' => $Jw6Vzo9vDDMLUc['images_no'],
                'surl' => eCuhqSzChM3N90B2UJ('xs_imgfilename')
            );
        }
        if ($grab_parameters['xs_videoinfo'])
        {
            $XydTb2hXSHyO[] = "Video sitemap" . ($Jw6Vzo9vDDMLUc['videos_no'] ? " (" . intval($Jw6Vzo9vDDMLUc['videos_no']) . " videos)\n" : "\n") . eCuhqSzChM3N90B2UJ('xs_videofilename');
            $mMI8zLsPjh[] = array(
                'sttl' => 'Video sitemap',
                'sno' => $Jw6Vzo9vDDMLUc['videos_no'],
                'surl' => eCuhqSzChM3N90B2UJ('xs_videofilename')
            );
        }
        if ($grab_parameters['xs_newsinfo'])
        {
            $XydTb2hXSHyO[] = "News sitemap" . ($Jw6Vzo9vDDMLUc['news_no'] ? " (" . intval($Jw6Vzo9vDDMLUc['news_no']) . " pages)\n" : "\n") . eCuhqSzChM3N90B2UJ('xs_newsfilename');
            $mMI8zLsPjh[] = array(
                'sttl' => 'News sitemap',
                'sno' => $Jw6Vzo9vDDMLUc['news_no'],
                'surl' => eCuhqSzChM3N90B2UJ('xs_newsfilename')
            );
        }
        if ($grab_parameters['xs_rssinfo'])
        {
            $XydTb2hXSHyO[] = "RSS feed" . ($Jw6Vzo9vDDMLUc['rss_no'] ? " (" . intval($Jw6Vzo9vDDMLUc['rss_no']) . " pages)\n" : "\n") . eCuhqSzChM3N90B2UJ('xs_rssfilename');
            $mMI8zLsPjh[] = array(
                'sttl' => 'RSS feed',
                'sno' => $Jw6Vzo9vDDMLUc['rss_no'],
                'surl' => eCuhqSzChM3N90B2UJ('xs_rssfilename')
            );
        }
        $RmxP4phzPnO3 = file_exists(kcCfQtFpVZJPKL6zbkg . 'sitemap_notify2.txt') ? 'sitemap_notify2.txt' : 'sitemap_notify.txt';
        $AMOmMyLZLmcb_gQ = file(kcCfQtFpVZJPKL6zbkg . $RmxP4phzPnO3);
        $s6Rz9q2ra9G3s4Mko = array_shift($AMOmMyLZLmcb_gQ);
        $NwgMyEE0A = implode('', $AMOmMyLZLmcb_gQ);
        $whnReUl5sID_8i = @parse_url($Jw6Vzo9vDDMLUc['initurl']);
        $KIUJV35VbJEaF = $whnReUl5sID_8i['host'];
        $vOJJSGvGoIjxz8dwb = array(
            'DATE' => date('j F Y, H:i', $Jw6Vzo9vDDMLUc['time']) ,
            'URL' => $Jw6Vzo9vDDMLUc['initurl'],
            'URL_DOMAIN' => $KIUJV35VbJEaF,
            'max_reached' => $Jw6Vzo9vDDMLUc['max_reached'],
            'PROCTIME' => ZeFlXonNC8A9nTqx($Jw6Vzo9vDDMLUc['ctime']) ,
            'PAGESNO' => $Jw6Vzo9vDDMLUc['ucount'],
            'PAGESSIZE' => number_format($Jw6Vzo9vDDMLUc['tsize'] / 1024 / 1024, 2) ,
            'SM_OTHERS' => implode("\n\n", $XydTb2hXSHyO) ,
            'SM_OTHERS_LIST' => $mMI8zLsPjh,
            'BROKEN_LINKS_NO' => count($Jw6Vzo9vDDMLUc['u404']) ,
            'BROKEN_LINKS' => (count($Jw6Vzo9vDDMLUc['u404']) ? count($Jw6Vzo9vDDMLUc['u404']) . " broken links found!\n" . "View the list: " . $dJrwBWl4PG3TcV6XW . "/index.php?op=l404" : "None found")
        );
        include alxOxyN3nuW_GHjHsq . 'class.templates.inc.php';
        $KVoa5l_QJrtwlS9fLm = new RawTemplate("pages/mods/");
        $KVoa5l_QJrtwlS9fLm->lVbpHLTUpjBJQ5DxbFG(ZbrcwwB3e6(kcCfQtFpVZJPKL6zbkg, 'sitemap_notify.txt'));
        if (is_array($ea = YtUbUOw8VmSbl0RZ($grab_parameters['xs_email_arepl'])))
        {
            $vOJJSGvGoIjxz8dwb = array_merge($vOJJSGvGoIjxz8dwb, $ea);
        }
        $KVoa5l_QJrtwlS9fLm->lrAQUcSn7HUtI7wDzKT($vOJJSGvGoIjxz8dwb);
        $bgITUmNT6 = $KVoa5l_QJrtwlS9fLm->parse();
        preg_match('#^([^\r\n]*)\s*(.*)$#is', $bgITUmNT6, $am);
        $s6Rz9q2ra9G3s4Mko = $am[1];
        $NwgMyEE0A = $am[2];
        $NwgMyEE0A = preg_replace('#\r?\n#', "\r\n", $NwgMyEE0A);
        $ilcUQ4jmQZD1rq = new MailProcessor();
        $ilcUQ4jmQZD1rq->f_5YCNuXN2T($grab_parameters['xs_email'], $s6Rz9q2ra9G3s4Mko, $NwgMyEE0A, $vOJJSGvGoIjxz8dwb['mail_from'] ? $vOJJSGvGoIjxz8dwb['mail_from'] : $grab_parameters['xs_email']);
    }
}
$t9ecPWbd28TZDsi_vT2 = new GenMail();

