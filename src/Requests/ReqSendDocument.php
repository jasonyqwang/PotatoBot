<?php
/**
 * Created by PhpStorm.
 * 发送文件，注意目前文件大小限制 50 MB
 */

namespace Jsyqw\PotatoBot\Requests;


class ReqSendDocument extends ReqBase
{
    /**
        chat_type	Yes	ChatType	chat type
        chat_id	Yes	int	Unique identifier for the target chat
        document	Yes	InputFile or string	Sends a file document. You can send an existing file on the server via the file_id string. Or upload new files, using multipart/form-data
        caption	Optional	string	Document caption (0-200 characters)
        reply_to_message_id	Optional	int	If the message is a reply, ID of the original message
        reply_markup	Optional	ReplyMarkup	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the use
     */

    public $chat_type = 0;//必填 int
    public $chat_id = 0;//必填  聊天id
    public $document = '';//必填 资源的id，或者 资源。 如果是资源需要 fopen('./test.txt', 'r') 读取
    public $caption; //选填 0-200 个字符
    public $reply_to_message_id;
    public $reply_markup;
}