# 土豆聊天 机器人

## 概要

    1.创建机器人 【使用某个土豆账号创建】
    2.把机器人加到群组中 
    3.机器人给个人、群组或频道发送消息 

## 安装

    在 composer 中添加
    "require": {
        "jsyqw/potato-bot": "^0.1"
    }
    
    composer update jsyqw/potato-bot
    
    OR
    
    composer require jsyqw/potato-bot:dev-master
    
## TODO 
       
    获取的消息，自动映射对应的 Model 模型  
    
## SDK使用方法
    
//创建 potato 对象
$potato = new Potato(POTATO_BOT_TOKEN, POTATO_BOT_USERNAME);

## 发送消息
    
个人
```php
    $reqData = new \Jsyqw\PotatoBot\Requests\ReqSendMessage();
    $reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::PeerUser;//个人
    $reqData->chat_id = 23063733; 
    $reqData->text = date('Y-m-d H:i:s');
    $ret = PotatoRequest::sendTextMessage($reqData);
    var_dump($ret);
```

群组 (groups)
```php
    $reqData = new \Jsyqw\PotatoBot\Requests\ReqSendMessage();
    $reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::PeerChat;//群组
    $reqData->chat_id = 10764236;
    $reqData->text = date('Y-m-d H:i:s');
    $ret = PotatoRequest::sendTextMessage($reqData);
    var_dump($ret);
```

频道&超级群组（channels & superGroups）
注意 需要把提升机器人的权限，方可发布消息
```php
    $reqData = new \Jsyqw\PotatoBot\Requests\ReqSendMessage();
    $reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::ChannelChat;
    $reqData->chat_id = 10764236;
    $reqData->text = date('Y-m-d H:i:s');
    $ret = PotatoRequest::sendTextMessage($reqData);
    var_dump($ret);
```

## 获取机器人基本信息

```php
    $ret = PotatoRequest::getMe();
    var_dump($ret->result);
```
## 获取机器人的群组信息

```php
    $ret = PotatoRequest::getGroups();
    echo json_encode($ret->result);
```

## getUpdates

```php
    $ret = PotatoRequest::getUpdates();
    echo json_encode($ret->result);
```

## 设置回调的钩子

```php
    $reqData = new \Jsyqw\PotatoBot\Requests\ReqSetWebhook();
    $reqData->url = 'http://xxxx/a.php';
    $ret = PotatoRequest::setWebhook($reqData);
    var_dump($ret);
```

## 删除 回调

```php
    $ret = PotatoRequest::delWebhook();
    var_dump($ret);
```
## 发送图片信息，注意 photo 参数是资源类型 或者 已经上传的资源id

```php
    $reqData = new \Jsyqw\PotatoBot\Requests\ReqSendPhoto();
    $reqData->chat_id = 10764236; //群组
    $reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::PeerChat;
    //$reqData->photo = '000002259ad1fc6b355c64d5ea30d41a';
    $reqData->photo = fopen('./img.png', 'r');
    $reqData->caption = '图片说明';
    $ret = PotatoRequest::sendPhoto($reqData);
    var_dump($ret);
```

## 发送文件

```php
    $reqData = new \Jsyqw\PotatoBot\Requests\ReqSendDocument();
    $reqData->chat_id = 10764236; //群组
    $reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::PeerChat;
    $reqData->document = '000002269a4b2176355c7bd5ea371a49';
    //$reqData->document = fopen('./img.png', 'r');
    $reqData->caption = '文件说明';
    $ret = PotatoRequest::sendDocument($reqData);
    var_dump($ret);
```

## 修改消息 ，注意必须是自己发送的消息才能修改

```php
    $reqData = new \Jsyqw\PotatoBot\Requests\ReqEditMessageText();
    $reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::PeerUser;
    $reqData->chat_id = 23063733; 
    $reqData->text = 'update '.date('Y-m-d H:i:s');
    $reqData->message_id = 64;
    $ret = PotatoRequest::editMessageText($reqData);
    var_dump($ret);
```

## 删除

```php
    $reqData = new \Jsyqw\PotatoBot\Requests\ReqDeleteMessage();
    $reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::PeerUser;
    $reqData->chat_id = 23063733; 
    $reqData->message_id = 64;
    $ret = PotatoRequest::deleteMessage($reqData);
```

## 退群或者频道

```php
    $reqData = new \Jsyqw\PotatoBot\Requests\ReqLeaveChat();
    $reqData->chat_type = \Jsyqw\PotatoBot\Types\ChatType::ChannelChat;
    $reqData->chat_id = 10764523; // 频道 
    $ret = PotatoRequest::leaveChat($reqData);
```



