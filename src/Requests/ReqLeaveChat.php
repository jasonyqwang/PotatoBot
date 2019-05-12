<?php
/**
 * Created by PhpStorm.
 * 退群或频道
 */

namespace Jsyqw\PotatoBot\Requests;

use Jsyqw\PotatoBot\Types\ChatType;

class ReqLeaveChat extends ReqBase
{
    /**
     * chat_type	Yes	ChatType	chat type
        chat_id	Yes	int	Unique identifier for the target chat
     */
    public $chat_type = ChatType::PeerChat;//必填 默认群组
    public $chat_id = 0;    //必填
}