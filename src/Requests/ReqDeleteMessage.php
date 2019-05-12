<?php
/**
 * Created by PhpStorm.
 * 删除消息
 * 1.必须是机器人自己发送的消息
 * 2.如果机器人是群管理员，那么他可以删除群里任何消息，否则只能删除他自己的消息（包括 所有的人都是管理员 的情况）
*/

namespace Jsyqw\PotatoBot\Requests;


use Jsyqw\PotatoBot\Types\ChatType;

class ReqDeleteMessage extends ReqBase
{
    /**
        chat_type	Yes	ChatType	chat type
        chat_id	Yes	int	Unique identifier for the target chat
        message_id	Yes	int	the unique ID of the message being edited
     */
    public $chat_type = ChatType::PeerChat;//必填 默认群组
    public $chat_id = 0;    //必填
    public $message_id = 0; //必填 消息id
}