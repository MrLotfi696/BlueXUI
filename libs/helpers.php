<?php
class helper
{
    public function isAjax($dataRequest)
    {
        return isset($dataRequest['HTTP_X_REQUESTED_WITH']) && $dataRequest['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    public function GetUUID($link)
    {
        if (strstr($link, "vmess://")) {
            $link = json_decode(base64_decode(substr($link, 8), 448), true);
            if (isset($link['id'])) {
                return ['success' => true, 'uuid' => $link['id']];
            }
        }
        return ['success' => false, 'msg' => "invalid link"];
    }

    public function redirect($url)
    {
        if (!headers_sent()) {
            header("Location: $url");
        } else {
            echo "<script type='text/javascript'>window.location.href='$url'</script>";
            echo "<noscript><meta http-equiv='refresh' content='0;url=$url'/></noscript>";
        }
        exit;
    }
}

trait helper_XUI
{
    use JDF;

    protected function formatBytes($size, $precision = 2)
    {
        if ($size <= 0) {
            return "0";
        } else {
            $base = log($size, 1024);
            $suffixes = array('', 'KB', 'MB', 'GB', 'TB');

            return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
        }
    }

    protected function DateDifference($firstDate, $secondDate)
    {
        list($fdY, $fdM, $fdD) = explode('/', $firstDate);
        list($sdY, $sdM, $sdD) = explode('/', $secondDate);
        $fts = $this->jmktime(0, 0, 0, $fdM, $fdD, $fdY);
        $sts = $this->jmktime(0, 0, 0, $sdM, $sdD, $sdY);
        $diff = $sts - $fts;
        return round($diff / 86400);
    }
}
