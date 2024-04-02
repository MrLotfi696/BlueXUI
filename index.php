<?php
include "bootstrap/init.php";

if (!isset($_SESSION['login'])) {
    $helper->redirect('login.php');
}

$dataUser = $sanaei->getInfoClient($_SESSION['login']['email'], $_SESSION['login']['uuid']);

include "tpl/index.php";