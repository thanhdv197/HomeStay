<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
use App\Http\Repositories\UserRepository;

class HeaderController extends Controller
{
	protected $userRepository;

    public function __construct(){
        $this->userRepository = new UserRepository();
	}
	
	//Login
    public function login(Request $request)
    {
		$rules = [
    		'login_username' =>'required',
    		'login_password' => 'required'
    	];
    	$messages = [
    		'login_username.required' => 'Username là trường bắt buộc',
    		'login_password.required' => 'Password là trường bắt buộc'
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

		//check validator
    	if ($validator->fails()) {
            return response()->json([
                    'error' => true,
                    'message' => $validator->errors()
                ], 200);
    		// return redirect()->back()->withErrors($validator)->withInput();
    	} else {
    		$username = $request->login_username;
    		$password = $request->login_password;

			//check login
    		if( Auth::attempt(['username' => $username, 'password' =>$password])) {
                return response()->json([
                    'error' => false,
                    'message' => 'success'
                ], 200);
    			// return redirect()->intended('/');
    		} else {
    			$errors = new MessageBag(['errorlogin' => 'Tài khoản hoặc mật khẩu không đúng']);
                return response()->json([
                    'error' => true,
                    'message' => $errors
                ], 200);
    			// return redirect()->back()->withInput()->withErrors($errors);
    		}
    	}

	}
	
	//Logout 
	public function logout() 
	{
		Auth::logout();
		return redirect()->route('index');
	}

	//Register account
	public function register(Request $request)
	{
		// dd($request->all());

		$rules = [
    		'username' =>'required|unique:users,username',
    		'email' => 'required|email|unique:users,email',
    		'password' => 'required',
    		'password_confirm' => 'required|same:password',
    		'name' => 'required',
    		'phonenumber' => 'required',
    		'address' => 'required',
    		'birthday' => 'required',
    		'avatar' => 'required',
    	];
    	$messages = [
    		'username.required' => 'Username là trường bắt buộc',
    		'username.unique' => 'Username đã tồn tại',
    		'email.required' => 'Email là trường bắt buộc',
    		'email.email' => 'Email sai định dạng',
    		'email.unique' => 'Email đã tồn tại',
    		'password.required' => 'Password là trường bắt buộc',
    		'password_confirm.required' => 'Password confirm là trường bắt buộc',
    		'password_confirm.same' => 'Password confirm không trùng với password',
    		'name.required' => 'Tên là trường bắt buộc',
    		'phonenumber.required' => 'Số điện thoại là trường bắt buộc',
    		'address.required' => 'Địa chỉ là trường bắt buộc',
    		'birthday.required' => 'Ngày sinh là trường bắt buộc',
    		'avatar.required' => 'Ảnh đại diện là trường bắt buộc',
    	];
		$validator = Validator::make($request->all(), $rules, $messages);
		
		//check validator
		if ($validator->fails()) {
			return response()->json([
					'error' => true,
					'message' => $validator->errors()
				], 200);
			// return redirect()->back()->withErrors($validator)->withInput();
		} else {
			$username = $request->username;
			$password = $request->password;
			$email = $request->email;
			$name = $request->name;
			$phonenumber = $request->phonenumber;
			$address = $request->address;
			$birthday = $request->birthday;
			$avatar = $request->file('avatar');

			// Format file name
			$day_upload = Carbon::now()->format('dmYHis');
			$type_file = $avatar->getClientOriginalExtension();
			$file_name = "imgs/users/"."user".$day_upload.".".$type_file;

			//Insert users table
			$this->userRepository->insert($username, $password, $email, $name, $phonenumber, $address, $birthday, $file_name);

			// Upload file
			$avatar->move('imgs/users', $file_name);

			return response()->json([
				'error' => false,
				'message' => 'success'
			], 200);
		}
	}
}
