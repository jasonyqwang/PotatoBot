<?php
/**
 * Created by PhpStorm.
 * 发送消息
 */

namespace Jsyqw\PotatoBot\Requests;

use Jsyqw\PotatoBot\Types\ChatType;

class ReqSendMessage extends ReqBase
{
    /**
        chat_type	Yes	ChatType	chat type
        chat_id	Yes	int	Unique identifier for the target chat
        text	Yes	string	Text of the message to be sent
        reply_to_message_id	Optional	int	If the message is a reply, ID of the original message
        markdown	Optional	bool	Whether to use MarkDown rendering, Entities will be generated automatically based on the text field. Refer Rich Text Support for detail
        reply_markup	Optional	ReplyMarkup	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the use
     */
    public $chat_type = ChatType::PeerChat;//必填 默认群组
    public $chat_id = 0;    //必填
    public $text = '';  //必填 发送文本
    public $reply_to_message_id; //可选是否是回复消息
    public $markdown = true;
    public $reply_markup;

}