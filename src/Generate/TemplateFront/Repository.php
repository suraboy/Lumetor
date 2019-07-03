<?php
/**
 * @author samrark@chisanguan
 * @email samarkchsngn@gmail.com
 */

namespace App\Repository\{replace};

use Samark\Front\Repository\BaseRepositoryWrap;

class {replace}Repository extends BaseRepositoryWrap
{
    /**
     * set title name default
     * @var string
     */
    protected $name = '{replace_url}';

    /**
     * overriding limit.
     * @var integer
     */
    protected $limit = 30;

    /**
     * overriding orderBy column
     * @var string
     */
    protected $orderBy = 'id';

    /**
     * overriding sortType
     * @var string
     */
    protected $sortType = 'desc';

    /**
     * setting config endpoint api
     * @var array
     */
    protected $configEndpoint = [
        'list' => '/{replace_url}/list',
        'create' => '/{replace_url}/create',
        'update' => '/{replace_url}/update',
        'delete' => '/{replace_url}/delete',
    ];

    /**
     * set config blade view file
     * @var array
     */
    protected $configView = [
        'list' => '{replace_sm}.list',
        'edit' => '{replace_sm}.edit',
        'create' => '{replace_sm}.create',
        'detail' => '{replace_sm}.detail',
    ];

    /**
     * set attribute of image
     * @var array
     */
    protected $imageList = [
        'images' => '',
    ];

    /**
     * set accept application json api
     * @var boolean
     */
    protected $isJson = true;

    /**
     * set params request.
     * @var array
     */
    protected $params;

    /**
     * set need cache redis
     * @var boolean
     */
    protected $needCache;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * [getViewDetail description]
     * @param  integer $id [description]
     * @return mixed
     */
    public function getViewDetail($id = 0)
    {
        $data = parent::getDataByID($id);
        return parent::getViewDetail($data);
    }

    /**
     * [getViewEdit description]
     * @param  integer $id [description]
     * @return [type]      [description]
     */
    public function getViewEdit($id = 0)
    {
        $data = parent::getDataByID($id);
        return parent::getViewEdit($data);
    }

    /**
     * [getViewList description]
     * @param  array  $params [description]
     * @return [type]         [description]
     */
    public function getViewList($params = array())
    {
        $data = parent::getDataList($params);
        return parent::getViewList($data);
    }

    /**
     * wrapper param on this function
     * @param  $params array
     * @return $params array
     */
    public function intialParam($params)
    {
        # do warpper here
        $this->params = $params;
        return $this;
    }

    /**
     * overriding shared variable for view.
     * @return mixed.
     */
    public function getShareViewData()
    {
        parent::getShareViewData();
        # custom shared global variable
        $this->sharedView['package'] = ['data' => 'simple'];
        $this->sharedView['title'] = $this->name;
    }

}
