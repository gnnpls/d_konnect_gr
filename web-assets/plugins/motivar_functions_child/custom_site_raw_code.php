<?php
if ( ! defined( 'ABSPATH' ) ) exit;




if (!function_exists('konnect_rest_php')) {
    function konnect_rest_php($method, $url, $data = false, $json = true, $debug = false)
    {

        $result = array();
        $curl = curl_init();

        $data = apply_filters('konnect_rest_php_filter', $data, $url);
        $method = strtolower($method);
        switch ($method) {
            case "post":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data) {
                    $data = urldecode(http_build_query($data));
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            default:
                if ($data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }

        }

        // Optional Authentication:

        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_COOKIESESSION, true);
        if ($debug) {
            curl_setopt($curl, CURLOPT_VERBOSE, true);
        }

        $result = curl_exec($curl);
        if ($result !== false) {
            curl_close($curl);
        }

        if ($debug) {
            print_r($result);
            die();
        }

        if ($json) {
            $result = json_decode($result, true);
        }
        if (isset($result['code'])) {
            $result = array();
        }
        return $result;
    }
}
