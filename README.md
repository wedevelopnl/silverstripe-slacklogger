# SilverStripe Slack Logger

## Introduction

Slack logger

## Requirements

* SilverStripe CMS ^4.0

## Installation

```
composer require "thewebmen/silverstripe-slacklogger"
```

## Usage
```yml
SilverStripe\Core\Injector\Injector:
  Psr\Log\LoggerInterface:
    calls:
      LogSlackHandler: [pushHandler, [%$LogSlackHandler]]
  LogSlackHandler:
    class: TheWebmen\SlackLogger\SlackHandler
    constructor:
      - '[your slack webhook url here]'
      - 'error'
```
