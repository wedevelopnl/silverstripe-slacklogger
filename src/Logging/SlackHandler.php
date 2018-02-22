<?php

namespace TheWebmen\SLackLogger;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class SlackHandler extends AbstractProcessingHandler
{

    /**
     * @var Maknz\Slack\Client
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

        $this->client = new \Maknz\Slack\Client($enpoint);
    }

    /**
     * @param array $record
     */
    protected function write(array $record)
    {
        $this->client->createMessage()->send($record['formatted']);
    }

}
