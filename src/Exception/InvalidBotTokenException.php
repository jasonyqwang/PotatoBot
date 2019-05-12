<?php
/**
 * Created by PhpStorm.
 */

namespace Jsyqw\PotatoBot\Exception;


class InvalidBotTokenException extends PotatoException
{
    /**
     * InvalidBotTokenException constructor
     */
    public function __construct()
    {
        parent::__construct("Invalid bot token!");
    }
}