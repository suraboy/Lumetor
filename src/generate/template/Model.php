<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\HasTranslations;

class {replace} extends Model
{

    use HasTranslations;

    protected $table = '{replace_sm}s';

    public $translatable = array('name');



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
        'name'
    );

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array();

}
