<?php
include './Facebook/autoload.php';
include('./fbconfig.php');
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://localhost/PHP/Unit3_Join_LoadMenu/loginfbAn/fb-callback.php', $permissions);

?>