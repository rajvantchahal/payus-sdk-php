# PayusAPI PHP API client

## Setup

**Composer:**

```bash
composer require "payus/payus-sdk-php:dev-master"
```

## Quickstart

### Examples Using Factory

All following examples assume this step.

```php

// The only required value is the 'access_token'

$payusapi = new PayusAPI\Factory([
  'access_token'      => 'demo'
]);
```
*Note:* You can prevent any error handling provided by this package by passing following options into client creation routine:

```php
$payusapi = new PayusAPI\Factory([
  'access_token'      => 'demo'
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

$response = $payus->getAddressBalance(['coin' => 'BTC', 'address' => 'put btc address here']);

```

## Status

If you see something not planned, that you want, make an [issue](https://github.com/rajvantchahal/payus-sdk-php/issues) and there's a good chance I will add it.

### All methods

| method  | params | description |
| ------------- | ------------- | ------------- |
| getAddressBalance  | coin, address, destination_tag(for XRP only)  | Get address balance |
| paymentCryptoRest  | currency, return_url, coin_code, product_amount, invoice_id  | To create new customer transaction |
| getBalance  | transaction_id  | Get balance |
| getDepositTransactions  | coin_code  | Get deposite transactions |
| withdraw  | withdraw_fees, apikey, coin_code, amount, withdraw_address  | Withdraw |
| generateAddress  | coin_code | Generate address |
| saveAddress  | coin_code, m_id, request_data, response_data, coin_address | Save address |
| isValidAddress  | coin, address | Address valid check |
| isGreenAddress  | coin, address | Green address check |
| isGreenTransaction  | coin_code, transaction_id | Green transaction |
| getMyAddresses  | coin | Get address |
| getMycoinlist  | email_id | Get coin list |
| getRawTransaction  | coin, transaction_id | Get Raw transaction |
| trackPayment  | id | Track payment |
| sendEmail  | status, to_email, transaction_id | Send email |
| getPaymentButtonCoin  | merchant_id, button_type | Get payment button coin |
| payusModelApi  | app_id, api_key | Payus model API |