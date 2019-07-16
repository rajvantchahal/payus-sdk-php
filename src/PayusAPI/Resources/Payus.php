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
}