<?php

namespace App\Services;

use App\User;
use App\Repositories\Repository;
use App\Transformer\DataTransformer;
use App\Transformer\InPutDataTransformer;
use App\Transformer\OutPutDataTransformer;

class UserService implements ServiceInterface
{
    protected $repository;
    protected $dataTransformer;
    protected $userInPutDataTransformer;
    protected $userOutPutDataTransformer;

    public function __construct(User $user,
                                DataTransformer $dataTransformer,
                                InPutDataTransformer $userInPutDataTransformer,
                                OutPutDataTransformer $userOutPutDataTransformer)
    {
        $this->repository = new Repository($user);
        $this->dataTransformer = $dataTransformer;
        $this->userInPutDataTransformer = $userInPutDataTransformer;
        $this->userOutPutDataTransformer = $userOutPutDataTransformer;
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
            $this->userOutPutDataTransformer
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
        $resource = $this->dataTransformer->itemDataTransformer($data, $this->userInPutDataTransformer);

        return response()->json(
            $this->dataTransformer->itemDataTransformer(
                $this->repository->create($resource),
                $this->userOutPutDataTransformer),
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
                $this->userOutPutDataTransformer),
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
        $resource = $this->dataTransformer->itemDataTransformer($data, $this->userInPutDataTransformer);

        return response()->json(
            $this->dataTransformer->itemDataTransformer(
                $this->repository->modify($resource, $id),
                $this->userOutPutDataTransformer),
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
         * Check if User have relationthip with other model (can´t remove if exist)
         *
         */
        if ($this->repository->with('distributions')->find($id)->distributions->first()) {
            return response()->json(
                ["integrity_reference" => true]
                , 400
            );
        }

        return $this->dataTransformer->itemDataTransformer(
            $this->repository->delete($id),
            $this->userOutPutDataTransformer
        );
    }

    /**
     * Return user asociated to token
     *
     * @return app('auth')->guard()->user()
     */
    public function getUserByAccessTokenService()
    {
        return response()->json(app('auth')->guard()->user());
    }
}