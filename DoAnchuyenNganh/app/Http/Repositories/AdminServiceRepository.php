<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\Service;


class AdminServiceRepository
{
    protected $service;


    public function __construct(){
        $this->service = new Service();
    }

    public function getService()
    {
        return $this->service->where('flag_delete', 0)->get();
    }

    public function addService($name)
    {
        $this->service->service_name = $name;
        $this->service->flag_delete = 0;

        $this->service->save();
    }

    public function delete($id)
    {
        $new = $this->service->where('id', $id)->first();

        $new->flag_delete = 1;
        $new->save();
    }

    public function getServiceById($id)
    {
        return $this->service->where('id', $id)->first();
    }

    public function editService($name, $id)
    {
        $update = $this->service->where('id', $id)->first();

        $update->update([
            'service_name'=>$name
        ]);
    }

}
