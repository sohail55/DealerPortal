<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author sohail
 */

namespace App\Http\Services;

use App\User;
use App\ComplaintHistory;
use App\ChallanImage;
use App\MembersTransaction;
use App\MembersSignup;


class Config
{
    use \App\Http\Traits\CommonService;
    protected function getUserById($id)
    {
        $user = User::where('id', $id)->whereNotIn("status", ["D"])->first();
        return !empty($user) ? $user : [];
    }

    public function getComplaintHistoryModel()
    {
        return new ComplaintHistory();
    }

    public function getChallanImageModel()
    {
        return new ChallanImage();
    }

    public function getMembersTransactionModel()
    {
        return new MembersTransaction();
    }

    public function getMembersSignupModel()
    {
        return new MembersSignup();
    }
    
    
}
