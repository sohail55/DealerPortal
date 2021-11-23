<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembersTransaction extends Model {


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'members_transaction';

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

}
