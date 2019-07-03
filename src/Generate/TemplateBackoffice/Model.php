<?php
namespace App\Models\{replace};

use Illuminate\Database\Eloquent\Model;
# use Illuminate\Database\Eloquent\SoftDeletes;

class {replace}Model extends Model
{
	# use SoftDeletes;

    protected $fillable = [
        'id',
        'sort',
        'status',
        'discount',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * set table name
     * @var string
     */
    protected $table = '{replace_snc}';

    /**
     * set casting value
     * @var array
     */
    protected $casts = [];

    /**
     * set append attribute
     * use get{NameColumn}Attribute function
     * @var array
     */
    protected $appends = [];

    /**
     * set datetime column
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
}
