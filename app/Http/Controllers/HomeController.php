<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\storePersonalInfo;
use App\Http\Requests\storeComplaintInfo;
use PDF;
use Mail;
use App\Mail\MyDemoMail;
use Validator;
use Session;

class HomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try {
            return $this->getHomeService()->index();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function profile($id = null) {
        try {
            return $this->getHomeService()->profile($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function editProfile($id = null) {
        try {
            return $this->getHomeService()->editProfile($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function updateProfile(storePersonalInfo $request) {
        try {
            return $this->getHomeService()->updateProfile();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function plotsList() {
        try {
            return $this->getHomeService()->plotsList();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function viewLedger($app_id= null) {
        try {
            return $this->getHomeService()->viewLedger($app_id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }  

    public function getChallanFields($app_id= null) {
        try {
            return $this->getHomeService()->getChallanFields($app_id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function challanGeneration() {
        try {
            return $this->getHomeService()->challanGeneration();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function paymentConfirmation() {
        try {
            return $this->getHomeService()->paymentConfirmation();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function paymentConfirmationMobile() {
        try {
            return $this->getHomeService()->paymentConfirmationMobile();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }


    public function challancc() {
        try {
            return $this->getHomeService()->challancc();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function notifications() {
        try {
            return $this->getHomeService()->notifications();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function notification_detail($notification_id = null) {
        try {
            return $this->getHomeService()->notification_detail($notification_id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function ndc_detail($id = null) {
        try {
            return $this->getHomeService()->ndc_detail($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }


    
    public function ndc_status() {
        try {
            return $this->getHomeService()->ndc_status();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function ndc_list() {
        try {
            return $this->getHomeService()->ndc_list();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function newComplaint() {
        try {
            return $this->getHomeService()->newComplaint();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function saveComplaint(storeComplaintInfo $request) {
        try {
            return $this->getHomeService()->saveComplaint();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function uploadChallan() {
        try {
            return $this->getHomeService()->uploadChallan();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function complaintStatus() {
        try {
            return $this->getHomeService()->complaintStatus();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function complaint_detail($id = null) {
        try {
            return $this->getHomeService()->complaint_detail($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function saveChallan(Request  $request) {
        try {
            return $this->getHomeService()->saveChallan($request);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function payments(Request  $request) {
        try {
            return $this->getHomeService()->payments();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function payment_detail(Request  $request) {
        try {
            return $this->getHomeService()->payment_detail();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }
    
    

    
    public function pdfview(Request $request)
    {
        // $items = DB::table("items")->get();
        // view()->share('items',$items);
        // $filename = 'preview';
        // $path = storage_path($filename);

        // return \Response::make(file_get_contents($path), 200, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="'.$filename.'"'
        // ]);

        if($request->has('download')){
            //dd('I am here again');

            $customPaper = array(0,0,620,1440);
            $pdf = PDF::loadView('acknowledge_letter')->setPaper($customPaper);
            return $pdf->download('ackg_letter.pdf');
        }

        return view('preview');
    }
      
}
