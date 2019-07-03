<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */
namespace Lumpineevill\Generate;

use Exception;

class GenerateFile implements GenfileInterface
{
    /**
     * set replace string
     * @var string
     */
    protected $replace;

    /**
     * set replace small case
     * @var string
     */
    protected $replaceSmall;

    /**
     * set replace snagecase
     * @var string
     */
    protected $replaceSnake;

    /**
     * set replace url
     * @var string
     */
    protected $replaceUrl;

    /**
     * set action
     * @var string
     */
    protected $action;

    /**
     * set config
     * @var array
     */
    protected $config;

    /**
     * set file name
     * @var string
     */
    protected $filename;

    /**
     * set path
     * @var string
     */
    protected $path;

    /**
     * set style
     * @var string
     */
    protected $style;
    /**
     * set data for wirte fiel
     * @var string
     */
    protected $data;

    /**
     * set config path
     * @var array
     */
    protected $configPath = [

        'Controller' => [
            'resource' => 'TemplateBackoffice/Controller.php',
            'target' => 'app/Http/Controllers/',
        ],
        'Request' => [
            'resource' => 'TemplateBackoffice/Request.php',
            'target' => 'app/Http/Requests/',
        ],
        'Model' => [
            'resource' => 'TemplateBackoffice/Model.php',
            'target' => 'app/Models/',
        ],
        'Repository' => [
            'resource' => 'TemplateBackoffice/Repository.php',
            'target' => 'app/Repository/',
        ],
        'Interfaces' => [
            'resource' => 'TemplateBackoffice/Interface.php',
            'target' => 'app/Repository/',
        ],
        'Route' => [
            'resource' => 'TemplateBackoffice/Route.php',
            'target' => 'app/Http/Routes/Backend/',
        ],
        'Config' => [
            'resource' => 'TemplateBackoffice/Config.php',
            'target' => 'config/',
        ],
    ];

    /**
     * set need duplicate create file
     * @var array
     */
    protected $needDuplicate = [
        'Request' => 'requestType',
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
        'detail' => true,
        'getUpdate' => true,
    ];
    /**
     * set config type
     * @var array
     */
    protected $configType = [
        'create' => true,
        'detail' => true,
        'search' => true,

    ];

    /**
     * [__construct description]
     * @param string $namespace [description]
     */
    public function __construct($namespace = '')
    {
        $this->setReplaceConfig($namespace);
    }

    /**
     * [setReplaceConfig description]
     * @param [type] $replace [description]
     */
    protected function setReplaceConfig($replace)
    {
        $this->replace = ucfirst($replace);
        $this->replaceSmall = strtolower($replace);
        $this->replaceSnake = self::strCamelCase($replace);
        $this->replaceUrl = $this->urlGenerate($this->replaceSnake);
    }

    /**
     * [setConfig description]
     * @param array $config [description]
     */
    public function setConfig($config = array())
    {
        $this->config = $config;
    }

    /**
     * [setPath description]
     * @param string $path [description]
     */
    public function setPath($path = '')
    {
        $this->path = $path;
    }

    /**
     * [setFilename description]
     * @param string $filename [description]
     */
    public function setFilename($filename = '')
    {
        $this->filename = $filename;
    }

    /**
     * [getFullFileName description]
     * @return [type] [description]
     */
    public function getFullFileName()
    {
        return $this->path . '/' . $this->filename;
    }
    /**
     * [writeFile description]
     * @param  [type] $data     [description]
     * @param  string $filename [description]
     * @return [type]           [description]
     */
    public function writeFile($data)
    {
        if (!is_dir($this->path)) {
            mkdir($this->path, 0777, true);
        }
        $filename = $this->getFullFileName();
        return file_put_contents($filename, $data . "\r\n", FILE_APPEND);
    }

    /**
     * [strCamelCase description]
     * @param  string $input [description]
     * @return [type]        [description]
     */
    protected function strCamelCase($input = '')
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

    /**
     * [excute description]
     * @return [type] [description]
     */
    public function excute()
    {
        foreach ($this->configPath as $key => $list) {
            # reset action
            $this->action = '';
            if (array_key_exists($key, $this->needDuplicate)) {
                $property = $this->needDuplicate[$key];
                $this->processDuplicate($key, $property, $list);
            } else {
                $filename = $this->replace . ucfirst($key) . '.php';
                $this->processReadWriteFile($filename, $list);
            }
        }
        # append route
        $this->appendRoute();
    }

    /**
     * [processDuplicate description]
     * @param  [type] $key      [description]
     * @param  [type] $property [description]
     * @param  [type] $list     [description]
     * @return [type]           [description]
     */
    protected function processDuplicate($key, $property, $list)
    {
        foreach ($this->{$property} as $action => $need) {
            if ($need === true) {
                $this->action = ucfirst($action);
                $filename = ucfirst($action) . $this->replace . ucfirst($key) . '.php';
                $this->processReadWriteFile($filename, $list);
            }
        }
    }

    /**
     * [processReadWriteFile description]
     * @param  [type] $filename [description]
     * @param  [type] $list     [description]
     * @return [type]           [description]
     */
    protected function processReadWriteFile($filename, $list)
    {
        $newFile = $this->readAndReplaceFile($list['resource']);
        $path = $this->path . '/' . $list['target'] . '/' . $this->replace;
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $fullPath = $path . '/' . $filename;
        file_put_contents($fullPath, $newFile);
        $this->printline($filename);
    }

    /**
     * [printline description]
     * @param  string $text [description]
     * @return [type]       [description]
     */
    protected function printline($text = '')
    {
        echo "\r\n";
        echo "Write file \e[44m" . $text . " success \e[49m";
    }

    /**
     * [readAndReplaceFile description]
     * @param  [type] $config [description]
     * @return [type]         [description]
     */
    protected function readAndReplaceFile($config)
    {
        if (file_exists((__DIR__ . '/' . $config))) {
            $file = file_get_contents(__DIR__ . '/' . $config);
            return $this->replaceFile($file);
        }
        throw new \Exception("Can't read file :" . $config);

    }

    /**
     * [urlGenerate description]
     * @param  string $input [description]
     * @return [type]        [description]
     */
    protected function urlGenerate($input = '')
    {
        return str_replace("_", '-', $input);
    }

    /**
     * [replaceFile description]
     * @param  string $file [description]
     * @return [type]       [description]
     */
    protected function replaceFile($file = '')
    {
        $file = str_replace(["{replace}"], $this->replace, $file);
        $file = str_replace(["{replace_sm}"], $this->replaceSmall, $file);
        $file = str_replace(["{replace_snc}"], $this->replaceSnake, $file);
        $file = str_replace(["{replace_url}"], $this->replaceUrl, $file);
        $file = str_replace(["{action}"], $this->action, $file);
        return $file;
    }

}
