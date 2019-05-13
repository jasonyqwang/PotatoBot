<?php
/**
 * Created by PhpStorm.
 */
require '../vendor/autoload.php';
require './config.php';

use Jsyqw\PotatoBot\Potato;
use Jsyqw\PotatoBot\PotatoRequest;
//创建 potato 对象
$potato = new Potato(POTATO_BOT_TOKEN, POTATO_BOT_USERNAME);
PotatoRequest::initialize($potato);

## 发送消息
//$reqData = new \Jsyqw\PotatoBot\Requests\ReqSendMessage();
//$reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::PeerChat;//群组
//$reqData->chat_id = 10764236;
//$reqData->text = date('Y-m-d H:i:s');
//$ret = PotatoRequest::sendTextMessage($reqData);
//var_dump($ret);

//$reqData = new \Jsyqw\PotatoBot\Requests\ReqSendMessage();
//$reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::PeerUser;//个人
//$reqData->chat_id = 23063733; // qq_1234
//$reqData->text = date('Y-m-d H:i:s');
//$ret = PotatoRequest::sendTextMessage($reqData);
//var_dump($ret);
//exit();

## 获取机器人基本信息
//$ret = PotatoRequest::getMe();
//var_dump($ret->result);

## 获取机器人的群组信息
//$ret = PotatoRequest::getGroups();
//echo json_encode($ret->result);

## getUpdates
//$ret = PotatoRequest::getUpdates();
//echo json_encode($ret->result);

## 设置回调的钩子
//$reqData = new \Jsyqw\PotatoBot\Requests\ReqSetWebhook();
//$reqData->url = 'http://47.107.71.208:8088/a.php';
//$ret = PotatoRequest::setWebhook($reqData);
//var_dump($ret);

## 删除 回调
//$ret = PotatoRequest::delWebhook();
//var_dump($ret);

## 发送图片信息
//$reqData = new \Jsyqw\PotatoBot\Requests\ReqSendPhoto();
//$reqData->chat_id = 10764236; //群组
//$reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::PeerChat;
////$reqData->photo = '000002259ad1fc6b355c64d5ea30d41a';
//$reqData->photo = fopen('./img.png', 'r');
//$reqData->caption = '图片说明';
//$ret = PotatoRequest::sendPhoto($reqData);
//var_dump($ret);

## 发送文件
//$reqData = new \Jsyqw\PotatoBot\Requests\ReqSendDocument();
//$reqData->chat_id = 10764236; //群组
//$reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::PeerChat;
//$reqData->document = '000002269a4b2176355c7bd5ea371a49';
////$reqData->document = fopen('./img.png', 'r');
//$reqData->caption = '文件说明';
//$ret = PotatoRequest::sendDocument($reqData);
//var_dump($ret);

## 修改消息 ，注意必须是自己发送的消息才能修改
//$reqData = new \Jsyqw\PotatoBot\Requests\ReqEditMessageText();
//$reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::PeerUser;
//$reqData->chat_id = 23063733; // qq_1234
//$reqData->text = 'update '.date('Y-m-d H:i:s');
//$reqData->message_id = 64;
//$ret = PotatoRequest::editMessageText($reqData);
//var_dump($ret);

## 删除消息
//$reqData = new \Jsyqw\PotatoBot\Requests\ReqDeleteMessage();
//$reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::PeerUser;
//$reqData->chat_id = 23063733; // qq_1234
//$reqData->message_id = 64;
//$ret = PotatoRequest::deleteMessage($reqData);
//var_dump($ret);

## 退群或者频道
//$reqData = new \Jsyqw\PotatoBot\Requests\ReqLeaveChat();
//$reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::ChannelChat;
//$reqData->chat_id = 10764523; // 频道 ChinaMan
//$ret = PotatoRequest::leaveChat($reqData);
//var_dump($ret);

