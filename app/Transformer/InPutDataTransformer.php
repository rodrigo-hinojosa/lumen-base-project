<?php

namespace App\Transformer;

use League\Fractal\TransformerAbstract;

class InPutDataTransformer extends TransformerAbstract
{
    public function transform(array $data, $separator = '_$0')
    {
        foreach ($data as $property => $value) {

            $snake_case = strtolower(preg_replace('/(?<!^)[A-Z]/', $separator, $property));

            $inPutData[$snake_case] = $value;
        }

        return $inPutData;
    }
}
