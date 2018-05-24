<?php

namespace TheWebmen\SLackLogger;

use Maknz\Slack\Client;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use SilverStripe\Control\Director;

class SlackHandler extends AbstractProcessingHandler
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * LogSlackHandler constructor.
     * @param string $enpoint
     * @param int $level
     * @param bool $bubble
     */
    public function __construct($enpoint, $level = Logger::DEBUG, $bubble = true)
    {
        parent::__construct($level, $bubble);

        $this->client = new Client($enpoint, [
            'username' => $_SERVER['HTTP_HOST']
        ]);
    }

    /**
     * @param array $record
     */
    protected function write(array $record)
    {
        $this->client->createMessage()->send("{$record['formatted']}\n{$_SERVER['REQUEST_URI']}");
    }

}
