<?php
/**
 * Created by PhpStorm.
 */

namespace Jsyqw\PotatoBot\Requests;


class ReqSetWebhook extends ReqBase
{
    /**
        url	Yes	string	HTTP url to send updates to
        certificate	no	InputFile or string	A digital certificate that sends an existing file on the server through the file_id string. Or upload new files, using multipart/form-data
     */

    public $url = ''; //必填
    public $certificate = null;//可选
}