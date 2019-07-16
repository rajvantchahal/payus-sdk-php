# PayusAPI PHP API client

## Setup

**Composer:**

```bash
composer require "rajvant.chahal/payus-sdk-php:dev-master"
```

## Quickstart

### Examples Using Factory

All following examples assume this step.

```php

// The only required value is the 'access_token'

$payusapi = new PayusAPI\Factory([
  'access_token'      => 'demo',
  'base_url' => 'https://payus.io:5000' // default
]);
```
*Note:* You can prevent any error handling provided by this package by passing following options into client creation routine:

```php
$payusapi = new PayusAPI\Factory([
  'access_token'      => 'demo',
  'base_url' => 'https://payus.io:5000' // default
],
null,
[
  'http_errors' => false // pass any Guzzle related option to any request, e.g. throw no exceptions
],
false // return Guzzle Response object for any ->request(*) call
);
```

By setting `http_errors` to false, you will not receive any exceptions at all, but pure responses.
For possible options, see http://docs.guzzlephp.org/en/latest/request-options.html.


### Example Without Factory

```php
<?php

require 'vendor/autoload.php';

use PayusAPI\Http\Client;
use PayusAPI\Resources\Payus;

$client = new Client(['access_token' => 'demo']);

$payus = new Payus($client);

$response = $payus->getAddressBalance($params);

```

## Status

If you see something not planned, that you want, make an [issue](https://github.com/rajvantchahal/payus-sdk-php/issues) and there's a good chance I will add it.

- [x] getAddressBalance: