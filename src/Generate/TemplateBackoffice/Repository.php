<?php
namespace App\Repositories\{replace};

use App\Repositories\BaseRepositoryWrap;

class {replace}Repository extends BaseRepositoryWrap
{
    /**
     * set all of endpoint api
     * @var array
     */
    protected $configEndpoint = [
        'list' => '/api/v1/{replace_sm}/list',
        'create' => '/api/v1/{replace_sm}/create',
        'update' => '/api/v1/{replace_sm}/update',
        'delete' => '/api/v1/{replace_sm}/delete',
    ];

    /**
     * set route alias name
     * @var array
     */
    protected $routeAliasName = [
        'create' => '{replace_sm}.create',
        'update' => '{replace_sm}.update',
        'delete' => '{replace_sm}.delete',
    ];

    /**
     * set config header of table show in list view
     * @var array
     */
    protected $configFormColumn = [
        "cate_id",
        "parent_cate_id",
        "level",
        "icon_img",
        "cate_img_th",
        "cate_img_en",
        "sort",
        "cate_name_th",
        "cate_name_en",
    ];

    /**
     * set showing action menu and route
     * setting true open false close menu
     * @var array
     */
    protected $action = [
        'view' => true,
        'edit' => true,
        'dele' => true,
        'route_list' => '{replace_sm}.view',
        'route_detail' => '{replace_sm}.detail',
        'route_edit' => '{replace_sm}.submit.update',
        'route_dele' => '{replace_sm}.submit.delete',
    ];

    /**
     * set config form search attribute
     * @var string
     */
    protected $configListSearch = '{replace_sm}.list';

    /**
     * set config create attribute
     * @var string
     */

    protected $configCreate = '{replace_sm}.create';

    /**
     * set config update attribute
     * @var string
     */
    protected $configUpdate = '{replace_sm}.update';
    /**
     * set route search action
     * @get form alias naming router.
     * @var string
     */
    protected $routeAction = '{replace_sm}.view';

     /**
     * set iamge list
     * @var array
     */
    protected $imageList = [
        'image_th',
        'image_en',
    ];

    /**
     * set custome link
     * @var array
     */
    protected $customLink = [
        # set key = column
        # set value = route alias name
        'id_user' => 'members.detail',
        'cate_id' => 'category.detail',
    ];
    
    /**
     * set title name of page
     * @var string
     */
    protected $title = '{replace}';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * get show list view wrap with data.
     * @return view object
     */
    public function getList()
    {
        return parent::getListData();
    }

    /**
     * get create form with config data.
     * @return [type] [description]
     */
    public function getCreateForm()
    {
        return parent::getCreateForm();
    }

}

