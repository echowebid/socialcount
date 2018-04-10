<?php

namespace Echowebid\SocialCount\App;

class Counter extends Api 
{
    public function __construct($get="all", $args)
    {
        parent::__construct();
        $query = ['url' => $this->args, 'apikey' => $apikey];
        $this->options = [
            CURLOPT_URL => $this->endpoint . '?' . http_build_query($query)
        ];
        $this->get = $get;
        $this->sendResponse();
    }
}