<?php

class restClient
{
   
    public function __construct(){ }

    public function postRequest($data,$endPoint,$url)
    {
        $data_json = json_encode($data);
        $ch = curl_init($url.''.$endPoint);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_json),
        ));
        $response = curl_exec($ch);
        if ($response === false) {
            echo 'Error: ' . curl_error($ch);
        } else {
            return $response;
        }
        curl_close($ch);
    }
}
