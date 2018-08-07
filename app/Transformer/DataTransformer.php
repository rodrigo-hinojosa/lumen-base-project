<?php

namespace App\Transformer;

use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;

class DataTransformer
{
    /**
     * Serialize Data
     *
     * @return \League\Fractal\Manager
     */
    public function dataSerializer($data)
    {
        $fractal = new Manager();

        $fractal->setSerializer(new DataSerializer());

        return $fractal->createData($data)->toArray();
    }

    /**
     * Tranform Data to be consumed by API
     *
     * @return \League\Fractal\Manager
     */
    public function collectionDataTransformer($data, $transformType, $resourceKey = false)
    {
        $resource = new Collection($data, $transformType, $resourceKey);

        return $this->dataSerializer($resource);
    }

    /**
     * Tranform Data to be consumed by own MODEL
     *
     * @return \League\Fractal\Manager
     */
    public function itemDataTransformer($data, $transformType, $resourceKey = false)
    {
        $resource = new Item($data, $transformType, $resourceKey);

        return $this->dataSerializer($resource);
    }

}