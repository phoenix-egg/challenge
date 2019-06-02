<?php 
namespace App\Console;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;

class ChallegeCommand extends Command
{

    protected $result;
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
    }

    public function request( $method, $url, $params)
    {
        $this->result = $this->client->{$method}($url, $params);

        return $this;
    }

    public function getResponse()
    {
        $body = $this->result->getBody();
        $responseSize = $body->getSize();
        
        return \json_decode( $body->read( $responseSize));
    }
}
