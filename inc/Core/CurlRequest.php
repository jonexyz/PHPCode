<?php
namespace Core;
use Core\Base\SingleObject;

class CurlRequest extends SingleObject
{
    private $ch;

    private function init()
    {
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    }

    private function header($UserAgent)
    {
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36');
    }

    private function post()
    {
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
    }

    public function request()
    {

    }


    public function run()
    {
        $this->init();


    }
}