<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\AccommodationType;


class AdminAccommodationTypeRepository
{
    protected $accommodationType;


    public function __construct(){
        $this->accommodationType = new AccommodationType();
    }

    public function getAccommodationType()
    {
        return $this->accommodationType->where('flag_delete', 0)->get();
    }

    public function addAccommodationType(array $input_accommodation_type)
    {
        $this->accommodationType->create($input_accommodation_type);
    }

    public function delete($id)
    {
        $new = $this->accommodationType->where('id', $id)->first();

        $new->flag_delete = 1;
        $new->save();
    }

    public function getAccommodationTypeById($id)
    {
        return $this->accommodationType->where('id', $id)->first();
    }

    public function editAccommodationType(array $input_accommodation_type, $id)
    {
        $update = $this->accommodationType->where('id', $id)->first();

        $update->update($input_accommodation_type);
    }

}
