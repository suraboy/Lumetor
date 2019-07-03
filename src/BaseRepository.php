<?php
/**
 * @author samark chaisanagun
 * @email samarkchsngn@gmail.com
 */
namespace Lumpineevill;

use Illuminate\Support\Facades\Request;
use Lumpineevill\Contract\BaseRepositoryInterface;
use Lumpineevill\Libraries\Benchmark;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * set count result
     * @var int
     */
    protected $total = 1;

    /**
     * set model instance
     * @var object
     */
    protected $model;

    /**
     * set lang defaul
     * @var string
     */
    protected $lang;

    /**
     * set merge column
     * @var boolean
     */
    protected $mergeCheck;

    /**
     * set data to merge
     * @var array
     */
    protected $dataMerge;

    /**
     * set lang list column
     * @var array
     */
    protected $langList = ['en', 'th'];

    /**
     * set member data
     * @var mixd
     */
    protected $memberData;

    /**
     * set member id
     * @var int
     */
    protected $memberID;

    /**
     * set datetime column
     * @var array
     */
    protected static $columnDate = [
        'created_at',
        'deleted_at',
        'start_date',
        'end_date',
        'create_start_date',
        'create_end_date',
    ];

    /**
     * set skip column no need search
     * @var array
     */
    protected static $skipColumn = [
        'limit',
        'offset',
        'order_by',
        'sort_type',
    ];

    /**
     * set order by column
     * @var string
     */
    protected $orderBy = 'id';

    /**
     * set sort type
     * @var string
     */
    protected $sortType = 'asc';

    /**
     * set limited
     * @var integer
     */
    protected $limit = 30;

    /**
     * set seraching column
     * @var arary
     */
    protected $searchColumn = [];
    /**
     * set offset
     * @var integer
     */
    protected $offset = 0;

    /**
     * set fillabel for searching
     * @var object
     */
    protected $fillable;

    /**
     * set class model
     * @var string
     */
    protected $classModel;

    /**
     * set count result
     * @var integer
     */
    protected $countResult = 0;
    /**
     * search column date
     * @var array
     */
    protected $searchColumnDate = [];

    /**
     * set column search where like
     * @var array
     */
    protected $searchColumnLike = [];

    public function __construct()
    {
        $this->benchmark = new Benchmark();
        $this->benchmark->mark('start');
        $this->model = app($this->classModel);
    }

    /**
     * [getData description]
     * @return [type] [description]
     */
    public function getData()
    {
        $this->warpUp();
        return $this->response($this->model->get());
    }

    /**
     * [response description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function response($data)
    {
        if (count($data) > 0) {
            $response = $this->renderJson(200, $data);
        } else {
            $response = $this->renderJson(404);
        }
        return $response;
    }

    /**
     * [reponseModel description]
     * @return [type] [description]
     */
    public function reponseModel()
    {
        return $this->renderJson(200, $this->model);
    }

    /**
     * [renderJson description]
     * @param  integer $code [description]
     * @param  string  $data [description]
     * @return [type]        [description]
     */
    public function renderJson($code = 200, $data = '')
    {
        $data = !empty($data) && !is_array($data) ? $data->toArray() : $data;
        $response = [
            'header' => [
                'code' => $code,
                'message' => $code == 200 ? 'OK' : 'Not found',
            ],

            'data' => [
                $data,
            ],
            'meta' => [
                'total' => $this->total,
                'count_result' => $this->countResult > 0 ? $this->countResult : count($data),
                'current_date' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->benchmark->mark('end');
        $responseTime = $this->benchmark->elapsedTime('start', 'end');
        $responseReturn['process_time'] = $responseTime;
        $response['process_time'] = $responseTime;
        return $response;

    }

    /**
     * [getTotals description]
     * @return [type] [description]
     */
    public function getTotals()
    {
        $this->total = $this->model->count();
        // return $this;
    }

    /**
     * [setLimitOffset description]
     * @param integer $limit  [description]
     * @param integer $offset [description]
     */
    public function setLimitOffset($limit = 30, $offset = 0)
    {
        $this->model = $this->model->take($limit)->skip($offset);
        // return $this;
    }

    /**
     * [orderBy description]
     * @param  string $column [description]
     * @param  string $sort   [description]
     * @return [type]         [description]
     */
    public function orderBy($column = 'id', $sort = 'desc')
    {
        $this->model = $this->model->orderBy($column, $sort);
        $this->model = $this->model->orderBy('updated_at', 'desc');
    }

    /**
     * [withLang description]
     * @param  string $lang [description]
     * @return [type]       [description]
     */
    public function withLang($lang = 'all')
    {
        switch ($lang) {
            case 'all':
                $this->model = $this->model->with('langs');
                break;
            default:
                $this->model = $this->model->with(['langs' => function ($query) use ($lang) {
                    $query->where('lang', $lang);
                }]);
                break;
        }
        $this->model = $this->model->wherehas('langs', function ($query) {});
        return $this;
    }

    /**
     * [createData description]
     * @param  array  $params [description]
     * @return [type]         [description]
     */
    public function createData($params = array())
    {
        $this->total = 1;
        return $this->response($this->model->create($params));
    }

    /**
     * [updateData description]
     * @param  array  $params [description]
     * @return [type]         [description]
     */
    public function updateData($params = array())
    {
        $this->total = 1;
        $this->model->find($params['id'])->update($params);
        return $this->response($this->model->find($params['id']));
    }

    /**
     * [delete description]
     * @param  array  $params [description]
     * @return [type]         [description]
     */
    public function delete($params = array())
    {
        $this->total = 1;
        $data = $this->model->find($params['id']);
        $data->delete();
        return $this->response($data);
    }

    /**
     * [setLang description]
     * @param string $lang [description]
     */
    public function setLang($lang = 'en')
    {
        \App::setLocale($lang);
        return $this;
    }

    /**
     * [setDataMerge description]
     * @param [type] $data [description]
     */
    public function setDataMerge($data)
    {
        $this->dataMerge[$data['key']] = $data['data'];
    }

    /**
     * [setDataMergestatus description]
     * @param [type] $status [description]
     */
    public function setDataMergestatus($status)
    {
        $this->mergeCheck = $status;
    }

    /**
     * [warpUp description]
     * @return [type] [description]
     */
    private function warpUp()
    {
        $this->getTotals();

        $this->limit = Request::has('limit') ?
        Request::get('limit') : $this->limit;

        $this->offset = Request::has('offset') ?
        Request::get('offset') : $this->offset;

        $this->orderBy = Request::has('order_by') ?
        Request::get('order_by') : $this->orderBy;

        $this->sortType = Request::has('sort_type') ?
        Request::get('sort_type') : $this->sortType;

        if (!Request::has('see_all')) {
            $this->setLimitOffset($this->limit, $this->offset);
        }
        $this->orderBy($this->orderBy, $this->sortType);

    }

    /**
     * [setMemberData description]
     */
    public function setMemberData()
    {
        $this->memberData = getMember();
    }

    /**
     * [setMemberId description]
     */
    public function setMemberId()
    {
        $this->memberID = getMemberID();
    }

    /**
     * [getMemberData description]
     * @return [type] [description]
     */
    public function getMemberData()
    {
        return $this->memberData;
    }

    /**
     * [getMemberID description]
     * @return [type] [description]
     */
    public function getMemberID()
    {
        return $this->memberID;
    }

    /**
     * work allowed
     */
    protected function setFillable()
    {
        $this->fillable = $this->model->getFillable();
        return $this->fillable;
    }

    /**
     * [search description]
     * @param  array  $filter [description]
     * @return [type]         [description]
     */
    public function search($filter = array())
    {
        if (isset($filter['debug'])) {
            // dump($filter);
        }

        $fillable = !empty($this->fillable) ? $this->fillable : $this->setFillable();
        $filter = array_filter($filter);

        $params = array();

        foreach ($filter as $key => $value) {

            if (in_array($key, $fillable) || in_array($key, self::$columnDate)) {
                $params[$key] = $value;
            }if (preg_match('/(_like)/', $key, $matches, PREG_OFFSET_CAPTURE)) {
                $params[$key] = $value;
            }
        }

        $this->searchColumnDates($params);
        $this->searchColumnLikes($params);

        $this->model = $this->model->where(function ($query) use ($params) {
            foreach ($params as $key => $item) {
                if (!in_array($key, self::$skipColumn)) {
                    if (in_array($key, self::$columnDate)) {
                        if ($key == 'create_start_date') {
                            $query->where('created_at', '>=', $item);
                        }if ($key == 'create_end_date') {
                            $query->where('created_at', '<=', $item);
                        }
                    } else {
                        if (preg_match('/(_like)/', $key, $matches, PREG_OFFSET_CAPTURE)) {
                            $key = str_replace('_like', '', $key);
                            $query->where("{$key}", 'like', '%' . $item . '%');
                        } else {
                            $query->where("{$key}", $item);
                        }
                    }
                }

            }

        });
        // dd($this->model->toSql());
        return $this;
    }

    /**
     * [searchColumnDates description]
     * @param  [type] $params [description]
     * @return [type]         [description]
     */
    protected function searchColumnDates(&$params)
    {
        foreach ($params as $key => $value) {
            if (array_key_exists($key, $this->searchColumnDate)) {
                $this->model = $this->model->where(function ($query) use ($key, $value) {
                    $query->where($key, $this->searchColumnDate[$key], $value);
                });
                unset($params[$key]);
            }
        }
    }

    /**
     * [searchColumnDates description]
     * @param  [type] $params [description]
     * @return [type]         [description]
     */
    protected function searchColumnLikes(&$params)
    {
        foreach ($params as $key => $value) {
            if (array_key_exists($key, $this->searchColumnLike)) {
                $this->model = $this->model->where(function ($query) use ($key, $value) {
                    $query->where($key, $this->searchColumnLike[$key], '%' . $value . '%');
                });
                unset($params[$key]);
            }
        }
    }

    /**
     * [mappingSerach like serach]
     * @param  [type] $params [description]
     * @return object model
     */
    protected function mappingSerach($params)
    {
        foreach ($params as $column => $value) {
            if (array_key_exists($column, $this->searchColumn)) {
                if ($this->searchColumn[$column] == 'like%') {
                    $this->model = $this->model
                        ->where($column, 'like', '%' . $value . '%');
                } else {
                    $this->model = $this->model
                        ->where($column, $this->searchColumn[$column], $value);
                }

            } else {
                if (!in_array($column, self::$skipColumn)) {
                    $this->model = $this->model->where($column, $value);
                }
            }
        }

    }

}
