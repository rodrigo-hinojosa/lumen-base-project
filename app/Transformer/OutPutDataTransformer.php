<?php

namespace App\Transformer;

use League\Fractal\TransformerAbstract;

class OutPutDataTransformer extends TransformerAbstract
{
    public function transform($data, $separator = '_')
    {
        foreach ($data->toArray() as $property => $value) {

            $camelCase = str_replace($separator, '', lcfirst(ucwords($property, $separator)));

            $outPutData[$camelCase] = $value;
        }

        return $outPutData;
    }
}
