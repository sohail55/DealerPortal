<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembersSignup extends Model {


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'members_signup';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * getParentCategories method get all the categories
     * @param type $searchText
     * @return collection
     */
    public function getMemberSignup($otp) {
       return  $result =  MembersSignup::where('otp', $otp)->get()->toArray();
        //dd($result);
    }

    public function getAllMember() {
       return  $result =  MembersSignup::all()->toArray();
        //dd($result);
    }

    public function deleteMemberSignup($user_id) {
        return MembersSignup::where('user_id',$user_id)->delete();
    }

}
