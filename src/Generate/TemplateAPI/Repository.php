<?php 
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */
namespace App\Repository\{replace};

use App\Models\{replace}\{replace};
use Lumpineevill\BaseRepository;
use App\Models\{replace}\{replace}Model;

class {replace}Repository extends BaseRepository implements {replace}Interface
{
    /**
     * set limit
     * @var integer
     */
    protected $limit = 30;

    /**
     * set order by column
     * @var string
     */
    protected $orderBy = 'id';

    /**
     * set sort type
     * @var string
     */
    protected $sortType = 'desc';    

    /**
     * set model 
     * @var class
     */
    protected $classModel = {replace}Model::class;

    /**
     * set search column like
     * @var array
     */
    protected $searchColumnLike = [];

    /**
     * set serach column date
     * @var array
     */
    protected $searchColumnDate = [];

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Get{replace}ByID 
     * @param $id integer
     * @return mixed
     */
    public function get{replace}ByID($id)
    {
        return $this->model->find($id);
    }




}
