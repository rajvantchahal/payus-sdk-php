<?php 
namespace PayusAPI\Resources;

class Transaction extends Resource
{  
    /**
     * @param array $params Array of transaction start.
     * @return \PayusAPI\Http\Response
     */
    function start($params)
    {
        $endpoint = "https://api.paytrust88.com/v1/transaction/start";

        $options['json'] = $params;

        return $this->client->request('post', $endpoint, $options);
    }
    
    /**
     * @param array $params Array of transaction status.
     * @return \PayusAPI\Http\Response
     */
    function status($params = [])
    {
        $endpoint = "https://api.paytrust88.com/v1/transaction/status";

        $queryString = build_query_string($params);

        return $this->client->request('get', $endpoint, [], $queryString);
    }  
}