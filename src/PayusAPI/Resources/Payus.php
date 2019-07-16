<?php 
namespace PayusAPI\Resources;

class Payus extends Resource
{  
    /**
     * @return \PayusAPI\Http\Response
     */
    function getAddressBalance($body)
    {
        $endpoint = "https://payus.io:5000/api/get_address_balance";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

    /**
     * @return \PayusAPI\Http\Response
     */
    function paymentCryptoRest($body)
    {
        $endpoint = "https://payus.io:5000/api/payment_crypto_rest";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

    /**
     * @return \PayusAPI\Http\Response
     * Get Balance
     */
    function getBalance($body)
    {
        $endpoint = "https://payus.io:5000/api/get_balance";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

    /**
     * @return \PayusAPI\Http\Response
     * get deposite transactions
     */
    function getDepositTransactions($body)
    {
        $endpoint = "https://payus.io:5000/api/get_balance";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

     /**
     * @return \PayusAPI\Http\Response
     * withdraw
     */
    function withdraw($body)
    {
        $endpoint = "https://payus.io:5000/api/withdraw";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

     /**
     * @return \PayusAPI\Http\Response
     * generate address
     */
    function generateAddress($body)
    {
        $endpoint = "https://payus.io:5000/api/generate_address";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

     /**
     * @return \PayusAPI\Http\Response
     * Save address
     */
    function saveAddress($body)
    {
        $endpoint = "https://payus.io:5000/api/save_address";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

     /**
     * @return \PayusAPI\Http\Response
     * Adress valid check
     */
    function isValidAddress($body)
    {
        $endpoint = "https://payus.io:5000/api/is_valid_address";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

     /**
     * @return \PayusAPI\Http\Response
     * Green address check
     */
    function isGreenAddress($body)
    {
        $endpoint = "https://payus.io:5000/api/is_green_address";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

     /**
     * @return \PayusAPI\Http\Response
     * Green transaction
     */
    function isGreenTransaction($body)
    {
        $endpoint = "https://payus.io:5000/api/is_green_transaction";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

    /**
     * @return \PayusAPI\Http\Response
     * Get address
     */
    function getMyAddresses($body)
    {
        $endpoint = "https://payus.io:5000/api/get_my_addresses";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

    /**
     * @return \PayusAPI\Http\Response
     * Get coin list
     */
    function getMycoinlist($body)
    {
        $endpoint = "https://payus.io:5000/api/getmycoinlist";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

    /**
     * @return \PayusAPI\Http\Response
     * Get Raw transaction
     */
    function getRawTransaction($body)
    {
        $endpoint = "https://payus.io:5000/api/get_raw_transaction";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

    /**
     * @return \PayusAPI\Http\Response
     * Track payment
     */
    function trackPayment($body = [])
    {
        $endpoint = "https://payus.io:5000/api/track_payment/";

        $queryString = build_query_string($body);

        return $this->client->request('get', $endpoint, [], $queryString);
    }

    /**
     * @return \PayusAPI\Http\Response
     * Send email
     */
    function sendEmail($body)
    {
        $endpoint = "https://payus.io:5000/api/send_email";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }

    /**
     * @return \PayusAPI\Http\Response
     * Get payment button coin
     */
    function getPaymentButtonCoin($body = [])
    {
        $endpoint = "https://payus.io:5000/api/payment/";

        $queryString = build_query_string($body);

        return $this->client->request('get', $endpoint, [], $queryString);
    }

    /**
     * @return \PayusAPI\Http\Response
     * Payus model API
     */
    function payusModelApi($body)
    {
        $endpoint = "https://payus.io:5000/api/payment/payus_model_api";

        $options['json'] = $body;

        return $this->client->request('post', $endpoint, $options);
    }
}