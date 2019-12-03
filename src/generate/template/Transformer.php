<?php
namespace App\Transformers;

use App\Models\{replace};
use League\Fractal\TransformerAbstract;

class {replace}Transformer extends TransformerAbstract
{
    public function transform({replace} ${replace_sm})
    {
        $format = [
            'id' => ${replace_sm}->id,
            'name' => ${replace_sm}->name,
        ];
        return $format;
    }
}
