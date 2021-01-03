<?php

class API
{
    private $method;
    private $url;
    private $data;
    private $result;
    private $body;

    public function __construct(array $config = [])
    {
        foreach ($config as $key => $value) {
            switch ($key) {
                case "method":
                    $this->method = $value;
                    break;

                case "url":
                    $this->url = $value;
                    break;

                case "data":
                    $this->data = $value;
                    break;
            }
        }
    }

    public function setMethod(string $method) {
        $this->method = $method;
    }

    public function setUrl(string $url) {
        $this->url = $url;
    }

    public function setData(array $data) {
        $this->data = $data;
    }

    public function addData(array $data) {
        foreach( $data as $element ) {
            $this->data[] = $element;
        }
    }

    public function getResult() {
        return $this->result;
    }

    public function getBody() {
        return $this->body;
    }

    public function execute() {
        $response = API::send($this->url, $this->data, $this->method);

        $this->result = $response['result'];
        $this->body = $response;
        unset( $this->body['result'] );
    }

    public static function send(string $url, array $body, string $method)
    {
        $data = http_build_query($body);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        return json_decode($result);
    }
}
