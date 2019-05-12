<?php
/**
 * Created by PhpStorm.
 * 返回结果
 */

namespace Jsyqw\PotatoBot\Entities;


class ResponseResult extends Entity
{
    public $ok  = false;
    public $result = '';
    public function __construct(array $data)
    {
        $this->assignMemberVariables($data);
    }
}