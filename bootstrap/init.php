<?php
session_start();

include "contants.php";
include "config.php";

include BASE_PATH . "/libs/programs.php";
include BASE_PATH . "/libs/jdf.php";
include BASE_PATH . "/libs/helpers.php";
include BASE_PATH . "/libs/base.php";
include BASE_PATH . "/libs/sanaei.php";

$helper = new helper();
$sanaei = new Sanaei($DataPanel);
