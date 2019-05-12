<?php
/**
 * Created by PhpStorm.
 */

namespace Jsyqw\PotatoBot\Entities;

/**
 * Class User
 * @package Jsyqw\PotatoBot\Entities
 *
    id	Yes	int	the user's unique ID
    first_name	Optional	string	the user's First name
    last_name	Optional	string	the user's Last name
    username	Yes	string	the user name
 */
class User
{
    public $id;
    public $first_name;
    public $last_name;
    public $username = 0;
}