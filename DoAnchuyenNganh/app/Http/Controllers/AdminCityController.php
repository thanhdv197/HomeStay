<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\AdminCityRepository;
use Carbon\Carbon;
use Hash;

class AdminCityController extends Controller
{
    protected $adminCityRepository;

    public function __construct(){
    	$this->adminCityRepository = new AdminCityRepository();
    }

    public function getList()
    {
        $cities = $this->adminCityRepository->getCity();

        return view('Admin_content.cities.all_city', compact('cities'));
    }

    public function getAdd()
    {
        return view('Admin_content.cities.add_city');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
    		[
    			'name'=>'required|unique:cities,city_name',
    			'img'=>'required',

    		],[
    			'name.required'=>'Bạn chưa nhập tên thành phố',
    			'name.unique'=>'Thành phố đã có trong danh sách',
    			'img.required'=>'Bạn chưa chọn ảnh thành phố',
            ]);
        
        if($request->hasFile('img'))
        {
            $avatar = $request->file('img');

			// Format file name
			$day_upload = Carbon::now()->format('dmYHis');
			$type_file = $avatar->getClientOriginalExtension();
            $file_name = "imgs/cities/"."city".$day_upload.".".$type_file;
            
            // Upload file
            $avatar->move('imgs/cities', $file_name);
            
            $input_city = [];
            $input_city['city_name'] = $request->name;
            $input_city['city_img'] = $file_name;
            $input_city['flag_delete'] = 0;

            $this->adminCityRepository->addCity($input_city);

            return redirect()->route('admin-city-list')->with('thongbao', 'Thêm thành phố thành công');

        }
    }

    public function getDelete($id)
    {
        $this->adminCityRepository->delete($id);

        return redirect()->route('admin-city-list')->with('thongbao','Xóa thành công');
    }

    public function getEdit($id)
    {
        $city = $this->adminCityRepository->getCityById($id);

        return view('Admin_content.cities.edit_city', compact('city'));
    }

    public function postEdit(Request $request)
    {
        $this->validate($request,
    		[
    			'name'=>'required|unique:cities,city_name',
    			'img'=>'required',

    		],[
    			'name.required'=>'Bạn chưa nhập tên thành phố',
    			'name.unique'=>'Thành phố đã có trong danh sách',
    			'img.required'=>'Bạn chưa chọn ảnh thành phố',
            ]);
        
        if($request->hasFile('img'))
        {
            $avatar = $request->file('img');

			// Format file name
			$day_upload = Carbon::now()->format('dmYHis');
			$type_file = $avatar->getClientOriginalExtension();
            $file_name = "imgs/cities/"."city".$day_upload.".".$type_file;
            
            // Upload file
            $avatar->move('imgs/cities', $file_name);
            
            $input_city = [];
            $input_city['city_name'] = $request->name;
            $input_city['id'] = $request->id;
            $input_city['city_img'] = $file_name;
            $input_city['flag_delete'] = 0;

            $this->adminCityRepository->editCity($input_city, $input_city['id']);

            return redirect()->route('admin-city-list')->with('thongbao', 'Sửa thông tin thành phố thành công');

        }
    }
}