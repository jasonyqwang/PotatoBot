<?php
/**
 * Created by PhpStorm.
 * 聊天类型
 * @link https://www.potato.im/api#chat-type
 */

namespace Jsyqw\PotatoBot\Types;

class ChatType
{
    const PeerUser = 1; //user chat 用户聊天
    const PeerChat = 2; //standard group chat
    const ChannelChat = 3; //super group chat
}