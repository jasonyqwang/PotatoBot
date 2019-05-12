<?php
/**
 * Created by PhpStorm.
 * 实体
 */

namespace Jsyqw\PotatoBot\Entities;


abstract class Entity
{
    /**
     * Helper to set member variables
     *
     * @param array $data
     */
    protected function assignMemberVariables(array $data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }
}