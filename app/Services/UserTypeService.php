<?php

namespace App\Services;

use App\UserType;
use App\Repositories\Repository;
use App\Transformer\DataTransformer;
use App\Transformer\InPutDataTransformer;
use App\Transformer\OutPutDataTransformer;

class UserTypeService implements ServiceInterface
{
    protected $repository;
    protected $dataTransformer;
    protected $userTypeInPutDataTransformer;
    protected $userTypeOutPutDataTransformer;

    public function __construct(UserType $userType,
                                DataTransformer $dataTransformer,
                                InPutDataTransformer $userTypeInPutDataTransformer,
                                OutPutDataTransformer $userTypeOutPutDataTransformer)
    {
        $this->repository = new Repository($userType);
        $this->dataTransformer = $dataTransformer;
        $this->userTypeInPutDataTransformer = $userTypeInPutDataTransformer;
        $this->userTypeOutPutDataTransformer = $userTypeOutPutDataTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Repositories\Repository@all
     */
    public function indexService()
    {
        return $this->dataTransformer->collectionDataTransformer(
            $this->repository->all(['*']),
            $this->userTypeOutPutDataTransformer
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  array $data
     * @return \App\Repositories\Repository@create
     */
    public function storeService(array $data)
    {
        $resource = $this->dataTransformer->itemDataTransformer($data, $this->userTypeInPutDataTransformer);

        return response()->json(
            $this->dataTransformer->itemDataTransformer(
                $this->repository->create($resource),
                $this->userTypeOutPutDataTransformer),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \App\Repositories\Repository@get
     */
    public function showService($id)
    {
        return response()->json(
            $this->dataTransformer->itemDataTransformer(
                $this->repository->get($id),
                $this->userTypeOutPutDataTransformer),
            201
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @param  int $id
     * @return \App\Repositories\Repository@modify
     */
    public function updateService(array $data, $id)
    {
        $resource = $this->dataTransformer->itemDataTransformer($data, $this->userTypeInPutDataTransformer);

        return response()->json(
            $this->dataTransformer->itemDataTransformer(
                $this->repository->modify($resource, $id),
                $this->userTypeOutPutDataTransformer),
            201
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \App\Repositories\Repository@delete
     */
    public function destroyService($id)
    {
        /**
         * Check if UserType have relationthip with other model (can´t remove if exist)
         *
         */
        if ($this->repository->with('users')->find($id)->users->first()) {
            return response()->json(
                ["integrity_reference" => true]
                , 400
            );
        }

        return $this->dataTransformer->itemDataTransformer(
            $this->repository->delete($id),
            $this->userTypeOutPutDataTransformer
        );
    }
}