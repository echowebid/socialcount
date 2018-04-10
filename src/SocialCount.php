<?php

namespace Echowebid\SocialCount;

use Echowebid\SocialCount\App\Counter;

class SocialCount 
{
    public function Count($attr)
    {
        return new Counter($attr);
    }
}