<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\AdminRoomTypeRepository;
use Carbon\Carbon;
use Hash;

class AdminRoomTypeController extends Controller
{
    protected $adminRoomTypeRepository;

    public function __construct(){
    	$this->adminRoomTypeRepository = new AdminRoomTypeRepository();
    }

    public function getList()
    {
        $roomtype = $this->adminRoomTypeRepository->getRoomType();

        return view('Admin_content.roomtypes.all_room_type', compact('roomtype'));
    }

    public function getAdd()
    {
        return view('Admin_content.roomtypes.add_room_type');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
    		[
    			'name'=>'required|unique:room_types,room_type_name',
    			'number_adults'=>'required',
    			'number_children'=>'required',

    		],[
    			'name.required'=>'Bạn chưa nhập tên loại phòng',
    			'name.unique'=>'Loại phòng đã có trong danh sách',
    			'number_adults.required'=>'Bạn chưa nhập số người lớn quy định',
    			'number_children.required'=>'Bạn chưa nhập số trẻ em quy định',
            ]);
            
        $input_room_type = [];
        $input_room_type['room_type_name'] = $request->name;
        $input_room_type['number_adults'] = $request->number_adults;
        $input_room_type['number_children'] = $request->number_children;
        $input_room_type['flag_delete'] = 0;

        $this->adminRoomTypeRepository->addRoomType($input_room_type);

        return redirect()->route('admin-roomtype-list')->with('thongbao', 'Thêm loại phòng thành công');
    }

    public function getDelete($id)
    {
        $this->adminRoomTypeRepository->delete($id);

        return redirect()->route('admin-roomtype-list')->with('thongbao', 'Xóa loại phòng thành công');
    }

    public function getEdit($id)
    {
        $roomtype = $this->adminRoomTypeRepository->getRoomTypeById($id);

        return view('Admin_content.roomtypes.edit_room_type', compact('roomtype'));
    }

    public function postEdit(Request $request)
    {
        $this->validate($request,
    		[
    			'name'=>'required',
    			'number_adults'=>'required',
    			'number_children'=>'required',

    		],[
    			'name.required'=>'Bạn chưa nhập tên loại phòng',
    			'number_adults.required'=>'Bạn chưa nhập số người lớn quy định',
    			'number_children.required'=>'Bạn chưa nhập số trẻ em quy định',
            ]);
            
        $input_room_type = [];
        $input_room_type['room_type_name'] = $request->name;
        $input_room_type['id'] = $request->id;
        $input_room_type['number_adults'] = $request->number_adults;
        $input_room_type['number_children'] = $request->number_children;

        $this->adminRoomTypeRepository->editRoomType($input_room_type, $input_room_type['id']);

        return redirect()->route('admin-roomtype-list')->with('thongbao', 'Sửa loại phòng thành công');
    }

}