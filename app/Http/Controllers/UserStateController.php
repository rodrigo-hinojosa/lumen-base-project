<?php

namespace App\Http\Controllers;

use App\Services\UserStateService;
use App\Http\Requests\UserStateRequestStore;
use App\Http\Requests\UserStateRequestUpdate;

class UserStateController extends Controller
{
    protected $userStateService;

    public function __construct(UserStateService $userStateService)
    {
        $this->userStateService = $userStateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Services\UserStateService@indexService
     */
    public function index()
    {
        return $this->userStateService->indexService();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserStateRequestStore $request
     * @return \App\Services\UserStateService@storeService
     */
    public function store(UserStateRequestStore $request)
    {
        return $this->userStateService->storeService($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \App\Services\UserStateService@showService
     */
    public function show($id)
    {
        return $this->userStateService->showService($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserStateRequestUpdate $request
     * @param  int $id
     * @return \App\Services\UserStateService@updateService
     */
    public function update(UserStateRequestUpdate $request, $id)
    {
        return $this->userStateService->updateService($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \App\Services\UserStateService@destroyService
     */
    public function destroy($id)
    {
        return $this->userStateService->destroyService($id);
    }
}
