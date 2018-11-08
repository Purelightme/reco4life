<?php
/**
 * Created by PhpStorm.
 * User: purelightme
 * Date: 2018/8/2
 * Time: 15:32
 */

namespace Purelightme;

use GuzzleHttp\Client;
use function GuzzleHttp\Promise\unwrap;

class Reco4life
{
    public $userName = '';
    public $apiKey = '';
    public $urlPrefix = 'http://api.reco4life.com/v/api.1.1/';

    public function __construct($userName, $apiKey)
    {
        $this->userName = $userName;
        $this->apiKey = $apiKey;
    }

    public function sendGetRequest($action, $params, $token = '')
    {
        $params = http_build_query($params);
        $ch = curl_init($this->urlPrefix . $action . '?' . $params);
        if ($token) {
            $headers = [
                'token:' . $token
            ];
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        if (curl_errno($ch)) {
            return [
                'result' => curl_error($ch)
            ];
        }
        return json_decode($res, true);
    }

    public function getToken()
    {
        $action = 'get_token';
        $ret = $this->sendGetRequest($action, [
            'user_name' => $this->userName,
            'api_key' => $this->apiKey
        ]);
        return $ret;
    }

    public function itemList($params, $token)
    {
        $action = 'item_list';
        return $this->sendGetRequest($action, $params, $token);
    }

    public function itemSwitch($params, $token)
    {
        $action = 'item_switch';
        return $this->sendGetRequest($action, $params, $token);
    }

    public function batchItemSwitch(...$params)
    {
        $action = 'item_switch';
        $client = new Client(['base_uri' => $this->urlPrefix]);
        $promises = [];
        foreach ($params as $index => $param) {
            foreach (explode(',', $param['sn']) as $sn) {
                $promises[$index . '-' . $sn] = $client->getAsync($action, [
                    'headers' => [
                        'token' => $param['token']
                    ],
                    'query' => [
                        'user_name' => $param['user_name'],
                        'sn' => $sn,
                        'status' => $param['status']
                    ]
                ]);
            }
        }
        $results = unwrap($promises);
        $res = [];
        foreach ($results as $index => $result){
            $res[$index] = json_decode((string) $result->getBody(),true);
        }
        return $res;
    }

    public function batchItemList(...$params)
    {
        $action = 'item_list';
        $client = new Client(['base_uri' => $this->urlPrefix]);
        $promises = [];
        foreach ($params as $index => $param) {
            $promises[$index] = $client->getAsync($action, [
                'headers' => [
                    'token' => $param['token']
                ],
                'query' => [
                    'user_name' => $param['user_name'],
                ]
            ]);
        }
        $results = unwrap($promises);
        $res = [];
        foreach ($results as $index => $result){
            $res[$index] = json_decode((string) $result->getBody(),true);
        }
        return $res;
    }
}
