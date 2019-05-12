<?php
/**
 * Created by PhpStorm.
 * 编辑消息
 * 注意必须是自己发送的消息才能修改
 */

namespace Jsyqw\PotatoBot\Requests;


use Jsyqw\PotatoBot\Types\ChatType;

class ReqEditMessageText extends ReqBase
{
    /**
        chat_type	Yes	ChatType	chat type
        chat_id	Yes	int	Unique identifier for the target chat
        text	Yes	string	Text of the message to be sent
        message_id	Yes	int	the unique ID of the message being edited
        markdown	Optional	bool	Whether to use MarkDown rendering, Entities will be generated automatically based on the text field. Refer Rich Text Support for detail
        reply_markup	Optional	ReplyMarkup	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the use
     */
    public $chat_type = ChatType::PeerChat;//必填 默认群组
    public $chat_id = 0;    //必填
    public $text = '';  //必填 发送文本
    public $message_id = 0; //必填 消息id
    public $markdown = true;
    public $reply_markup;
}