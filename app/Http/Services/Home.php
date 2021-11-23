<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Services;

/**
 * Description of Home
 *
 * @author 
 */

use App\Http\Services\Config;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Session;
use Validator;
use Response;
use Carbon\Carbon;
use App\ComplaintHistory;
use App\MembersSignup;
use Mail;
class Home extends Config
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function plotsList()
    {
        return view('plots_list');
    }

    public function profile($id)
    {
        $appID = $id;
        return view('profile',compact('appID'));
    }

    public function editProfile($id)
    {
        $appID = $id;
        return view('edit_profile',compact('appID'));
    }

    public function newComplaint()
    {
        return view('complaint');
    }

    public function uploadChallan()
    {
        $user_id = Session::get('userInfo')[0]['MemberUserId'];

        $images = $this->getChallanImageModel()->getUserChallanImages($user_id);
        //dd($images);
        return view('uploadChallan', compact('images'));
    }

    public function notifications()
    {
        $user_id = Session::get('userInfo')[0]['MemberUserId'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'Notification/GETGeneral?userid='.$user_id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $notifications = json_decode($server_output, true);
        $user_notifications = [];
        if(isset($notifications['Status']) && $notifications['Status'] == 200) {
            foreach($notifications['data'] as $notification) {
                // if($notification['Seen'] == 0) {
                    $user_notifications[$notification['NotificationId']] = $notification;
                //}
            }
            Session::put('total_notifications', $user_notifications);
        }
        //dd($notifications);
        $date = Carbon::parse('2021-10-04 17:34:15.984512', 'UTC');
        $last_date = $date->isoFormat('Do MMMM, YY');
        return view('notification_lists', compact('user_notifications','last_date'));
    }

    public function notification_detail($notification_id)
    {
        $user_id = Session::get('userInfo')[0]['MemberUserId'];
        $old_notifications = Session::get('total_notifications');
        // echo '<pre>';
        // echo $notification_id.' '.$user_id;
        // dd($old_notifications);exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'Notification/UpdateSeen?userid='.$user_id.'&Notificationid='.$notification_id);
        //curl_setopt($ch, CURLOPT_POST, 1);
       // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'Notification/GETGeneral?userid='.$user_id);
        //curl_setopt($ch, CURLOPT_POST, 1);
       // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $notifications = json_decode($server_output, true);
        $user_notifications = [];
        if(isset($notifications['Status']) && $notifications['Status'] == 200) {
            foreach($notifications['data'] as $notification) {
                //dd($notification);
                if($notification['Seen'] == 0) {
                    $user_notifications[$notification['NotificationId']] = $notification;
                }
            }
            //dd($user_notifications);
            Session::put('unread_notifications', $user_notifications);
            if($old_notifications)
                Session::put('total_notifications', $old_notifications);
        }
        //dd(Session::get('total_notifications'));
       // $notifications = json_decode($server_output, true);
        $date = Carbon::parse('2021-10-04 17:34:15.984512', 'UTC');
        $last_date = $date->isoFormat('Do MMMM, YY');
        return view('notification_detail',compact('notification_id','last_date'));
    }


    public function updateProfile()
    {
        $request_params = Request::input();
        unset($request_params['_token']);
        unset($request_params['ajax_submit']);
        //dd($request_params);

        $data['AppID']    = isset($request_params['AppID']) ? $request_params['AppID'] : '';
        $data['RefrenceNo']    = isset($request_params['RefrenceNo']) ? $request_params['RefrenceNo'] : '';
        $data['Name']    = isset($request_params['Name']) ? $request_params['Name'] : '';
        $data['cnic']     = isset($request_params['CNIC']) ? $request_params['CNIC'] : '';
        $data['FatherName']     = isset($request_params['FatherName']) ? $request_params['FatherName'] : '';
        $data['MAddress'] = isset($request_params['bill_to_address_line1']) ? $request_params['bill_to_address_line1'] : '';
        $data['Paddress'] = isset($request_params['bill_to_address_line1']) ? $request_params['bill_to_address_line1'] : '';
        $data['Email']    = isset($request_params['bill_to_email']) ? $request_params['bill_to_email'] : '';
        $data['Mobile']   = isset($request_params['bill_to_phone']) ? $request_params['bill_to_phone'] : '';
        $data['DOB']   = isset($request_params['DOB']) ? $request_params['DOB'] : '';
        $data['NewMembershipNo']   = isset($request_params['NewMembershipNo']) ? $request_params['NewMembershipNo'] : '';
        $data['membershipID']   = isset($request_params['membershipID']) ? $request_params['membershipID'] : '';
        

        $profile_data = json_encode($data);

        //dd($profile_data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'MemberDataUpdate');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $profile_data); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            //'Authorization: Bearer '.$token,
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $member_update = json_decode($server_output, true) ;
        //dd($member_update);

        if($member_update['Status'] == 200) {

            //foreach($member_update['MemberData'] as $result) {
            $newResult[$member_update['MemberData']['AppID']] = $member_update['MemberData'];
            //dd($newResult);
               // }
            Session::put('memberData', $newResult);
            return redirect()->route('editProfile', ['id' => $request_params['AppID']])->with('success_message', $member_update['Message']);
        }
        else
        {
            return redirect()->route('editProfile')->with('error_message', $member_update['Message']);
        }
    }

    public function viewLedger($app_id)
    {
        $client = new Client(['base_uri' => config('config.apis_url_test')]);
        $res = $client->request('get', 'Installment?appid='.$app_id.'&source=web');
        $status = $res->getStatusCode();
        
        $resBodyContents = $res->getBody()->getContents();
        $member_ledger = json_decode($resBodyContents, true);
       //dd($member_ledger);
        if(isset($member_ledger['0']['Status']) && $member_ledger['0']['Status'] == 400) {
            return redirect('/plotsList')->with('error_message', $member_ledger[0]['Message']);
        } else {
            Session::put('ledger.RefrenceNo', $member_ledger['0']['RefrenceNo']);
            Session::put('ledger.Plot_No', $member_ledger['0']['Plot_No']);
            return view('member_ledger', compact('member_ledger'));
        }
    }


    public function getChallanFields($app_id)
    {
        $client = new Client(['base_uri' => config('config.apis_url_test')]);
        $res = $client->request('get', 'challanGeneration?appid='.$app_id);
        $status = $res->getStatusCode();

        Session::put('appid', $app_id);
        
        if ($status == 200) {
            $resBodyContents = $res->getBody()->getContents();
            $generate_challan = json_decode($resBodyContents, true);
        } else {
            return $this->jsonErrorResponse('Server responded with a status code of ' . $status);
        }
        //dd($generate_challan);
        return view('generate_challan', compact('generate_challan'));
    }

    public function challanGeneration()
    {
        //echo request()->segment(1);exit;

        $request_params = Request::input();
        //dd($request_params);
        unset($request_params['_token']);
        if(empty($request_params))
        {
            return view('user_detail');
        }
        //dd($request_params);
        Session::put('ledger.total_amount', $request_params['total_amount']);
        //dd($request_params);
        if(Session::has('appid'))
            $data['value']['MemberId'] = Session::get('appid');
        $i = 0;
        foreach($request_params['payment_type'] as $key=>$val)
        {
            $data['value']['Fields'][$i]['PaymentTypeID'] = $key;
            $data['value']['Fields'][$i]['Amount'] = !empty($val) ? $val : "0";
            $i++;
        }
        //dd(json_encode($data));
        $payment_request = json_encode($data);

        //dd($payment_request);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'challanGeneration');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payment_request); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            //'Authorization: Bearer '.$token,
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $payment_response = json_decode($server_output, true) ;
        //dd($payment_response);
    
        if (isset($payment_response['Status']) && $payment_response['Status'] == 200) {
            $pdf_file = $payment_response['Challanpath'];
            
            //Getting Challan No with Extension Only
            $pdf_file_array = explode("/",$pdf_file);
            $pdf_file_name = $pdf_file_array['4'];
              
            // return Response::make(
            //     $pdf_file,
            //     200,
            //     array(
            //         'Content-Description' => 'File Transfer',
            //         'Cache-Control' => 'public, must-revalidate, max-age=0, no-transform',
            //         'Pragma' => 'public',
            //         'Expires' => 'Sat, 26 Jul 1997 05:00:00 GMT',
            //         'Last-Modified' => ''.gmdate('D, d M Y H:i:s').' GMT',
            //         'Content-Type' => 'application/pdf', false,
            //         'Content-Disposition' => ' attachment; filename="'.$pdf_file_name.'";',
            //         'Content-Transfer-Encoding' => ' binary',
            //         'Content-Length' => ' '.strlen($pdf_file),
            //         //'Access-Control-Allow-Origin' => $origin,
            //         'Access-Control-Allow-Methods' =>'GET, PUT, POST, DELETE, HEAD, PATCH',
            //         'Access-Control-Allow-Headers' =>'accept, origin, content-type',
            //         'Access-Control-Allow-Credentials' => 'true')
            //     );

            if(isset($request_params['payment_method']) && $request_params['payment_method']=='Pay Online')
            {
                Session::put('ledger.challan_no',$payment_response['ChallanNo']);
                return view('user_detail');
            }
            else
            {    
                header('HTTP/1.0 200 OK', true, 200);
                //header("Location: $pdf_file");
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $pdf_file_name . '"');
                // header('Content-Transfer-Encoding: binary');
                // header('Content-Length:'.filesize($pdf_file));
                // header('Accept-Ranges: bytes');
                @readfile($pdf_file);
                exit;
            }
            
        } else if($payment_response['Status'] == 400) {
            return redirect('/getChallanFields/'.Session::get('appid'))->with('error_message', $payment_response['Message']);
        }
       // return view('generate_challan', compact('generate_challan'));
    }

    public function paymentConfirmation() {
        $request_params = Request::input();
        //dd($request_params);

        unset($request_params['_token']);
        Session::put('payment_details',$request_params);

        return view('payment_confirmation');
    }

    public function paymentConfirmationMobile() {
        $request_params = Request::input();
        //dd($request_params);

        unset($request_params['_token']);
        Session::put('payment_details',$request_params);

        return view('payment_confirmation_mobile');
    }

    
    
    public function challancc() {

        // $order = $request->getContent();
        // $order = json_decode($order, true);

        // get the 'id' key which is your order id    
        $order_id = Session::get('ledger.challan_no');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://bankalfalah.gateway.mastercard.com/api/rest/version/54/merchant/DHALAHOREMUL/order/$order_id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        
        $headers = [
            'Authorization: Basic '.base64_encode("merchant.DHALAHOREMUL:89d5dbe6f2f7083e5efb75227d302c00"),
            'Content-Type: application/json',
            'Host: bankalfalah.gateway.mastercard.com',
            'Referer: https://eapp.dhamultan.org', //Your referrer address
            'cache-control: no-cache',
            'Accept: application/json'
        ];
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $json = json_decode($server_output, true) ;

        if(isset($json['result'])&&$json['result']=='SUCCESS'&&isset($json['id'])&&$json['id']!='')
        {
            $amount = $json['amount'];
            $result = $json['result'];
            $request_id = $json['id'];
            $card_number = $json['sourceOfFunds']['provided']['card']['number'];
            $name_on_card = $json['sourceOfFunds']['provided']['card']['nameOnCard'];
            $ipAddress = $json['device']['ipAddress'];
            
            $challan_no = Session::get('ledger.challan_no');
            $reference_no = Session::get('ledger.RefrenceNo');
            $app_id = Session::get('appid');
            $member_name = Session::get('userInfo')[0]['Name'];
            $member_cnic = Session::get('userInfo')[0]['CNIC'];
        }


        $user_id =  isset(Session::get('userInfo')[0]['MemberUserId']) ? Session::get('userInfo')[0]['MemberUserId'] : '';

        //Save In members_transactions 
        $member_transaction['user_id']  = $user_id;
        $member_transaction['challan_no']  = $challan_no;
        $member_transaction['app_ref_no']  = $reference_no;
        $member_transaction['app_id']  = $app_id;
        $member_transaction['payment_date']  = date('d-m-Y',time());
        $member_transaction['br_code']  = '000';
        $member_transaction['br_name']  = 'IPG';
        $member_transaction['amount']  = $amount;
        $member_transaction['bank_id']  = 'BAF';
        $member_transaction['request_id']  = $request_id;
        $member_transaction['card_no']  = $card_number;
        $member_transaction['ip_address']  = Request::ip();

        $this->getMembersTransactionModel()->insert($member_transaction);

        $payment_request_array['app_id'] = $app_id;
        $payment_request_array['challa_no'] = $challan_no;
        $payment_request_array['reference_no'] = $reference_no;
        $payment_request_array['payment_date'] = date('d-m-Y',time());
        $payment_request_array['br_code'] = '000';
        $payment_request_array['br_name'] = 'IPG';
        $payment_request_array['amount'] = "$amount";
        $payment_request_array['bank_name'] = 'BAF';
        $payment_request_array['transaction_type'] = 'CC';
        $payment_request_array['request_id'] = "$request_id";
        $payment_request_array['card_number'] = "$card_number";
        //$payment_request_array['param']['name_on_card'] = "$name_on_card";
        $payment_request_array['ip_address'] = Request::ip();

        $payment_request = json_encode($payment_request_array);
    
        //Payment Details
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'PostTransaction');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payment_request); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        // $headers = [
        //     'Authorization: Bearer '.$token,
        //     'Content-Type: application/json'
        // ];
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $payment_response = json_decode($server_output, true);
        //dd($payment_response);
        if(isset($payment_response[0]['ResponseCode'])&&$payment_response[0]['ResponseCode']==100)
        {
            return view('payment_success');
        }
        else if(isset($payment_response[0]['ResponseCode'])&&$payment_response[0]['ResponseCode'] !=100)
        {
            return redirect()->route('challanGeneration')->with('error_message', $payment_response[0]['Message']);
        }

        //dd($payment_response);

    }
        
    public function signUp()
    {
        return view('signup');
    }

    public function signIn()
    {
        return view('welcome');
    }

    public function forgotPassword()
    {
        return view('forgotPassword');
    }

    public function memberSignup() {
        $request_params = Request::input();
        unset($request_params['_token']);

        //dd(Request::ip());
        if(strlen($request_params['Cnic']) < 13) {
            return redirect('/signUp')->withInput($request_params)->with('error_message', 'Please enter 13 digit of your CNIC No.');
        }
        if($request_params['password'] != $request_params['retype_password'])
            return redirect('/signUp')->with('error_message', 'Your password does not matched.');

        $data['value']['UserName'] = $request_params['username'];
        $data['value']['Cnic'] = $request_params['Cnic'];
        $data['value']['pwd'] = $request_params['retype_password'];
        $data['value']['MachineName'] = 'aaaaa';
        $data['value']['IpAddress'] = Request::ip();

        //dd($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'MemberUserSignUp');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $userSignup = json_decode($server_output, true);
       // dd($userSignup);

        if(!empty($userSignup) && !empty($userSignup['Status']) && $userSignup['Status'] != 400)
        {
            if($userSignup['Status'] == 200) {
                $member['user_id']   = $userSignup['data']['UserId'];
                $member['otp']       = $userSignup['data']['otp'];
                $member['username']  = $request_params['username'];
                //dd($member);
                $this->getMembersSignupModel()->insert($member);
                // $data['otp'] = $userSignup['data']['otp'];
                // $data['UserId'] = $userSignup['data']['UserId'];
                // $data['UserName'] = $request_params['username'];
                //Session::put('userVerification', $data);
               // return view('otp_verify', compact('data'));
                return redirect()->route('otpVerify')->with('success_message', $userSignup['Message']);
            }  
            return redirect()->route('dashboard')->with('success_message', 'You have sign up successfully.');
        }
        else {
            return redirect()->route('signUp')->with('error_message', $userSignup['Message']);
        }
    }

    public function login() {
        $request_params = Request::input();
        unset($request_params['_token']);

        //dd($request_params);

        if(empty($request_params['password']) OR empty($request_params['username']))
            return redirect('/signUp')->with('error_message', 'Your password does not matched.');

        $data['value']['UserName'] = $request_params['username'];
        $data['value']['pwd'] = $request_params['password'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'MemberLogin/');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $userLogin = json_decode($server_output, true) ;
        //dd($userLogin);

        if(!empty($userLogin) && is_array($userLogin) && isset($userLogin['status']) && $userLogin['status'] == 200)
        {
            if(!empty($userLogin['Message'])) {
              return redirect()->route('login')->with('error_message', $userLogin['Message']);  
            }
            if(Session::has('userInfo')){
                Session::forget('userInfo');
            }else {
                $data = $userLogin['data'];
                $user_data = $userLogin['data'];

                foreach($user_data as $result) {
                    $newResult[$result['AppID']] = $result;
                }
                //dd($newResult);
                // $memberData['AppID'] = $data[0]['AppID'];
                // $memberData['RefrenceNo'] = $data[0]['RefrenceNo'];
                // $memberData['MAddress'] = $data[0]['MAddress'];
                // $memberData['Paddress'] = $data[0]['Paddress'];
                // $memberData['Email'] = $data[0]['Email'];
                // $memberData['Mobile'] = $data[0]['Mobile'];
                // $memberData['Name'] = $data[0]['Name'];
                // $memberData['CNIC'] = $data[0]['CNIC'];
                // $memberData['FatherName'] = $data[0]['FatherName'];
                // $memberData['NewMembershipNo'] = $data[0]['NewMembershipNo'];
                // $memberData['membershipID'] = $data[0]['membershipID'];
                // $memberData['DOB'] = date('d-m-Y',strtotime($data[0]['DOB']));

                Session::put('userInfo', $data);
                Session::put('memberData', $newResult);
            }

            $user_id =  $userLogin['data'][0]['MemberUserId'];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'Notification/GETGeneral?userid='.$user_id);
            //curl_setopt($ch, CURLOPT_POST, 1);
           // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
            $headers = [
                'Content-Type: application/json'
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $server_output = curl_exec($ch) ;
            curl_close ($ch);
            $notifications = json_decode($server_output, true);
            $user_notifications = [];
            if(isset($notifications['Status']) && $notifications['Status'] == 200) {
                foreach($notifications['data'] as $notification) {
                    if($notification['Seen'] == 0) {
                        $user_notifications[$notification['NotificationId']] = $notification;
                    }
                }
                //dd($user_notifications);
                Session::put('unread_notifications', $user_notifications);
                Session::put('total_notifications', $user_notifications);
            }

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'NDC/ndcstatus?userid='.$user_id);
            //curl_setopt($ch, CURLOPT_POST, 1);
           // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
            $headers = [
                'Content-Type: application/json'
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $server_output = curl_exec($ch) ;
            curl_close ($ch);
            $ndcResult = json_decode($server_output, true);
            if(isset($ndcResult['status']) && $ndcResult['status'] == 200) {
                Session::put('ndc_result', $ndcResult['data']);
            }
            //dd($ndcResult);
            return redirect()->route('dashboard')->with('success_message', 'You have logged in successfully.');
        }
        elseif(isset($userLogin['Status']) && $userLogin['Status'] == 201) {
            $member['user_id']   = $userLogin['data']['UserId'];
            $member['otp']       = $userLogin['data']['otp'];
            $member['username']  = $request_params['username'];
            $this->getMembersSignupModel()->insert($member);
            return redirect()->route('otpVerify')->with('success_message', $userLogin['Message']);
        }
         else {  
            return redirect()->route('login')->with('error_message', $userLogin['Message']);
        }
    }

    public function otpVerify() {

        //$data = $this->getMembersSignupModel()->getMemberSignup();
        //dd($result);
        // $request_params = Request::input();
        // unset($request_params['_token']);
        //dd($request_params);
        //if(!empty($request_params))
        // $data = [];
        // if(Session::has('userVerification') && empty($request_params)) {
        //     //echo '1';exit;
        //     // $data['otp'] = Session::get('userVerification.otp');
        //     // $data['UserId'] = Session::get('userVerification.UserId');
        //     // $data['UserName'] = Session::get('userVerification.UserName');

        //     $user_id = Session::get('userVerification.user_id');

        //     //dd(Session::get('userVerification')[$user_id]['otp']);
        //     //dd($user_id);
        //     $data['user_id'] = $user_id;
        //     $data[$user_id]['otp'] = Session::get('userVerification')[$user_id]['otp'];
        //     $data[$user_id]['UserId'] = Session::get('userVerification')[$user_id]['UserId'];
        //     $data[$user_id]['UserName'] = Session::get('userVerification')[$user_id]['UserName'];
        // }
        //if(!empty($data))
            return view('otp_verify');
    }

    public function forgotOTPVerify() {
        $request_params = Request::input();
        unset($request_params['_token']);
        //dd($request_params);
        //if(!empty($request_params))
        $data = [];
        if(Session::has('userVerification') && empty($request_params)) {
            //echo '1';exit;
            $data['otp'] = Session::get('userVerification.otp');
            $data['UserId'] = Session::get('userVerification.UserId');
            $data['UserName'] = Session::get('userVerification.UserName');
        }
        
        return view('forgot_otp_verify',compact('data'));
    }

    public function verifyUser() {
        $request_params = Request::input();
        unset($request_params['_token']);
        //dd($request_params);
        if(!empty($request_params['user_otp']) && strlen($request_params['user_otp']) == 4) {
            $data = $this->getMembersSignupModel()->getMemberSignup($request_params['user_otp']);
        }
        //dd($data);
        if(empty($data))
        {
            return redirect()->route('otpVerify')->with('error_message', 'Your OTP code is not correct.');
        }
        else {
            //dd($data);
            $result['value']['UserName'] = $data[0]['username'];
            $result['value']['otp']      = $request_params['user_otp'];
            $result['value']['UserId']   = $data[0]['user_id'];
            $result['value']['MachineName'] = 'aaaaa';

            //dd(json_encode($result));
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'otp/verify');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($result)); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
            $headers = [
                'Content-Type: application/json'
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $server_output = curl_exec($ch) ;
            curl_close ($ch);
            $userVerify = json_decode($server_output, true) ;
            
           // dd($userVerify);
            if(!empty($userVerify) && isset($userVerify['status']) && $userVerify['status'] == 200)
            {
                if(Session::has('userInfo')){
                    Session::forget('userInfo');
                }else {
                    $userData = $userVerify['data'];
                    $user_data = $userVerify['data'];


                    foreach($user_data as $result) {
                        $newResult[$result['AppID']] = $result;
                    }

                    Session::put('userInfo', $userData);
                    Session::put('memberData', $newResult);
                }

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'Notification/GETGeneral?userid='.$data[0]['user_id']);
                //curl_setopt($ch, CURLOPT_POST, 1);
               // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
                $headers = [
                    'Content-Type: application/json'
                ];

                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $server_output = curl_exec($ch) ;
                curl_close ($ch);
                $notifications = json_decode($server_output, true);
                $user_notifications = [];
                if(isset($notifications['Status']) && $notifications['Status'] == 200) {
                    foreach($notifications['data'] as $notification) {
                        if($notification['Seen'] == 0) {
                            $user_notifications[$notification['NotificationId']] = $notification;
                        }
                    }
                    Session::put('unread_notifications', $user_notifications);
                    Session::put('total_notifications', $user_notifications);
                }
                $this->getMembersSignupModel()->deleteMemberSignup($data[0]['user_id']);
                return redirect()->route('dashboard')->with('success_message', 'You have logged in successfully.');
            }
            elseif(isset($userVerify['Status']) && $userVerify['Status'] == 400) {
                return redirect()->route('otpVerify')->with('error_message', $userVerify['Message']);
            }
        }
        return view('otp_verify',compact('data'));
    }

    public function resendOTP(){
        $request_params = Request::input();
        unset($request_params['_token']);

        $result  = $this->getMembersSignupModel()->getAllMember();

        if(!empty($result)) {
            $data['value']['UserName'] = $result[0]['username'];
            $data['value']['UserId'] = $result[0]['user_id'];
            $data['value']['MachineName'] = 'aaaaa';
            $data['value']['IpAddress'] = Request::ip();

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'otp/resendotp');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
            $headers = [
                'Content-Type: application/json'
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $server_output = curl_exec($ch) ;
            curl_close ($ch);
            $userVerify = json_decode($server_output, true) ;
            //dd($userVerify);
            if(!empty($userVerify) && !empty($userVerify['Status']) && $userVerify['Status'] != 400)
            {
                if($userVerify['Status'] == 200) {

                    $member['user_id']   = $userVerify['data']['UserId'];
                    $member['otp']       = $userVerify['data']['otp'];
                    $member['username']  = $result[0]['username'];

                    $this->getMembersSignupModel()->deleteMemberSignup($result[0]['user_id']);
                    //dd($member);
                    $this->getMembersSignupModel()->insert($member);
                    // $data['otp'] = $userVerify['data']['otp'];
                    // $data['UserId'] = $userVerify['data']['UserId'];
                    // $data['UserName'] = $request_params['UserName'];
                    // Session::put('userVerification', $data);
                    //return view('otp_verify', compact('data'));
                    return redirect()->route('otpVerify')->with('success_message', $userVerify['Message']);
                }
            }
        }
    }


    public function recoverPassword() {
        $request_params = Request::input();
        unset($request_params['_token']);

        // if($request_params['password']!=$request_params['confirm_password'])
        //     return redirect('/signUp')->with('error_message', 'Your password does not matched.');

        $data['value']['Cnic'] = !empty($request_params['Cnic']) ? $request_params['Cnic'] :'' ;
        $data['value']['MachineName'] = 'aaaa' ;
        $data['value']['IpAddress']   = Request::ip();
        //$data['value']['Email'] = !empty($request_params['email']) ? $request_params['email'] :';';

        Session::put('userDetail.Cnic',$request_params['Cnic']);
        //Session::put('userDetail.Email',$request_params['email']);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'otp/ForgotPwd');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $forgotPassword = json_decode($server_output, true) ;
        //dd($request_params);

        if(!empty($forgotPassword) && $forgotPassword['Status'] != 400)
        {
             if($forgotPassword['Status'] == 200) {
                $data['otp'] = $forgotPassword['data']['otp'];
                $data['UserId'] = $forgotPassword['data']['UserId'];
                $data['UserName'] = $request_params['username'];
                Session::put('userVerification', $data);
               // return view('otp_verify', compact('data'));
                return redirect()->route('forgotOTPVerify')->with('success_message', $forgotPassword['Message']);
            }
            // if(Session::has('userInfo')){
            //     Session::forget('userInfo');
            // }else {
            //     $data['value']['ApplicantId'] = $userSignup['ApplicantId'];
            //     $data['value']['Name'] = !empty($userSignup['Name']) ? $userSignup['Name']: '';
            //     $data['value']['Email'] = !empty($userSignup['Email']) ? $userSignup['Email']: '';
            //     $data['value']['Password'] = !empty($userSignup['Password']) ? $userSignup['Password']: '';

            // Session::put('userInfo', $data);
            // }
            //dd('i am here');
            return redirect()->route('changePassword');
        }
        else {
            return redirect()->route('forgotPassword')->with('error_message', $forgotPassword['Message']);
        }
        //dd($data);
    }

    public function newPassword() {
        return view('updatePassword');
    }
    
    public function changePassword() {
        return view('otp');
    }

    public function setPassword() {
        $request_params = Request::input();
        unset($request_params['_token']);
        if($request_params['user_otp'] != $request_params['otp']) {
            return redirect()->route('otpVerify')->with('error_message', 'Your OTP code is not correct.');
        }
        else {
            $data['UserId']  = !empty($request_params['UserId']) ? $request_params['UserId'] :'' ;
            $data['UserName']  = !empty($request_params['UserName']) ? $request_params['UserName'] :'' ;
            //dd($request_params);
            return view('newPassword',compact('data'));
        }
    }
    
    public function updatePassword() {

        $request_params = Request::input();
        unset($request_params['_token']);

        //dd($request_params);
        if($request_params['password']!=$request_params['confirm_password'])
             return redirect('/updatePassword')->with('error_message', 'Your password does not matched.');
        
        $data['value']['UserId']  = !empty($request_params['UserId']) ? $request_params['UserId'] :'' ;
        $data['value']['oldpwd']  = '';
        $data['value']['newpwd']  = !empty($request_params['confirm_password']) ? $request_params['confirm_password'] :'' ;
        $data['value']['forgetpwd']  = 'false';
       
        //dd(json_encode($data));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'otp/chagepwd');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $updatePassword = json_decode($server_output, true);
        if(!empty($updatePassword) && $updatePassword['Status'] != 400)
        {
            Session::forget('userDetail');
            return redirect()->route('login')->with('success_message', 'Your password has been updated.');
        }
        else {
            return redirect()->route('updatePassword')->with('error_message', $updatePassword['Message']);
        }
    }

    public function updateNewPassword() {

        $request_params = Request::input();
        unset($request_params['_token']);
        unset($request_params['ajax_submit']);

        //dd($request_params);
        if($request_params['new_password']!=$request_params['confirm_password'])
            return redirect('/newPassword')->with('error_message', 'Your password does not matched.');

        $data['value']['UserId']  = !empty($request_params['UserId']) ? $request_params['UserId'] :'' ;
        $data['value']['oldpwd']  = !empty($request_params['old_password']) ? $request_params['old_password'] :'' ;
        $data['value']['newpwd']  = !empty($request_params['confirm_password']) ? $request_params['confirm_password'] :'' ;
        $data['value']['forgetpwd']  = 'true';
    
        //dd(json_encode($data));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'otp/chagepwd');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $updatePassword = json_decode($server_output, true);

        //dd($updatePassword);
        if(!empty($updatePassword) && $updatePassword['Status'] != 400)
        {
            return redirect()->route('newPassword')->with('success_message', 'Your password has been updated.');
        }
        else {
            return redirect()->route('newPassword')->with('error_message', $updatePassword['Message']);
        }
    }

    public function savePassword() {

        $request_params = Request::input();
        unset($request_params['_token']);

        if(!empty($request_params['old_password']) && $request_params['old_password'] != Session::get('userInfo')['value']['Password'])
        {
            return redirect('/dashboard')->with('error_message', 'Your old password does not matched.');
        }
        if($request_params['new_password']!=$request_params['confirm_password']) {
            return redirect('/dashboard')->with('error_message', 'Your password does not matched.');
        }


        if(Session::has('userInfo')) {
            $data['value']['Cnic']  = !empty(Session::get('userInfo')['value']['Cnic']) ? Session::get('userInfo')['value']['Cnic'] :'' ;
            $data['value']['Email']  = !empty(Session::get('userInfo')['value']['Email']) ? Session::get('userInfo')['value']['Email'] :'' ;
            $data['value']['Password'] = !empty($request_params['new_password']) ? $request_params['new_password'] :'' ;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.dhamultan.org/api/v1/int/hr/api/UpdatePassword');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $updatePassword = json_decode($server_output, true);
        if(!empty($updatePassword) && $updatePassword['Status'] != 400)
        {
            return redirect()->route('dashboard')->with('success_message', 'Your password has been changed successfully.');
        }
        else {
            return redirect()->route('dashboard')->with('error_message', $updatePassword['Message']);
        }
    }

    // public function ndc_status() {

    //     $userId = isset(Session::get('userInfo')[0]['MemberUserId']) ? Session::get('userInfo')[0]['MemberUserId'] : '';

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'NDC/ndcstatus?userid='.$userId);
    //     //curl_setopt($ch, CURLOPT_POST, 1);
    //    // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
    //     $headers = [
    //         'Content-Type: application/json'
    //     ];

    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     $server_output = curl_exec($ch) ;
    //     curl_close ($ch);
    //     $ndsResult = json_decode($server_output, true);


    //     if(isset($ndsResult['status']) && $ndsResult['status'] == 200) {
    //         $ndsStatus = $ndsResult['data'];
    //         //dd($ndsStatus);
    //         return view('nds', compact('ndsStatus'));
    //     }
    //     //dd($ndsStatus);

        
    // }

    public function ndc_status() {

        $userId = isset(Session::get('userInfo')[0]['MemberUserId']) ? Session::get('userInfo')[0]['MemberUserId'] : '';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'NDC/ndcstatus?userid='.$userId);
        //curl_setopt($ch, CURLOPT_POST, 1);
       // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $ndsResult = json_decode($server_output, true);


        if(isset($ndsResult['status']) && $ndsResult['status'] == 200) {
            $ndsStatus = $ndsResult['data'];
            dd($ndsStatus);
            array_reverse($scores->toArray());
            //dd($ndsStatus);
            return view('nds', compact('ndsStatus'));
        }
        //dd($ndsStatus);

        
    }

    public function ndc_detail($id)
    {
        return view('nds',compact('id'));
    }

    public function ndc_list() {
        $userId = isset(Session::get('userInfo')[0]['MemberUserId']) ? Session::get('userInfo')[0]['MemberUserId'] : '';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('config.apis_url_test').'NDC/ndcstatus?userid='.$userId);
        //curl_setopt($ch, CURLOPT_POST, 1);
       // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $ndcResult = json_decode($server_output, true);
        //dd($ndcResult);
        if(isset($ndcResult['status']) && $ndcResult['status'] == 200) {
            $ndsStatus = $ndcResult['data'];
            $ndc_result = [];
            if($ndcResult['status'] == 200) {
                foreach($ndcResult['data'] as $key => $notification) {
                    $ndc_result[$key+1] = $notification;
                }
                Session::put('total_ndc', $ndc_result);
            }
            return view('ndc_list', compact('ndsStatus'));
        }
        elseif(isset($ndcResult['Status']) && $ndcResult['Status'] == 400) {
            $ndsStatus = $ndcResult['data'];
            return view('ndc_list', compact('ndsStatus'));
        }
    }

    public function saveComplaint() {
        $request_params = Request::input();
        unset($request_params['_token']);
        $userData['case_username'] = $request_params['username'];
        $userData['case_email'] = $request_params['email'];
        $userData['case_phone'] = $request_params['phone'];
        $userData['case_category'] = $request_params['category'];
        $userData['case_sub_category'] = $request_params['sub_category'];
        $userData['case_comments'] = $request_params['comments'];
        $userData['case_agent'] = $request_params['username'];


        $client = new Client(['base_uri' => 'https://mapp.dhamultan.org']);

        $res = $client->request('POST','/webc/process-webcomplaint.php', ['form_params' => [
            'case_username' => $request_params['username'],
            'case_email' => $request_params['email'],
            'case_phone' => $request_params['phone'],
            'case_category' => $request_params['category'],
            'case_sub_category' => $request_params['sub_category'],
            'case_comments' => $request_params['comments'],
            'case_agent' => $request_params['username'],
        ]]);

       $status = $res->getStatusCode();
       if ($status == 200) {
            $resBodyContents = $res->getBody()->getContents();
            $ticket_no = json_decode($resBodyContents, true);
            $data['user_id'] =  isset(Session::get('userInfo')[0]['MemberUserId']) ? Session::get('userInfo')[0]['MemberUserId'] : '';
            $data['phone_number'] = $request_params['phone'];
            $data['ticket_no'] = $ticket_no;
            $data['source'] = 'web';
            $this->getComplaintHistoryModel()->insert($data);
            return redirect()->route('newComplaint')->with('success_message', 'Your complaint has been registered Successfully. Your complaint no is '.$ticket_no);
        } else {
            return redirect()->route('newComplaint')->with('error_message', 'Something went wrong. Please try again!');
        }
    }

    public function complaintStatus() {

        $user_id =  isset(Session::get('userInfo')[0]['MemberUserId']) ? Session::get('userInfo')[0]['MemberUserId'] : '';
        $complaints = $this->getComplaintHistoryModel()->getUserComplaints($user_id);

        return view('complaint_list', compact('complaints'));
    }

    public function complaint_detail($id) {

        $result = ComplaintHistory::select('phone_number','ticket_no')->where('id', $id)->get()->toArray();

        $client = new Client(['base_uri' => 'https://mapp.dhamultan.org']);

        $res = $client->request('POST','/webc/process-wcinfo.php', ['form_params' => [
            'ticketId' => $result['0']['ticket_no'],
            'phone' => $result['0']['phone_number'],
        ]]);

       $status = $res->getStatusCode();
       $resBodyContents = $res->getBody()->getContents();
       $result = json_decode($resBodyContents, true);
    
       if(isset($result['response']['result']['id']) && $result['response']['result']['id']!='')
        {
            $complaint_status = $result['response']['result'];
            return view('complaint_detail',compact('complaint_status'));
        }
        else
        {
            return redirect()->route('complaintStatus')->with('Error : You entered invalid credentials.');
        }
    }

    public function saveChallan($request) {
        $to_name = 'Finance Branch';
        $to_email = 'sohailmcs87@gmail.com';

        $request_params = $request->except('ajax_submit','_token');
       //dd($request_params);

        $validate = Validator::make($request_params, ['challan_image' => 'image|mimes:jpeg,png,jpg|max:250']);
        if ($validate->fails()) {
            return redirect()->back()->withInput($request_params)->with('error_message', $validate->errors()->first());
        }

        if($request->hasFile('challan_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('challan_image')->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('challan_image')->getClientOriginalExtension();
     
            //filename to store
            $userId = isset(Session::get('userInfo')[0]['MemberUserId']) ? Session::get('userInfo')[0]['MemberUserId'] : '';
            $username = isset(Session::get('userInfo')[0]['Name']) ? Session::get('userInfo')[0]['Name'] : '';
            $filenametostore = $filename.'.'.$extension;

            $data['user_id'] =  isset(Session::get('userInfo')[0]['MemberUserId']) ? Session::get('userInfo')[0]['MemberUserId'] : '';
            $data['image'] = $filenametostore;
            //$data['source'] = 'web';
            $data['archive'] = 0;
            
            $id = $this->getChallanImageModel()->insert($data);
            //dd($id);
            //Upload File to external server
            \Storage::disk('public')->put($filenametostore, fopen($request->file('challan_image'), 'r+'));
    
        }
        $data = array('name'=>$username, "body" => "Please Find attachment File");
        Mail::send('emails.myDemoMail', $data, function($message) use ($to_name, $to_email,$filenametostore) {
        $message->to($to_email, $to_name)
        ->subject('Challan Attachement');
        
        $message->attach(storage_path('app/public/uploads/'.$filenametostore));
        
        $message->from('noreply@dhamultan.org');
        });

         return redirect()->route('uploadChallan')->with('success_message', 'Your challan has been sent Successfully to Finance Branch.');
    }

    public function payments() {
       return view('payments');
    }

    public function payment_detail() {
        return view('payment_detail');
    }

}
