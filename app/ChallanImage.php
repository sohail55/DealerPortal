<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallanImage extends Model {


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'challan_images';

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
    public function getUserChallanImages($user_id) {
        
       return  $result =  ChallanImage::where('user_id', $user_id)->get()->toArray();
        //dd($result);
    }

}
