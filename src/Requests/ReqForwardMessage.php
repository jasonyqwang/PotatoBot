<?php
/**
 * Created by PhpStorm.
 * 转发消息
 */

namespace Jsyqw\PotatoBot\Requests;

use Jsyqw\PotatoBot\Types\ChatType;

class ReqForwardMessage extends ReqBase
{
    /**
        chat_type	Yes	ChatType	chat type
        chat_id	Yes	int	Unique identifier for the target chat
        from_chat_type	Yes	ChatType	source target chat type
        from_chat_id	Yes	int	Unique identifier for the chat where the original message was sent
        message_id	Yes	int	Unique ID of the message to be forwarded
     */
    public $chat_type = ChatType::PeerChat; //必填
    public $chat_id = 0;    //必填 聊天id
    public $from_chat_type = 0; //必填 来源类型
    public $from_chat_id = 0;   //必填 来源的聊天id
    public $message_id = 0; //必填 要转发的消息id

}