<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\AdminUserRepository;
use Carbon\Carbon;
use Hash;

class AdminUserController extends Controller
{
    protected $adminUserRepository;

    public function __construct(){
    	$this->adminUserRepository = new AdminUserRepository();
    }

    public function getList()
    {
        $users = $this->adminUserRepository->getUser();

        return view('Admin_content.users.all_user', compact('users'));
    }

    public function getAdd()
    {
        return view('Admin_content.users.add_user');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
    		[
    			'name'=>'required',
    			'address'=>'required',
    			'birthday'=>'required',
    			'avatar'=>'required',
    			'username'=>'required|unique:users,username',
    			'phone'=>'required',
    			'level'=>'required',
    			'password'=>'required',
    			'password1'=>'required|same:password',
    			'email'=>'required|email|unique:users,email',
    		],[
    			'name.required'=>'Bạn chưa nhập tên',
    			'address.required'=>'Bạn chưa nhập địa chỉ',
    			'birthday.required'=>'Bạn chưa nhập ngày sinh',
    			'avatar.required'=>'Bạn chưa chọn ảnh đại diện',
    			'username.required'=>'Bạn chưa nhập tên đăng nhập',
    			'username.unique'=>'Tên đăng nhập đã tồn tại',
    			'phone.required'=>'Bạn chưa nhập số điện thoại',
    			'level.required'=>'Bạn chưa nhập quyền tài khoản',
    			'password.required'=>'Bạn chưa nhập mật khẩu',
    			'password1.required'=>'Bạn chưa nhập mật khẩu xác nhận',
    			'password1.same'=>'Mật khẩu xác nhận không đúng',
    			'email.required'=>'Bạn chưa nhập email',
    			'email.email'=>'Nhập sai định dạng email',
    			'email.unique'=>'Email đã tồn tại',
            ]);
        
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');

			// Format file name
			$day_upload = Carbon::now()->format('dmYHis');
			$type_file = $avatar->getClientOriginalExtension();
            $file_name = "imgs/users/"."user".$day_upload.".".$type_file;
            
            // Upload file
            $avatar->move('imgs/users', $file_name);
            
            $input_user = [];
            $input_user['name'] = $request->name;
            $input_user['birthday'] = $request->birthday;
            $input_user['phonenumber'] = $request->phone;
            $input_user['address'] = $request->address;
            $input_user['email'] = $request->email;
            $input_user['username'] = $request->username;
            $input_user['password'] = Hash::make($request->password);
            $input_user['level'] = $request->level;
            $input_user['avatar'] = $file_name;

            $this->adminUserRepository->addUser($input_user);

            return redirect()->route('admin-user-list')->with('thongbao', 'Thêm tài khoản thành công');

        }

        

    }

    public function getDelete($id)
    {
        $this->adminUserRepository->delete($id);

        return redirect()->route('admin-user-list')->with('thongbao','Xóa thành công');
    }

    public function getEdit($id)
    {
        $user = $this->adminUserRepository->getUserById($id);

        return view('Admin_content.users.edit_user', compact('user'));
    }

    public function postEdit(Request $request)
    {
        $this->validate($request,
    		[
    			'name'=>'required',
    			'address'=>'required',
    			'birthday'=>'required',
    			'avatar'=>'required',
    			'username'=>'required|unique:users,username',
    			'phone'=>'required',
    			'level'=>'required',
    			'password'=>'required',
    			'password1'=>'required|same:password',
    			'email'=>'required|email|unique:users,email',
    		],[
    			'name.required'=>'Bạn chưa nhập tên',
    			'address.required'=>'Bạn chưa nhập địa chỉ',
    			'birthday.required'=>'Bạn chưa nhập ngày sinh',
    			'avatar.required'=>'Bạn chưa chọn ảnh đại diện',
    			'username.required'=>'Bạn chưa nhập tên đăng nhập',
    			'username.unique'=>'Tên đăng nhập đã tồn tại',
    			'phone.required'=>'Bạn chưa nhập số điện thoại',
    			'level.required'=>'Bạn chưa nhập quyền tài khoản',
    			'password.required'=>'Bạn chưa nhập mật khẩu',
    			'password1.required'=>'Bạn chưa nhập mật khẩu xác nhận',
    			'password1.same'=>'Mật khẩu xác nhận không đúng',
    			'email.required'=>'Bạn chưa nhập email',
    			'email.email'=>'Nhập sai định dạng email',
    			'email.unique'=>'Email đã tồn tại',
            ]);
        
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');

			// Format file name
			$day_upload = Carbon::now()->format('dmYHis');
			$type_file = $avatar->getClientOriginalExtension();
            $file_name = "imgs/users/"."user".$day_upload.".".$type_file;
            
            // Upload file
            $avatar->move('imgs/users', $file_name);
            
            $input_user = [];
            $input_user['name'] = $request->name;
            $input_user['id'] = $request->id;
            $input_user['birthday'] = $request->birthday;
            $input_user['phonenumber'] = $request->phone;
            $input_user['address'] = $request->address;
            $input_user['email'] = $request->email;
            $input_user['username'] = $request->username;
            $input_user['password'] = Hash::make($request->password);
            $input_user['level'] = $request->level;
            $input_user['avatar'] = $file_name;

            $this->adminUserRepository->editUser($input_user, $input_user['id']);

            return redirect()->route('admin-user-list')->with('thongbao', 'Sửa thông tin tài khoản thành công');
        }
    }
}