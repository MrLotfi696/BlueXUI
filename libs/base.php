<?php

class Base_XUI
{
    private $url;
    private $username;
    private $password;
    private $cookie;
    protected $addressforlink;

    public function __construct(array $Data)
    {
        if (is_array($Data)) {
            $this->url = $Data['url'];
            $this->username = $Data['username'];
            $this->password = $Data['password'];
            $this->cookie = $Data['cookie'];
            $this->addressforlink = $Data['address'];
            if (!file_exists(BASE_PATH . $Data['cookie'])) {
                $this->auth();
            }
        }
    }

    public function auth()
    {
        $url = $this->url . 'login';
        $data = ['username' => $this->username, 'password' => $this->password];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_COOKIEJAR, BASE_PATH . $this->cookie);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'has error!' . PHP_EOL . 'message error: ' . curl_error($ch);
        }

        curl_close($ch);

        if (strpos($response, '"success":true') == true) echo 'connect success!';
    }


    public function curl(string $action, $body, bool $POST)
    {
        $method_request = ($POST == true) ? "POST" : "GET";

        $final_url = $this->url . "panel/api/inbounds/" . $action;

        $ch = curl_init($final_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method_request);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
        curl_setopt($ch, CURLOPT_COOKIEFILE, BASE_PATH . $this->cookie);
        curl_setopt($ch, CURLOPT_COOKIEJAR, BASE_PATH . $this->cookie);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'has error!' . PHP_EOL . 'message error: ' . curl_error($ch);
        }

        curl_close($ch);

        return $response;
    }
}
