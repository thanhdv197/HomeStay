<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\AdminServiceRepository;
use Carbon\Carbon;
use Hash;

class AdminServiceController extends Controller
{
    protected $adminServiceRepository;

    public function __construct(){
    	$this->adminServiceRepository = new AdminServiceRepository();
    }

    public function getList()
    {
        $service = $this->adminServiceRepository->getService();

        return view('Admin_content.service.service_type_all', compact('service'));
    }

    public function getAdd()
    {
        return view('Admin_content.service.service_type_add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
    		[
    			'name'=>'required|unique:services,service_name',
    		],[
    			'name.required'=>'Bạn chưa nhập tên loại dịch vụ',
    			'name.unique'=>'Tên dịch vụ đã tồn tại',
            ]);

        $this->adminServiceRepository->addService($request->name);

        return redirect()->route('admin-service-list')->with('thongbao', 'Thêm loại dịch vụ thành công');
    }

    public function getDelete($id)
    {
        $this->adminServiceRepository->delete($id);

        return redirect()->route('admin-service-list')->with('thongbao','Xóa thành công');
    }

    public function getEdit($id)
    {
        $service = $this->adminServiceRepository->getServiceById($id);

        return view('Admin_content.service.service_type_edit', compact('service'));
    }

    public function postEdit(Request $request)
    {
        $this->validate($request,
    		[
    			'name'=>'required|unique:services,service_name',
    		],[
    			'name.required'=>'Bạn chưa nhập tên loại dịch vụ',
    			'name.unique'=>'Tên dịch vụ đã tồn tại',
            ]);

        $this->adminServiceRepository->editService($request->name, $request->id);

        return redirect()->route('admin-service-list')->with('thongbao', 'Sửa loại dịch vụ thành công');
    }
}