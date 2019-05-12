<?php
/**
 * Created by PhpStorm.
 */

namespace Jsyqw\PotatoBot\Requests;


class ReqBase
{
    //把当前的数据都转成数组
    public function toArray(){
        $class = static::class;
        $ref = new \ReflectionClass($class);

        $properties = $ref->getProperties();
        $data = [];
        foreach ($properties as $v){
            $name = $v->name;
            $data[$name] = $this->$name;
        }
        //过滤 为null的字段
        $data = array_filter($data, function ($item){
            if($item === null) return false;
            return true;
        });
        return $data;
    }
}