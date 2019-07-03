<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */
use Illuminate\Support\Facades\Log;

if (!function_exists('curlGet')) {
    function curlGet($url, $params = array(), $header = array())
    {
        try {
            $client = new \GuzzleHttp\Client();
            $header['headers'] = $header;
            $header['headers']['Accept'] = 'application/json';
            $url .= !empty($params) ? '?' . http_build_query($params) : '';
            $apiRequest = $client->request('GET', $url, $header);
            return json_decode($apiRequest->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error($e);
            return logErrorsMessage($e);
        }
    }
}

if (!function_exists('curlGetRaw')) {
    function curlGetRaw($url)
    {
        $client = new \GuzzleHttp\Client();
        $apiRequest = $client->request('GET', $url);
        return json_decode($apiRequest->getBody()->getContents(), true);
    }
}

if (!function_exists('curlPost')) {
    function curlPost($url, $params, $header = array())
    {
        try {
            $client = new \GuzzleHttp\Client();
            $form['headers'] = $header;
            $form['form_params'] = $params;
            $form['headers']['Accept'] = 'application/json';
            $apiRequest = $client->request('POST', $url, $form);
            return json_decode($apiRequest->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error($e);
            return logErrorsMessage($e);
        }
    }
}
if (!function_exists('curlPostForm')) {
    function curlPostForm($url, $params, $header = array())
    {
        try {
            $client = new \GuzzleHttp\Client();
            $form['headers'] = $header;
            $form['form_params'] = $params;
            $apiRequest = $client->request('POST', $url, $form);
            return json_decode($apiRequest->getBody()->getContents(), true);
        } catch (\Exception $e) {
            \Log::error("error::" . $e->getMessage());
            return logErrorsMessage($e);
        }
    }
}
if (!function_exists('curlPostJson')) {
    function curlPostJson($url, $params, $header = array())
    {
        try {
            $client = new \GuzzleHttp\Client();
            $form['headers'] = $header;
            $form['json'] = $params;

            $apiRequest = $client->request('POST', $url, $form);
            return json_decode($apiRequest->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error($e);
            return logErrorsMessage($e);
        }
    }
}

if (!function_exists('curlPut')) {
    function curlPut($url, $params, $header = array(), $user = '', $pass = '')
    {
        try {
            $client = new \GuzzleHttp\Client(['auth' => [$user, $pass]]);
            $form['headers'] = $header;
            $form['form_params'] = $params;
            $form['headers']['Accept'] = 'application/json';
            $apiRequest = $client->request('PUT', $url, $form);
            return json_decode($apiRequest->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error($e);
            return logErrorsMessage($e);
        }
    }
}

if (!function_exists('curlDelete')) {
    function curlDelete($url, $params, $header = array(), $user = '', $pass = '')
    {
        try {
            $client = new \GuzzleHttp\Client(['auth' => [$user, $pass]]);
            $form['headers'] = $header;
            $form['form_params'] = $params;
            $form['headers']['Accept'] = 'application/json';
            $apiRequest = $client->request('DELETE', $url, $form);
            return json_decode($apiRequest->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error($e);
            return logErrorsMessage($e);
        }
    }
}

if (!function_exists('logErrorsMessage')) {
    function logErrorsMessage($e)
    {
        $result = [];
        if ($e->getMessage() != null) {
            $result['errors'] = [
                'status' => $e->getCode(),
                'message' => $e->getMessage(),
            ];
        }
        \Log::error($e->getMessage());
        return $result;
    }
}
