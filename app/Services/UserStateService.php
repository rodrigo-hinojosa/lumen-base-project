<?php

namespace App\Services;

use App\UserState;
use App\Repositories\Repository;
use App\Transformer\DataTransformer;
use App\Transformer\InPutDataTransformer;
use App\Transformer\OutPutDataTransformer;

class UserStateService implements ServiceInterface
{
    protected $repository;
    protected $dataTransformer;
    protected $userStateOutPutDataTransformer;
    protected $userStateInPutDataTransformer;

    public function __construct(UserState $userState,
                                DataTransformer $dataTransformer,
                                InPutDataTransformer $userStateInPutDataTransformer,
                                OutPutDataTransformer $userStateOutPutDataTransformer)
    {
        $this->repository = new Repository($userState);
        $this->dataTransformer = $dataTransformer;
        $this->userStateInPutDataTransformer = $userStateInPutDataTransformer;
        $this->userStateOutPutDataTransformer = $userStateOutPutDataTransformer;
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
            $this->userStateOutPutDataTransformer
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
        $resource = $this->dataTransformer->itemDataTransformer($data, $this->userStateInPutDataTransformer);

        return response()->json(
            $this->dataTransformer->itemDataTransformer(
                $this->repository->create($resource),
                $this->userStateOutPutDataTransformer),
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
                $this->userStateOutPutDataTransformer),
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
        $resource = $this->dataTransformer->itemDataTransformer($data, $this->userStateInPutDataTransformer);

        return response()->json(
            $this->dataTransformer->itemDataTransformer(
                $this->repository->modify($resource, $id),
                $this->userStateOutPutDataTransformer),
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
         * Check if UserState have relationthip with other model (can´t remove if exist)
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
            $this->userStateOutPutDataTransformer
        );
    }
}