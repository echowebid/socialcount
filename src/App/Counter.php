<?php

namespace Echowebid\SocialCount\App;

class Counter extends Api 
{
    public function __construct($args)
    {
        parent::__construct();
        $query = ['url' => $args, 'apikey' => $this->apikey];
        $this->options = [
            CURLOPT_URL => $this->endpoint . '?' . http_build_query($query)
        ];
        $this->sendResponse();
    }
}