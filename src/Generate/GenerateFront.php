<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */
namespace Lumpineevill\Generate;

class GenerateFront extends GenerateFile
{
    /**
     * set config path
     * @var array
     */
    protected $configPath = [
        'Controller' => [
            'resource' => 'TemplateFront/Controller.php',
            'target' => 'app/Http/Controllers/',
        ],
        'Request' => [
            'resource' => 'TemplateFront/Request.php',
            'target' => 'app/Http/Requests/',
        ],
        'PostRequest' => [
            'resource' => 'TemplateFront/PostRequest.php',
            'target' => 'app/Http/Requests/',
        ],
        'AjaxRequest' => [
            'resource' => 'TemplateFront/AjaxRequest.php',
            'target' => 'app/Http/Requests/',
        ],
        'Repository' => [
            'resource' => 'TemplateFront/Repository.php',
            'target' => 'app/Repository/',
        ],
        'Interface' => [
            'resource' => 'TemplateFront/Interface.php',
            'target' => 'app/Repository/',
        ],
        'Route' => [
            'resource' => 'TemplateFront/Route.php',
            'target' => 'app/Http/Routes/Web/',
        ],
    ];

    /**
     * set need duplicate create file
     * @var array
     */
    protected $needDuplicate = [
        'Request' => 'requestType',
        'PostRequest' => 'postType',
        'AjaxRequest' => 'ajaxType',
        'Config' => 'configType',
    ];

    /**
     * set request type
     * @var array
     */
    protected $requestType = [
        'create' => true,
        'update' => true,
        'delete' => true,
        'detail' => false,
        'get' => true,
    ];

    /**
     * set request type
     * @var array
     */
    protected $ajaxType = [
        'create' => true,
        'update' => true,
        'delete' => true,
    ];

    /**
     * set post type
     * @var array
     */
    protected $postType = [
        'create' => true,
        'update' => true,
        'delete' => true,
    ];

    /**
     * [__construct description]
     * @param string $namespace [description]
     */
    public function __construct($namespace = '')
    {
        parent::__construct($namespace);
    }

    /**
     * [appendRoute description]
     * @param  [type] $path [description]
     * @return [type]       [description]
     */
    public function appendRoute()
    {
        if (file_exists(base_path('routes/web.php'))) {
            $data = "\r\n";
            $data .= "# {$this->replace} \r\n";
            $data .= "require (app_path(). '/Http/Routes/Web/{$this->replace}/{$this->replace}Route.php');";
            file_put_contents(base_path('routes/web.php'), $data . "\r\n", FILE_APPEND);
        }
        $this->writeViewBlade();
    }
    /**
     * [writeViewBlade description]
     * @return [type] [description]
     */
    public function writeViewBlade()
    {
        $dir = __DIR__ . '/TemplateFront/view/';
        foreach (scandir($dir) as $key => $value) {
            if (!in_array($value, ['..', '.'])) {
                $read = file_get_contents($dir . $value);
                $file = parent::replaceFile($read);
                $this->putFineOnNewPath($file, $value);
            }
        }
    }

    /**
     * [putFineOnNewPath description]
     * @param  [type] $path     [description]
     * @param  [type] $newFile  [description]
     * @param  [type] $filename [description]
     * @return [type]           [description]
     */
    public function putFineOnNewPath($newFile, $filename)
    {
        $path = base_path() . '/resources/views/' . $this->replace;
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $fullPath = $path . '/' . $filename;
        file_put_contents($fullPath, $newFile);
        $this->printline($filename);
    }
}
