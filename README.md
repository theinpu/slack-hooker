# Simple Slack Webhook Sender

## Install

`composer require "bc\slack-hooker"`

## Usage

````php

require_once 'vendor/autoload.php';

//instantiate bc\Slack\SlackHooker with webhook url
$hooker = new bc\Slack\SlackHooker('WEBHOOK_URL');

//build message
$messageBuilder = new bc\Slack\MessageBuilder();
$messageBuilder
    ->setText("Simpe text")
    ->setUserName("Bot")
    ->setChannel('#random')
    ->setIconEmoji(':cow:');

//build attachment
$attachBuilder = new bc\Slack\AttachmentBuilder();
$attachBuilder
    ->setFallback("fallback text")
    ->setText("attachment text")
    ->setPreText("pre text")
    ->setColor("#369")
    ->setAuthorName("Author")
    ->setAuthorLink("")
    ->setAuthorIcon("")
    ->setTitle("title")
    ->setTitleLink("")
    ->addFiled('filed1', 'value')
    ->addFiled('filed2', 'value')
    ->addFiled('field3', 'value', false)
    ->setImageUrl("")
    ->setThumbUrl("");

//add attachment
$messageBuilder->attach($attachBuilder->build());

//build and add another attachment
$attachment = (new bc\Slack\AttachmentBuilder())
    ->setFallback("fallback")
    ->setText("second attachment")
    ->build();

$messageBuilder->attach($attachment);

$message = $messageBuilder->build();

//send message. returns \Psr\Http\Message\ResponseInterface
$response = $hooker->sendMessage($message);
````