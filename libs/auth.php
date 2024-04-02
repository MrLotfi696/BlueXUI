<?php
include "./../bootstrap/init.php";

if ($helper->isAjax($_SERVER)) {
    $data = $_POST['link'];
    if (strstr($data, "vmess://") || strstr($data, "vless://")) {
        $getUuid = $helper->GetUUID($data);
        if (isset($getUuid['uuid'])) {
            $hasClient = $sanaei->hasClient(NULL, $getUuid['uuid']);
            if ($hasClient['success']) {
                $_SESSION['login'] = $hasClient;
                echo true;
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    } else {
        if (strlen($data) > 0) {
            $hasClient = $sanaei->hasClient($data, NULL);
            if ($hasClient['success']) {
                $_SESSION['login'] = $hasClient;
                echo true;
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    }
} else {
    $helper->redirect('../404.html');
}