<?php
class Sanaei extends Base_XUI
{
    use helper_XUI;

    public function getList()
    {
        $process = $this->curl('list', [], false);
        if (strpos($process, '"success":true') == false) die('has problem !');
        return $process;
    }

    public function getOnlines()
    {
        $process = $this->curl('onlines', [], true);
        return $process;
    }

    public function checkOnline($email)
    {
        $list = json_decode($this->getOnlines(), true)['obj'];
        $result = (in_array($email, $list)) ? "آنلاین" : "آفلاین";
        return $result;
    }

    public function hasClient($email = NULL, $id = NULL)
    {
        $list = json_decode($this->getList(), true);
        foreach ($list['obj'] as $inbound) {
            $settingsClients = json_decode($inbound['settings'], true)['clients'];
            foreach ($settingsClients as $client) {
                if (isset($email) && $client['email'] == $email || isset($id) && $client['id'] == $id) {
                    return ['success' => true, 'email' => $client['email'], 'uuid' => $id];
                }
            }
        }
        return ['success' => false, 'msg' => 'has problem !'];
    }

    public function getInfoClient($email = NULL, $id = NULL)
    {
        $list = json_decode($this->getList(), true);
        $time = time();
        foreach ($list['obj'] as $inbound) {
            $settingsClients = json_decode($inbound['settings'], true)['clients'];
            foreach ($settingsClients as $client) {
                if (isset($email) && $client['email'] == $email || isset($id) && $client['id'] == $id) {
                    foreach ($inbound["clientStats"] as $clientStats) {
                        if ($client['email'] == $clientStats['email']) {

                            if ($clientStats['expiryTime'] == 0) {
                                $expireTime = "نامحدود";
                            } else {
                                $exp = date('Y-m-d', $clientStats['expiryTime'] / 1000);
                                $expireTime = $this->jdate('Y/m/d', strtotime($exp));
                            }

                            $remaning_trafic = ($clientStats['total'] !== 0) ? $this->formatBytes($clientStats['total'] - ($clientStats['up'] + $clientStats['down'])) : "نامحدود";

                            $remaning_days = ($expireTime !== "نامحدود") ? $remaning_days = $this->DateDifference($time, $expireTime) : $remaning_days = "نامحدود";

                            $response = [
                                'success' => true,
                                'id' => $clientStats['id'],
                                'up' => $this->formatBytes($clientStats['up']),
                                'down' => $this->formatBytes($clientStats['down']),
                                'remark' => $inbound['remark'],
                                'port' => $inbound['port'],
                                'protocol' => $inbound['protocol'],
                                'tag' => $inbound['tag'],
                                'email' => $clientStats['email'],
                                'enable' => $client['enable'],
                                'inboundId' => $clientStats['inboundId'],
                                'expiryTime' => $expireTime,
                                'remaning_days' => $remaning_days,
                                'uuid' => $client['id'],
                                'limitIp' => $client['limitIp'],
                                'subId' => $client['subId'],
                                'remaning_trafic' => $remaning_trafic,
                                'total_used' => $this->formatBytes($clientStats['down'] + $clientStats['up']),
                                'total' => ($clientStats['total'] == 0) ? "نامحدود" : $this->formatBytes($clientStats['total']),
                                'online' => $this->checkOnline($clientStats['email']),
                            ];

                            return $response;
                        }
                    }
                }
            }
        }

        return ['success' => false, 'msg' => 'has problem !'];
    }
}
