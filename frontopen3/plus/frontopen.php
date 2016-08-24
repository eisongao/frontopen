<?php
$DB = MySql::getInstance();
if (PHP_VERSION < '5.0'){
    emMsg('您的php版本过低，请选用支持PHP5的环境配置。');
    exit();
}
if( !file_exists(EMLOG_ROOT."/content/templates/fronopen3/plus/locked.inc")){
    emDirect(TEMPLATE_URL.'plus/install.php');
    exit();
}
$check_columns_exist= $DB->query("show columns from ".DB_PREFIX."comment like 'useragent'");
if($DB->num_rows($check_columns_exist) == 0){
    emDirect(TEMPLATE_URL.'plus/install.php');
    exit();
}
?>