<?php
/**
 * Created by PhpStorm.
 * @link https://www.potato.im/api
 * @author jasonwang1211@gmail.com
 */

namespace Jsyqw\PotatoBot;

use GuzzleHttp\Exception\RequestException;
use Jsyqw\PotatoBot\Entities\ResponseResult;
use Jsyqw\PotatoBot\Exception\PotatoException;
use GuzzleHttp\Client;
use Jsyqw\PotatoBot\Requests\ReqBase;

class PotatoRequest
{

    /**
     * @var $potato Potato
     */
    private static $potato = null;
    private static $apiUrl = 'https://api.sydney.im:8443';
    /**
     * Guzzle Client object
     * @var $client Client
     */
    private static $client = null;
    private static $timeout = 30;//超时时间

    /**
     * Initialize
     *
     * @param Potato $potato
     *
     * @throws PotatoException
     */
    public static function initialize(Potato $potato)
    {
        if (!($potato instanceof Potato)) {
            throw new PotatoException('Invalid Potato!');
        }

        self::$potato = $potato;
        //设置 请求的地址
        self::setClient(new Client([
            'base_uri' => self::$apiUrl,
            'verify' => false,
            'timeout' =>self::$timeout
        ]));
    }

    /**
     * Set a custom Guzzle HTTP Client object
     *
     * @param Client $client
     *
     * @throws PotatoException
     */
    public static function setClient(Client $client)
    {
        if (!($client instanceof Client)) {
            throw new PotatoException('Invalid GuzzleHttp\Client!');
        }
        self::$client = $client;
    }

    /**
     * @param $method
     * @param $uri
     * @param $options
     * @return ResponseResult
     */
    private static function _execute($method, $uri, $options = []){
        try {
            $response = self::$client->request($method,$uri,$options);
            $result   = $response->getBody()->getContents();
            $result = json_decode($result, true);
        } catch (RequestException $e) {
            if($e->getResponse() && $result = (string) $e->getResponse()->getBody()){
                $result = json_decode($result, true);
            }else{
                $result['ok'] = false;
                $result['result'] = $e->getMessage();
            }
        }
        if(!$result){
            $result['ok'] = false;
            $result['result'] = 'No Response';
        }
        $response = new ResponseResult($result);
        return $response;
    }

    /**
     *  A simple method for testing your bot's auth token. Requires no parameters. Returns basic information about the bot in form of a User object.
     * @return ResponseResult
     */
    public static function getMe(){
        $uri = '/'.self::$potato->getBotToken().'/getMe';
        $response = self::_execute('GET',$uri);
        return $response;
    }

    /**
     * 获取
     * @return ResponseResult
     */
    public static function getFile($data){
        if($data instanceof ReqBase){
            $data = $data->toArray();
        }
        $uri = '/'.self::$potato->getBotToken().'/getFile';
        $response = self::_execute('GET', $uri, $data);
        return $response;
    }


    /**
     * @param array | ReqBase $data
     * @return ResponseResult
     */
    public static function sendTextMessage($data)
    {
        if($data instanceof ReqBase){
            $data = $data->toArray();
        }
        $uri = '/'.self::$potato->getBotToken().'/sendTextMessage';
        $options =  ['json' => $data];
        $response = self::_execute('POST', $uri, $options);
        return $response;
    }

    /**
     * 获取机器人的群组信息
     * Get groups/supergroups/channels where bot staying
     * @return Potato
     */
    public static function getGroups()
    {
        $uri = '/'.self::$potato->getBotToken().'/getGroups';
        return self::_execute('GET',$uri);
    }

    /**
     * 获取给机器人发送的所有的消息，获取后消息则被删除（主动）
     * @return ResponseResult
     */
    public static function getUpdates(){
        $uri = '/'.self::$potato->getBotToken().'/getUpdates';
        return self::_execute('GET',$uri);
    }

    /**
     * 设置回调的钩子
     * 注意：
     * 1.回调是POST的请求
     * 2.接受参数，要用 file_get_contents('php://input', 'r') 获取
     * @param $data
     * @return ResponseResult
     */
    public static function setWebhook($data){
        if($data instanceof ReqBase){
            $data = $data->toArray();
        }
        $uri = '/'.self::$potato->getBotToken().'/setWebhook';
        $options =  ['json' => $data];
        $response = self::_execute('POST',$uri, $options);
        return $response;
    }

    /**
     * 删除 回调
     * @return ResponseResult
     */
    public static function delWebhook(){
        $uri = '/'.self::$potato->getBotToken().'/delWebhook';
        return self::_execute('GET',$uri);
    }

    /**
     * 发送图片
     * @return ResponseResult
     */
    public static function sendPhoto($data){
        if($data instanceof ReqBase){
            $data = $data->toArray();
        }
        $uri = '/'.self::$potato->getBotToken().'/sendPhoto';

        $hasResource = false;
        foreach ($data as $key => $item) {
            $hasResource |= (is_resource($item) || $item instanceof \GuzzleHttp\Psr7\Stream);
            $multipart[]  = ['name' => $key, 'contents' => $item];
        }
        if($hasResource){
            $options['multipart'] = $multipart;
        }else{
            $options['json'] = $data;
        }
        $response = self::_execute('POST',$uri, $options);
        return $response;
    }

    /**
     * 发送文件
     * @return ResponseResult
     */
    public static function sendDocument($data){
        if($data instanceof ReqBase){
            $data = $data->toArray();
        }
        $uri = '/'.self::$potato->getBotToken().'/sendDocument';

        $hasResource = false;
        foreach ($data as $key => $item) {
            $hasResource |= (is_resource($item) || $item instanceof \GuzzleHttp\Psr7\Stream);
            $multipart[]  = ['name' => $key, 'contents' => $item];
        }
        if($hasResource){
            $options['multipart'] = $multipart;
        }else{
            $options['json'] = $data;
        }
        $response = self::_execute('POST',$uri, $options);
        return $response;
    }

    /**
     * 编辑消息
     * @param array | ReqBase $data
     * @return ResponseResult
     */
    public static function editMessageText($data)
    {
        if($data instanceof ReqBase){
            $data = $data->toArray();
        }
        $uri = '/'.self::$potato->getBotToken().'/editMessageText';
        $options =  ['json' => $data];
        $response = self::_execute('POST', $uri, $options);
        return $response;
    }

    /**
     * 删除消息
     * @param array | ReqBase $data
     * @return ResponseResult
     */
    public static function deleteMessage($data)
    {
        if($data instanceof ReqBase){
            $data = $data->toArray();
        }
        $uri = '/'.self::$potato->getBotToken().'/deleteMessage';
        $options =  ['json' => $data];
        $response = self::_execute('POST', $uri, $options);
        return $response;
    }

    /**
     * 退群或频道
     * @param $data
     * @return ResponseResult
     */
    public static function leaveChat($data)
    {
        if($data instanceof ReqBase){
            $data = $data->toArray();
        }
        $uri = '/'.self::$potato->getBotToken().'/leaveChat';
        $options =  ['json' => $data];
        $response = self::_execute('POST', $uri, $options);
        return $response;
    }

    /**
     * 获取 用户或群或频道
     * @param $data
     * @return ResponseResult
     */
    public static function getChat($data)
    {
        if($data instanceof ReqBase){
            $data = $data->toArray();
        }
        $uri = '/'.self::$potato->getBotToken().'/getChat';
        $options =  ['json' => $data];
        $response = self::_execute('POST', $uri, $options);
        return $response;
    }
}