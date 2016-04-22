<?php

namespace bc\Slack;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\StreamInterface;

/**
 * Class SlackHooker
 * @package bc\Slack
 */
class SlackHooker {

    /**
     * @var string
     */
    private $webhookUrl;
    /**
     * @var Client
     */
    private $client;

    /**
     * SlackHooker constructor.
     *
     * @param string $webhookUrl
     */
    public function __construct($webhookUrl) {
        $this->webhookUrl = $webhookUrl;
        $this->client = new Client();
    }

    public function sendText($text) {
        $message = ['text' => $text];

        $body = json_encode($message);
        $this->sendRequest($body);
    }

    /**
     * @param string|StreamInterface $body
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function sendRequest($body) {
        $request = new Request("POST",
                               $this->webhookUrl,
                               [["Content-type" => 'application/json']],
                               $body);

        return $this->client->send($request);
    }

    /**
     * @param array $message
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendMessage($message) {
        return $this->sendRequest(json_encode($message));
    }
}