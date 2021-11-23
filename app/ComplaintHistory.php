<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintHistory extends Model {


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'complaint_history';

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
    public function getUserComplaints($user_id) {
        
       return  $result =  ComplaintHistory::where('user_id', $user_id)->orderBy("id", "desc")->get()->toArray();
        //dd($result);
    }

}
