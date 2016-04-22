<?php

namespace bc\Slack;

/**
 * Class MessageBuilder
 * @package bc\Slack
 */
class MessageBuilder {

    private $text;
    private $userName;
    private $channel;
    private $icon;
    private $attachments = [];

    /**
     * @param string $text
     *
     * @return MessageBuilder
     */
    public function setText($text) {
        $this->text = $text;

        return $this;
    }

    /**
     * @return array
     */
    public function build() {
        $message = [];

        if(!is_null($this->text)) $message['text'] = $this->text;
        if(!is_null($this->userName)) $message['username'] = $this->userName;
        if(!is_null($this->channel)) $message['channel'] = $this->channel;
        if(!is_null($this->icon)) $message['icon_emoji'] = $this->icon;

        if(count($this->attachments) > 0) {
            $message['attachments'] = $this->attachments;
        }

        return $message;
    }

    /**
     * @param $userName
     *
     * @return MessageBuilder
     */
    public function setUserName($userName) {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @param $channel
     *
     * @return MessageBuilder
     */
    public function setChannel($channel) {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @param $icon
     *
     * @return MessageBuilder
     */
    public function setIconEmoji($icon) {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @param $attach
     *
     * @return MessageBuilder
     */
    public function attach($attach) {
        if(!in_array($attach, $this->attachments)) {
            $this->attachments[] = $attach;
        }
        return $this;
    }
}