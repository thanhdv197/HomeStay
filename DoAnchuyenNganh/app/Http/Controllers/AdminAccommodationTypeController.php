<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\AdminAccommodationTypeRepository;
use Carbon\Carbon;
use Hash;

class AdminAccommodationTypeController extends Controller
{
    protected $adminAccommodationTypeRepository;

    public function __construct(){
    	$this->adminAccommodationTypeRepository = new AdminAccommodationTypeRepository();
    }

    public function getList()
    {
        $accommodation_type = $this->adminAccommodationTypeRepository->getAccommodationType();

        return view('Admin_content.accommodation_type.accomm_all', compact('accommodation_type'));
    }

    public function getAdd()
    {
        return view('Admin_content.accommodation_type.accomm_add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
    		[
    			'name'=>'required|unique:accommodation_types,accommodation_type_name',
    			'image'=>'required',

    		],[
    			'name.required'=>'Bạn chưa nhập tên loại chỗ nghỉ',
    			'name.unique'=>'Tên loại chỗ nghỉ đã có trong danh sách',
    			'image.required'=>'Bạn chưa chọn ảnh thành phố',
            ]);
        
        if($request->hasFile('image'))
        {
            $avatar = $request->file('image');

			// Format file name
			$day_upload = Carbon::now()->format('dmYHis');
			$type_file = $avatar->getClientOriginalExtension();
            $file_name = "imgs/accommodation_type/"."accommodationtype".$day_upload.".".$type_file;
            
            // Upload file
            $avatar->move('imgs/accommodation_type', $file_name);
            
            $input_accommodation_type = [];
            $input_accommodation_type['accommodation_type_name'] = $request->name;
            $input_accommodation_type['accommodation_type_img'] = $file_name;
            $input_accommodation_type['flag_delete'] = 0;

            $this->adminAccommodationTypeRepository->addAccommodationType($input_accommodation_type);

            return redirect()->route('admin-accommodationtype-list')->with('thongbao', 'Thêm loại chổ nghỉ thành công');

        }
    }

    public function getDelete($id)
    {
        $this->adminAccommodationTypeRepository->delete($id);

        return redirect()->route('admin-accommodationtype-list')->with('thongbao','Xóa thành công');
    }

    public function getEdit($id)
    {
        $accommodation_type = $this->adminAccommodationTypeRepository->getAccommodationTypeById($id);

        return view('Admin_content.accommodation_type.accomm_edit', compact('accommodation_type'));
    }

    public function postEdit(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required|unique:accommodation_types,accommodation_type_name',
            'image'=>'required',

        ],[
            'name.required'=>'Bạn chưa nhập tên loại chỗ nghỉ',
            'name.unique'=>'Tên loại chỗ nghỉ đã có trong danh sách',
            'image.required'=>'Bạn chưa chọn ảnh thành phố',
        ]);
        
        if($request->hasFile('image'))
        {
            $avatar = $request->file('image');

            // Format file name
            $day_upload = Carbon::now()->format('dmYHis');
            $type_file = $avatar->getClientOriginalExtension();
            $file_name = "imgs/accommodation_type/"."accommodationtype".$day_upload.".".$type_file;
            
            // Upload file
            $avatar->move('imgs/accommodation_type', $file_name);
            
            $input_accommodation_type = [];
            $input_accommodation_type['accommodation_type_name'] = $request->name;
            $input_accommodation_type['accommodation_type_img'] = $file_name;
            $input_accommodation_type['id'] = $request->id;

            $this->adminAccommodationTypeRepository->editAccommodationType($input_accommodation_type, $input_accommodation_type['id']);

            return redirect()->route('admin-accommodationtype-list')->with('thongbao', 'Sửa loại chổ nghỉ thành công');

        }
    }
}