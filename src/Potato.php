<?php
/**
 * Created by PhpStorm.
 * @author jasonwang1211@gmail.com
 */

namespace Jsyqw\PotatoBot;


use Jsyqw\PotatoBot\Exception\PotatoException;

class Potato
{
    //机器人的id
    protected $botId = '';
    protected $botToken = '';
    protected $botUsername = '';

    public function __construct($botToken, $botUsername = '')
    {
        if (empty($botToken)) {
            throw new PotatoException('Token 不能为空！');
        }
        //验证 xxx:yyyyyyyyyyyyyyy
        preg_match('/(\d+)\:[\w\-]+/', $botToken, $matches);
        if (!isset($matches[1])) {
            throw new PotatoException('Token 无效！');
        }
        $this->botId  = $matches[1];
        $this->botToken = $botToken;

        if (!empty($botUsername)) {
            $this->botUsername = $botUsername;
        }
        PotatoRequest::initialize($this);
    }

    /**
     * Get BotToken
     *
     * @return string
     */
    public function getBotToken()
    {
        return $this-> botToken;
    }

    /**
     * Get Bot name
     *
     * @return string
     */
    public function getBotUsername()
    {
        return $this->botUsername;
    }
}