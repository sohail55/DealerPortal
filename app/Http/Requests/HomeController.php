<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeEducationalInfo;
use App\Http\Requests\storeExperienceInfo;
use App\Http\Requests\storeCertificationInfo;
use App\Http\Requests\storePersonalInfo;
use Illuminate\Http\Request;
use PDF;

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

    public function profile() {
        try {
            return $this->getHomeService()->profile();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function education() {
        try {
            return $this->getHomeService()->education();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function skills() {
        try {
            return $this->getHomeService()->skills();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function refrence() {
        try {
            return $this->getHomeService()->refrence();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function experience() {
        try {
            return $this->getHomeService()->experience();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function certification() {
        try {
            return $this->getHomeService()->certification();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function personal() {
        try {
            return $this->getHomeService()->personal();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function contact() {
        try {
            return $this->getHomeService()->contact();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function armyForm() {
        try {
            return $this->getHomeService()->armyForm();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function preview() {
        try {
            return $this->getHomeService()->preview();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }




    public function getDegrees($id) {
        try {
            return $this->getHomeService()->getDegrees($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function getProvinces($id) {
        try {
            return $this->getHomeService()->getProvinces($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function getCities($id) {
        try {
            return $this->getHomeService()->getCities($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function getEducationById($id) {
        try {
            return $this->getHomeService()->getEducationById($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function getExprienceById($id) {
        try {
            return $this->getHomeService()->getExprienceById($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function getCertificationById($id) {
        try {
            return $this->getHomeService()->getCertificationById($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function getSkillById($id) {
        try {
            return $this->getHomeService()->getSkillById($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }


    public function getReferenceById($id) {
        try {
            return $this->getHomeService()->getReferenceById($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function getJobById($id) {
        try {
            return $this->getHomeService()->getJobById($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }


    public function applyJob() {
        try {
            return $this->getHomeService()->applyJob();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }






    public function storeEducationalInfo(storeEducationalInfo $request) {
        try {
            return $this->getHomeService()->storeEducationalInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function storePersonalInfo(storePersonalInfo $request) {
        try {
            return $this->getHomeService()->storePersonalInfo($request);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function storeContactInfo() {
        try {
            return $this->getHomeService()->storeContactInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function storeExperienceInfo(storeExperienceInfo $request) {
        try {
            return $this->getHomeService()->storeExperienceInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function storeCertificationInfo(storeCertificationInfo $request) {
        try {
            return $this->getHomeService()->storeCertificationInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function storeSkillsInfo() {
        try {
            return $this->getHomeService()->storeSkillsInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function storeReferenceInfo() {
        try {
            return $this->getHomeService()->storeReferenceInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function storeArmyPersonInfo() {
        try {
            return $this->getHomeService()->storeArmyPersonInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function saveProfileInfo() {
        try {
            return $this->getHomeService()->saveProfileInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function saveProfileExperinceInfo() {
        try {
            return $this->getHomeService()->saveProfileExperinceInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function saveProfileCertificationInfo() {
        try {
            return $this->getHomeService()->saveProfileCertificationInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function saveProfileSkillsInfo() {
        try {
            return $this->getHomeService()->saveProfileSkillsInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function saveProfileReferenceInfo() {
        try {
            return $this->getHomeService()->saveProfileReferenceInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function jobsHistory() {
        try {
            return $this->getHomeService()->jobsHistory();
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

            $customPaper = array(0,0,720,1440);
            $pdf = PDF::loadView('preview');
            return $pdf->download('preview.pdf');
        }

        return view('preview');
    }

    public function deleteSkillsInfo() {
        try {
            return $this->getHomeService()->deleteSkillsInfo();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function deleteExperienceInfo($id) {
        try {
            return $this->getHomeService()->deleteExperienceInfo($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function deleteCertificationInfo($id) {
        try {
            return $this->getHomeService()->deleteCertificationInfo($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function deleteSkillInfo($id) {
        try {
            return $this->getHomeService()->deleteSkillInfo($id);
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }





}
