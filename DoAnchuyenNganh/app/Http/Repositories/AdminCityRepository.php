<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\City;


class AdminCityRepository
{
    protected $city;


    public function __construct(){
        $this->city = new City();
    }

    public function getCity()
    {
        return $this->city->where('flag_delete', 0)->get();
    }

    public function addCity(array $input_city)
    {
        $this->city->create($input_city);
    }

    public function delete($id)
    {
        $user = $this->city->where('id', $id)->first();

        $user->flag_delete = 1;
        $user->save();
    }

    public function getCityById($id)
    {
        return $this->city->where('id', $id)->first();
    }

    public function editCity(array $input_city, $id)
    {
        $city = $this->city->where('id', $id)->first();

        $city->city_name = $input_city['city_name'];
        $city->city_img = $input_city['city_img'];

        $city->save();
    }

}
