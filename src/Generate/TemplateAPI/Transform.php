<?php
namespace App\Transformers;

use App\Models\{replace};
use League\Fractal\TransformerAbstract;

class {replace}Transformer extends TransformerAbstract
{
    public function transform({replace} $model)
    {
        $format            = [
           #field => ''
        ];

        return $format;
    }
}