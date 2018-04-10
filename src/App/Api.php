<?php

namespace Echowebid\SocialCount\App;

use Exception;

abstract class Api  {
    protected $apikey;
    protected $data;
    protected $endpoint;
    protected $get;

    public function __construct() {
        $this->endpoint = config('socialcount.endpoint', 'https://api.sharedcount.com/v1.0/');
        $this->apikey = config('socialcount.apikey', '');
        $this->data = 0;
    }

    public function sendResponse() {

        $curl = curl_init();

        $curl_options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
        ];
        
        if ( $this->options && is_array($this->options) )
        {
            foreach( $this->options as $key => $val)
            {
                $curl_options[$key] = $val;
            }
        }
        
        curl_setopt_array($curl, $curl_options);
        $response = curl_exec($curl);
        $curl_error = curl_error($curl);
        curl_close($curl);

        if ($curl_error) 
        {
            throw new Exception($curl_error, 1);    
        } else 
        {
            $response_decode = json_decode($response, true);
            $this->data = $response_decode;
            return $this;
        }
    }

    public function stumbleUpon() {
        if ( empty($this->data) || !isset($this->data['stumbleupon']) )
            return 0;

        return $this->data['stumbleupon'];
    }
    
    public function pinterest() {
        if ( empty($this->data) || !isset($this->data['pinterest']) )
            return 0;

        return $this->data['pinterest'];
    }
    
    public function linkedin() {
        if ( empty($this->data) || !isset($this->data['linkedin']) )
            return 0;

        return $this->data['linkedin'];
    }

    public function facebook() {
        if ( empty($this->data) || !isset($this->data['facebook']['total_count']) )
            return 0;

        return $this->data['facebook']['total_count'];
    }

    public function facebookComment() {
        if ( empty($this->data) || !isset($this->data['facebook']['comment_count']) )
            return 0;

        return $this->data['facebook']['comment_count'];
    }

    public function facebookReaction() {
        if ( empty($this->data) || !isset($this->data['facebook']['reaction_count']) )
            return 0;

        return $this->data['facebook']['reaction_count'];
    }

    public function facebookShare() {
        if ( empty($this->data) || !isset($this->data['facebook']['share_count']) )
            return 0;

        return $this->data['facebook']['share_count'];
    }

    public function googlePlus() {
        if ( empty($this->data) || !isset($this->data['googleplusone']) )
            return 0;

        return $this->data['googleplusone'];
    }
}
