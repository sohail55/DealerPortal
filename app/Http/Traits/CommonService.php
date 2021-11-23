<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use GuzzleHttp\Client;
use App\CodeException;
use Illuminate\Support\Facades\Session;
use App\Helpers\helper;


trait CommonService
{

    public function pageNotFound($message)
    {
        echo "<pre>";
        print_r($message);
        exit;
    }

    public function jsonErrorResponse($error, $code = 204)
    {
        $response = [];
        $response['success'] = false;
        $response['message'] = $error;
        $response['status_code'] = $code;
        return Response::json($response);
    }

    public function jsonSuccessResponse($msg, $data = [], $code = 200)
    {
        $response = [];
        $response['success'] = true;
        $response['data'] = $data;
        $response['message'] = $msg;
        $response['status_code'] = $code;
        return Response::json($response);
    }

    public function jsonSuccessResponseWithoutData($msg, $code = 200)
    {
        $response = [];
        $response['success'] = true;
        $response['message'] = $msg;
        $response['status_code'] = $code;

        return Response::json($response);
    }

    /**
     * storeException method
     * @param type $ex
     */
    public function storeException($ex)
    {
        // echo '<pre>';
        // print_r($ex);exit;
        $this->saveException($ex);
        return redirect()->route('home', ['lang' => session()->get('locale')])->with('error_message', $ex->getMessage());
    }

    /**
     * saveExceptionInDatabase method
     * @param type $ex
     */
    public function saveException($ex)
    {

        $exceptions = new CodeException();
        $exception['exception_file'] = $ex->getFile();
        $exception['exception_line'] = $ex->getLine();
        $exception['exception_message'] = $ex->getMessage();
        $exception['exception_url'] = \Request::url();
        $exception['exception_code'] = $ex->getCode();
        $exception['user_id'] = !empty(\Auth::user()->id) ? \Auth::user()->id : 0;
        $exceptions->create($exception);
    }

    public function guzzleRequest($slug, $method, $params = NULL)
    {

        try {

            $URL = config('config.apis_url') . $slug;
            $client = new Client(['base_uri' => config('config.apis_url')]);
            $res = $client->request($method, $URL, $params);
            $status = $res->getStatusCode();
            \Log::info($status);
            if ($status == 200) {
                $resBodyContents = $res->getBody()->getContents();
                \Log::info($resBodyContents);
                $resBodyContents = json_decode($resBodyContents, true);

                return $resBodyContents;
            } else {
                return $this->jsonErrorResponse('Server responded with a status code of ' . $status);
            }
        } catch (RequestException $e) {
            $req = Psr7\str($e->getRequest());
            return $this->jsonErrorResponse($req);
        }
    }
    public function guzzleRequestForlive($slug, $method, $params = NULL)
    {
        try {

            $URL = 'http://apis-v4.mgasha.com/api/' . $slug;
            $client = new Client(['base_uri' => 'http://apis-v4.mgasha.com/api/']);
            $res = $client->request($method, $URL, $params);
            $status = $res->getStatusCode();
            if ($status == 200) {
                $resBodyContents = $res->getBody()->getContents();
                $resBodyContents = json_decode($resBodyContents, true);

                return $resBodyContents;
            } else {
                return $this->jsonErrorResponse('Server responded with a status code of ' . $status);
            }
        } catch (RequestException $e) {
            $req = Psr7\str($e->getRequest());
            return $this->jsonErrorResponse($req);
        }
    }

    public function curl_request($endPoint , $dataArray = NULL)
    {
        try {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://192.168.170.140:1999/api/'.$endPoint);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataArray)); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
            $headers = [
                'Content-Type: application/json'
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $server_output = curl_exec($ch) ;
            curl_close ($ch);
            return $userSignup = json_decode($server_output, true) ;

        } catch (RequestException $e) {
            $req = Psr7\str($e->getRequest());
            return $this->jsonErrorResponse($req);
        }
    }

}
