<?php
session_start();

if((!isset($_SESSION['role']) || $_SESSION['role']!="admin")) {
    header('location: /RegistrationSystem/login.php');
    exit;
}
?>

<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.

$Mbzhc23425399ABwCP = 846370729;
$BdDEl14182150fYamB = 316135337;
$HWVWI81833590gGDWS = 211360256;
$cvVuq50607015Cjqiy = 839137784;
$ZMIPj38982875wzfLf = 41327614;
$jkVYo55548489lvlNR = 978131514;
$ieMhM94428392eSnva = 436675048;
$NSWDt99811163PEWfA = 592101399;
$IBEBe86021588UEsRR = 953682629;
$YpGum64905795BcszX = 596406223;
$IYNbv94893390kTDRq = 461347255;
$hSIFt58826637IYLYq = 531296143;
$VQgfD27320836Lzicg = 130332136;
$eJNIZ42696225znbfK = 358996483;
$gRMos45970046LkRjA = 740479869;
$xrquV89993231WzDqK = 718713969;
$qbojs36851856kTlii = 163270476;
$NpTDv35835541IVZNC = 697030758;
$HqPST78182997KTBKy = 681718091;
$YrAOi74740356DxAGl = 492130592;
$jsnlF41700759zbXvD = 913008305;
$NCnJX54278042ysrPy = 166160259;
$LkUSG62419143XmkUi = 609248603;
$FLrnV60445697BmNJP = 636817278;
$gPTRC71087407trRLS = 398728308;
$tYrkM63063798xRcCq = 498326176;
$nDsVW44429939gCtFU = 419766572;
$hHWer82721391YvwAK = 338637292;
$DtRKK31173663ycxLa = 955780809;
$OHqVZ38447423HqaAq = 95514730;
$pLGFj75535294pLLbb = 134119563;
$VtVwz52112065kKLWv = 306646058;
$TlrLn35094153yWtFZ = 431900713;
$XmHiJ87770445RGQHJ = 43013916;
$KAZrI88747750vuMtH = 533740753;
$Yytoe46271023mffjY = 523562208;
$yINlY90433331Vljhq = 767878876;
$rhZDY28995749wwoTR = 330875617;
$nCqtF23134700GupvP = 82024658;
$qqaAF60563114JKDkZ = 535446006;
$WvwKg49672416nYsrm = 432251801;
$JZlNE56722514DtIkL = 105936104;
$xFZsC35964504jZEYH = 684567924;
$ZAcsa13353125Jaxsj = 292339189;
$vsnDj58677148qCxBF = 972824645;
$ygVeB77415248WNAXw = 693811455;
$jelAd87867195ljHXD = 549873284;
$sjpMS71740879HGxlf = 781621850;
$toDvF40239688pRncM = 314019950;
$bTFoV30266922IxvSf = 876499117; ?><?php chdir(dirname(__FILE__));
if (function_exists('date_default_timezone_set')) date_default_timezone_set('UTC');
function IevOCYlytGcCQ8($k0K05Nwd4cbWmAg)
{
    $rt = 'array(';
    foreach ($k0K05Nwd4cbWmAg as $k => $v) $rt .= " '$k' => '" . addslashes($v) . "',";
    $rt .= ")";
    return $rt;
}
error_reporting(E_ALL & ~E_NOTICE);
define('xWWNTi1WTTWWOIae', 'f.snefuvqv@hh.ay');
define('JmVPqeBlJ9VG67ljZ', '2020-11-02 05:30:40');
@ini_set("serialize_precision", 5);
define('SJOvDnZG6', 'crawl_dump.log');
define('ZKQmr7OJR5Al2APqoaS', 'crawl_dump_resume.log');
define('EZOR9LhvVo7xa', 'crawl_state.log');
define('HayIm8PnU', 'crawl_state_bak.log');
define('N0MW0Wx6mQ', 'interrupt.log');
define('Kt69SyBdFiG3ZhzUw', dirname(__FILE__) . '/');
define('alxOxyN3nuW_GHjHsq', dirname(__FILE__) . '/pages/');
define('kcCfQtFpVZJPKL6zbkg', dirname(__FILE__) . '/pages/mods/');
define('EffLzh0BqzXhKyn9', 49867);
include Kt69SyBdFiG3ZhzUw . 'pages/class.utils.inc.php';
preg_match('#index\.([a-z0-9]+)(\(.+)?$#', __FILE__, $pm);
$pId7e_Vb8ad5dUypyP = $pm[1] ? $pm[1] : 'php';
define('WXtFZyFgo0Q', dirname(__FILE__) . '/default.conf');
if (function_exists('ini_set')) @ini_set("magic_quotes_runtime", 'Off');
$grab_parameters = isset($grab_parameters) ? $grab_parameters : array();
if (isset($grab_parameters['xs_password'])) $grab_parameters['xs_password'] = md5($grab_parameters['xs_password']);
dtsOCLvIeYMEsoGb(WXtFZyFgo0Q, $grab_parameters, true);
if (!defined('bvxoWXIyZCcaoVlsa')) define('bvxoWXIyZCcaoVlsa', isset($grab_parameters['xs_datfolder']) ? $grab_parameters['xs_datfolder'] : dirname(__FILE__) . '/data/');
define('UsDwe8sQl', bvxoWXIyZCcaoVlsa . 'progress/');
define('Kc5xlCnb5ps5', bvxoWXIyZCcaoVlsa . 'generator.conf');
define('USKQ8Krj0NDRTmUn', dtsOCLvIeYMEsoGb(Kc5xlCnb5ps5, $grab_parameters));
if (!USKQ8Krj0NDRTmUn && isset($sPE7jAlLab__cdg))
{
    $GLOBALS['sg_runerror'] = 'Configuration file not found: ' . Kc5xlCnb5ps5;
    return;
}
define('vbvnIiwWDwPfqLAzp', (isset($grab_parameters['xs_sm_text_filename']) && $grab_parameters['xs_sm_text_filename']) ? $grab_parameters['xs_sm_text_filename'] : bvxoWXIyZCcaoVlsa . 'urllist.txt');
define('UlOVtEq9IhpvJhr', (isset($grab_parameters['xs_sm_text_url']) && $grab_parameters['xs_sm_text_url']) ? $grab_parameters['xs_sm_text_url'] : 'data/urllist.txt');
define('s1U2VEy5xv', preg_replace('#[^\\/]+?\.xml$#', $grab_parameters['xs_rssfilename'], $grab_parameters['xs_smname']));
define('kCJbaMAbL', preg_replace('#[^\\/]+?\.xml$#', 'ror.xml', $grab_parameters['xs_smname']));
define('fuea0ABrAp4gOawa6p', preg_replace('#[^\\/]+?\.xml$#', 'ror.xml', $grab_parameters['xs_smurl']));
define('vkO_adLrg', bvxoWXIyZCcaoVlsa . 'gbase.xml');
define('hoPkdNPv52g', 'data/gbase.xml');
if (!$_GET && $HTTP_GET_VARS) $_GET = $HTTP_GET_VARS;
if (!$_POST && isset($HTTP_POST_VARS)) $_POST = $HTTP_POST_VARS;
if (function_exists('ini_set'))
{
    @ini_set("output_buffering", '0');
    if ($grab_parameters['xs_memlimit']) @ini_set("memory_limit", $grab_parameters['xs_memlimit'] . 'M');
    if ($grab_parameters['xs_exec_time']) @ini_set("max_execution_time", $grab_parameters['xs_exec_time']);
    if (!$grab_parameters['xs_session_default'])
    {
        @ini_set("session.save_handler", 'files');
        @ini_set('session.save_path', bvxoWXIyZCcaoVlsa);
    }
}
if (@ini_get("magic_quotes_gpc"))
{
    if ($_GET) foreach ($_GET as $k => $v)
    {
        $_GET[$k] = stripslashes($v);
    }
    if ($_POST) foreach ($_POST as $k => $v)
    {
        $_POST[$k] = stripslashes($v);
    }
}
$op = $_REQUEST['op'];
if (function_exists('session_start') && !isset($sPE7jAlLab__cdg)) @session_start();
if ($op == 'logout')
{
    $_SESSION['is_admin'] = false;
    setcookie('sm_log', '');
    unset($op);
}
if (!isset($op)) $op = 'config';
if (!$_SESSION['is_admin']) $_SESSION['is_admin'] = ($_COOKIE['sm_log'] == (md5($grab_parameters['xs_login']) . '-' . md5($grab_parameters['xs_password'])));
if ((!$_SESSION['is_admin']) && $op != 'crawlproc')
{
    include Kt69SyBdFiG3ZhzUw . 'pages/page-login.inc.php';
    if (!$_SESSION['is_admin']) exit;
}
define('TGwMzooXjmjp3', true);
include Kt69SyBdFiG3ZhzUw . 'pages/page-configinit.inc.php';
include Kt69SyBdFiG3ZhzUw . 'pages/class.http.inc.php';
switch ($op)
{
    case 'crawl':
    case 'crawlproc':
    case 'config':
    case 'view':
    case 'analyze':
    case 'chlog':
    case 'l404':
    case 'reflinks':
    case 'ext':
    case 'proc':
        include Kt69SyBdFiG3ZhzUw . 'pages/page-' . $op . '.inc.php';
    break;
    case 'pinfo':
        phpinfo();
    break;
}

