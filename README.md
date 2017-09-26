Recurly client module for Zend Framework
========================================

Recurly client module provides a simple integration into Zend Framework of Recurly client library that interact with Recurly's subscription management through [REST API](http://docs.recurly.com/api).

## Introduction

Recurly client module provides a config file to initialize simply [REST API](http://docs.recurly.com/api) client.

## Requirements

* PHP 7.0+
* [zendframework/zend-mvc ^3.0](https://github.com/zendframework/zend-mvc)
* [recurly/recurly-client ^2.5.3](https://github.com/recurly/recurly-client-php)

## Installation

Recurly client module only officially supports installation through Composer. For Composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

You can install the module from command line:

```sh
$ composer require riskio/recurly-client-module
```

Enable the module by adding `Riskio\Recurly\ClientModule` key to your `application.config.php` file. Customize the module by copy-pasting
the `recurly-client.local.php.dist` file to your `config/autoload` folder.
    
## Configuration

Set your subdomain and API key. If you are using Recurly.js, specify also your private key.

```php
<?php
return [
    'recurly' => [
        'subdomain'   => 'your-subdomain',
        'api_key'     => '012345678901234567890123456789ab',
        'private_key' => '0123456789abcdef0123456789abcdef',
    ],
];
```
