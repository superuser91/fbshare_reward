<?php

namespace Vgplay\FbShareReward\Exceptions;

use Exception;

class SocialSharedException extends Exception
{
    public function __construct($message = 'Đã nhận thưởng điểm chia sẻ hôm nay, hãy quay lại vào ngày mai')
    {
        parent::__construct($message);
    }
}
