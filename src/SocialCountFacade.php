<?php

namespace Echowebid\SocialCount;

use Illuminate\Support\Facades\Facade;

class SocialCountFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'SocialCount'; }
}