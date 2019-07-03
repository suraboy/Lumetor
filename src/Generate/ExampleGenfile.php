<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */
namespace Lumpineevill\Generate;

use Lumpineevill\Generate\GenerateFile;

class ExampleGenfile
{
    /**
     * [excute description]
     * @param  [type] $namespace [description]
     * @return [type]            [description]
     */
    public function excute($namespace)
    {
        $path = base_path();
        $genfile = new GenerateFile($namespace);
        $genfile->setPath($path);
        $genfile->excute();
        dump($genfile);
    }
}
