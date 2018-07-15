<?php

namespace App\Http\Controllers;

use App\Services\UserStateService;
use App\Http\Requests\UserTypeRequestStore;
use App\Http\Requests\UserTypeRequestUpdate;

class UserTypeController extends Controller
{
    protected $userTypeService;

    public function __construct(UserStateService $userTypeService)
    {
        $this->userTypeService = $userTypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Services\UserStateService@indexService
     */
    public function index()
    {
        return $this->userTypeService->indexService();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserTypeRequestStore $request
     * @return \App\Services\UserStateService@storeService
     */
    public function store(UserTypeRequestStore $request)
    {
        return $this->userTypeService->storeService($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \App\Services\UserStateService@showService
     */
    public function show($id)
    {
        return $this->userTypeService->showService($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserTypeRequestUpdate $request
     * @param  int $id
     * @return \App\Services\UserStateService@updateService
     */
    public function update(UserTypeRequestUpdate $request, $id)
    {
        return $this->userTypeService->updateService($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \App\Services\UserStateService@destroyService
     */
    public function destroy($id)
    {
        return $this->userTypeService->destroyService($id);
    }
}
