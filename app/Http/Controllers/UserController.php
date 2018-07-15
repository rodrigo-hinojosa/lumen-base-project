<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\UserRequestStore;
use App\Http\Requests\UserRequestUpdate;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Services\UserService@indexService
     */
    public function index()
    {
        return $this->userService->indexService();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequestStore $request
     * @return \App\Services\UserService@storeService
     */
    public function store(UserRequestStore $request)
    {
        return $this->userService->storeService($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \App\Services\UserService@showService
     */
    public function show($id)
    {
        return $this->userService->showService($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequestUpdate $request
     * @param  int $id
     * @return \App\Services\UserService@updateService
     */
    public function update(UserRequestUpdate $request, $id)
    {
        return $this->userService->updateService($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \App\Services\UserService@destroyService
     */
    public function destroy($id)
    {
        return $this->userService->destroyService($id);
    }

    /**
     * Return user asociated to token
     *
     * @return \App\Services\UserService@getUserByAccessTokenService
     */
    public function getUserByAccessToken()
    {
        return $this->userService->getUserByAccessTokenService();
    }
}
