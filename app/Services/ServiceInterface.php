<?php

namespace App\Services;

interface ServiceInterface
{
    public function indexService();

    public function destroyService($id);

    public function showService($id);

    public function storeService(array $data);

    public function updateService(array $data, $id);
}