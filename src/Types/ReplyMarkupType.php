<?php
/**
 * Created by PhpStorm.
 */

namespace Jsyqw\PotatoBot\Types;


class ReplyMarkupType
{
    const ForceReplyType = 1;//Display of the reply screen so that the user has manually select the rbot message to click the "reply" button
    const ReplyKeyboardMarkupType = 2;//Replies to custom keyboard
    const ReplyKeyboardRemoveType = 3;//Indicates that the current custom keyboard is removed
    const InlineKeyboardMarkupType = 4;//That line custom keyboard, displayed in the chat content

}