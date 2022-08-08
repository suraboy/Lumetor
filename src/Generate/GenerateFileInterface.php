<?php

namespace Lumetor\Generate;

interface GenerateFileInterface
{
    /**
     * set config
     * @param array $config [description]
     */
    public function setConfig($config = array());

    /**
     * set path of generate file
     * @param string $path [description]
     */
    public function setPath($path = '');

    /**
     * [setFilname description]
     * @param string $filename [description]
     */

    public function setFilename($filename = '');

    /**
     * get full filename.
     * @return [type] [description]
     */
    public function getFullFileName();

    /**
     * write file to path of config.
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function writeFile($data);

    /**
     * excute processing generating file.
     * @return [type] [description]
     */
    public function execute();
}
