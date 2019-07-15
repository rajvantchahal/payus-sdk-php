# PayusAPI PHP API client

## Setup

**Composer:**

```bash
composer require "webguru221/paytrust-php:dev-master"
```

## Quickstart

### Examples Using Factory

All following examples assume this step.

```php

// The only required value is the 'key'

$paytrust = new PayusAPI\Factory([
  'key'      => 'demo',
  'base_url' => 'https://api.paytrust88.com' // default
]);
```
*Note:* You can prevent any error handling provided by this package by passing following options into client creation routine:

```php
$paytrust = new PayusAPI\Factory([
  'key'      => 'demo',
  'base_url' => 'https://api.paytrust88.com' // default
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
use PayusAPI\Resources\Contacts;

$client = new Client(['key' => 'demo']);

$transaction = new Transaction($client);

$response = $transaction->start($params);

```

## Status

If you see something not planned, that you want, make an [issue](https://github.com/webguru221/paytrust-php/issues) and there's a good chance I will add it.

- [x] Transaction:
- [x] Payout:
- [x] Banking:
- [x] Report: