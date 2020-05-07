<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\bookingRepository;
use App\Http\Repositories\PostRepository;
use Auth;
use Carbon\Carbon;
use DateTime;
use PDF;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    protected $userRepository;
    protected $postRepository;
    protected $bookingRepository;

    public function __construct(){
        $this->userRepository = new UserRepository();
        $this->postRepository = new PostRepository();
        $this->bookingRepository = new bookingRepository();
    }
    
    // Display profile
    public function getProfile()
    {
        return view('Profile.profile');
    }

    // Update profile
    public function updateInfo(Request $request)
    {
        $this->validate($request,
    		[
    			'name'=>'required',
    			'phonenumber'=>'required',
    			'address'=>'required',
    			'birthday'=>'required',
    			'avatar'=>'required',
    		],[
    			'name.required'=>'Bạn chưa nhập tên',
    			'phonenumber.required'=>'Bạn chưa nhập số điện thoại',
    			'address.required'=>'Bạn chưa nhập địa chỉ',
    			'birthday.required'=>'Bạn chưa nhập ngày sinh',
    			'avatar.required'=>'Bạn chưa chọn ảnh đại diện',
            ]);

        $id = Auth::user()->id;
            
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');

			// Format file name
			$day_upload = Carbon::now()->format('dmYHis');
			$type_file = $avatar->getClientOriginalExtension();
            $file_name = "imgs/users/"."user".$day_upload.".".$type_file;

            $this->userRepository->updateInfo($request->name, $request->phonenumber, $request->address, $request->birthday, $file_name, $id);
            
            // Upload file
            $avatar->move('imgs/users', $file_name);
            
            return redirect()->route('profile')->with('thongbao','Sửa thành công');
        }
    }

    // Display Password
    public function password()
    {
        return view('Profile.password');
    }

    // Update Password
    public function updatePassword(Request $request)
    {
        $this->validate($request,
    		[
    			'new_password'=>'required',
    			'new_password_confirm'=>'required|same:new_password'
    		],[
    			'new_password.required'=>'Bạn chưa nhập mật khẩu mới',
    			'new_password_confirm.required'=>'Bạn chưa nhập mật khẩu mới xác nhận',
    			'new_password_confirm.same'=>'Mật khẩu mới xác nhận chưa đúng'
            ]);

        $id = Auth::user()->id;

        $this->userRepository->updatePassword($id, $request->new_password);

        return redirect()->route('password')->with('thongbao','Sửa thành công');
    }

    // Display post list of user
    public function post(Request $request)
    {
        $id = Auth::user()->id;
        $post = $this->postRepository->getPost($id);

        return view('Profile.posts', compact('post'));
    }

    // Update delete status for this post
    public function updateDeletePost($id)
    {
        $this->postRepository->updateDeletePost($id);

        return redirect()->route('post')->with('thongbao','Xóa thành công');
    }

    // Posting
    public function posting()
    {
        $city = $this->postRepository->getCity();
        $accommodation_type = $this->postRepository->getAccommodationType();
        $room_type = $this->postRepository->getRoomType();
        $service = $this->postRepository->getService();

        return view('Profile.list_property', compact('city', 'accommodation_type', 'room_type', 'service'));
    }

    // Post process
    public function postProcess(Request $request)
    {

        $id = Auth::user()->id;

        $this->validate($request,
    		[
    			'accommodation_name'=>'required',
    			'accommodation_address'=>'required',
    			'accommodation_describe'=>'required',
    			'scenery_around'=>'required',
    			'image_1'=>'required',
    		],[
    			'accommodation_name.required'=>'Bạn chưa nhập tên chổ nghỉ',
    			'accommodation_address.required'=>'Bạn chưa nhập địa chỉ chỗ nghỉ',
    			'accommodation_describe.required'=>'Bạn chưa nhập mô tả',
    			'scenery_around.required'=>'Bạn chưa nhập mô tả xung quanh',
    			'image_1.required'=>'Bạn chưa chọn ảnh',
    			
            ]);

        if($request->hasFile('image_1'))
        {
            $avatar = $request->file('image_1');

            // Format file name
            $day_upload = Carbon::now()->format('dmYHis');
            $type_file = $avatar->getClientOriginalExtension();
            $accommodation_img = "imgs/room/"."room".$day_upload.".".$type_file;

             // Upload file
             $avatar->move('imgs/room', $accommodation_img);

             // Get value post need to insert
            $input_post = [];
            $input_post['user_id'] = $id;
            $input_post['accommodation_type_id'] = $request->accommodation_type_id;
            $input_post['city_id'] = $request->city_id;
            $input_post['accommodation_name'] = $request->accommodation_name;
            $input_post['accommodation_address'] = $request->accommodation_address;
            $input_post['accommodation_describe'] = $request->accommodation_describe;
            $input_post['scenery_around'] = $request->scenery_around;
            $input_post['accommodation_status'] = 'chưa duyệt';
            $input_post['accommodation_img'] = $accommodation_img;
            $input_post['flag_delete'] = 0;

             // Get value room need to insert
            $input_room1 = [];
            $input_room1['room_name'] = $request->room_name_2;
            $input_room1['utilities'] = $request->room_utilities_2;
            $input_room1['area'] = $request->room_area_2;
            $input_room1['price'] = $request->room_price_2;
            $input_room1['room_type_id'] = $request->room_type_2;

             // Get value room option need to insert
             $input_room2 = [];
             $input_room2['room_name'] = $request->room_name_3;
             $input_room2['utilities'] = $request->room_utilities_3;
             $input_room2['area'] = $request->room_area_3;
             $input_room2['price'] = $request->room_price_3;
             $input_room2['room_type_id'] = $request->room_type_3;

             // Get value room option need to insert
             $input_room3 = [];
             $input_room3['room_name'] = $request->room_name_4;
             $input_room3['utilities'] = $request->room_utilities_4;
             $input_room3['area'] = $request->room_area_4;
             $input_room3['price'] = $request->room_price_4;
             $input_room3['room_type_id'] = $request->room_type_4;

            // Get multi img
            $input_img = [];
            if($request->hasFile('image_2'))
            {
                foreach($request->file('image_2') as $item)
                {
                    $name = uniqid().$item->getClientOriginalName();
                    $name_file = "imgs/room/".$name;
                    $item->move('imgs/room', $name);
                    array_push($input_img, $name_file);  
                }
            }
    
            $this->postRepository->insertPost($input_post, $input_room1, $input_room2, $input_room3, $request->service, $input_img);
            
            return redirect()->route('post')->with('thongbao','Thêm bài viết thành công, vui lòng chờ admin duyệt bài');
        }
       
    }

    // Display Post Edit
    public function postEdit($post_id)
    {
        $city = $this->postRepository->getCity();
        $accommodation_type = $this->postRepository->getAccommodationType();
        $room_type = $this->postRepository->getRoomType();
        $service = $this->postRepository->getService();
        $post = $this->postRepository->getPostById($post_id);

        return view('Profile.post_edit', compact('city', 'accommodation_type', 'room_type', 'service','post'));
    }

    // Display transaction 
    public function postTran($post_id)
    {
        $trans = $this->bookingRepository->getTransactionByPostId($post_id);

        return view('Profile.transaction', compact('trans'));
    }

    // Display receipt
    public function getReceipt($tran_id)
    {
        $tran = $this->bookingRepository->getTransaction($tran_id);

        return view('Profile.receipt', compact('tran'));
    }

    // Print receipt
    public function receiptPrint($tran_id)
    {
        $tran = $this->bookingRepository->getTransaction($tran_id);

        $this->bookingRepository->changePay($tran_id);

        $pdf = PDF::loadView('Profile.receipt_print',  compact('tran'));

        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Dejavu Sans']);
        
    	return $pdf->download('transaction.pdf');
    }

    // Display booking list of user
    public function booking()
    {
        $user_id = Auth::user()->id;

        $booking = $this->bookingRepository->getTransactionById($user_id);

        return view('Profile.booking', compact('booking'));
    }

    // Cancel booking room
    public function cancelTransaction($id)
    {
        $this->bookingRepository->cancelTransaction($id);

        return redirect()->route('booking')->with('thongbao', 'Hủy đặt phòng thành công');
    }

    // Edit  booking room
    public function getEditBooking($id)
    {
        $post = $this->bookingRepository->getTransaction($id);

        $post_now = $this->bookingRepository->getPostById($post->post_id);

        return view('Profile.booking_edit', compact('post', 'post_now'));
    }

    // Edit booking process
    public function getEditBookingProcess(Request $request)
    {
        // Get room
        $room = $this->bookingRepository->getRoomById($request->room_id);

        // Get post
        $post = $this->bookingRepository->getPostById($request->post_id);

        // Get price of this room
        $price = $room->price;

        if(Auth::check())
        {
            $user_id = Auth::user()->id;
        }

        $this->validate($request,
    		[
    			'name'=>'required',
    			'address'=>'required',
    			'email'=>'required',
    			'receive_day'=>'required',
    			'return_day'=>'required',
    		],[
    			'name.required'=>'Bạn chưa nhập tên',
    			'address.required'=>'Bạn chưa nhập địa chỉ',
    			'email.required'=>'Bạn chưa nhập email',
    			'receive_day.required'=>'Bạn chưa nhập ngày nhận phòng',
    			'return.required'=>'Bạn chưa nhập ngày trả phòng',
            ]);

        $start = new DateTime($request->receive_day);
        $end = new DateTime($request->return_day);

        // Get number of day
        $day = $start->diff($end);
        $day = $day->format('%a');

        // Get total
        $total = $day*$price;

        // Save input
        session(['customer_name'=>$request->name]);
        session(['customer_address'=>$request->address]);
        session(['customer_phonenumber'=>$request->phonenumber]);
        session(['customer_email'=>$request->email]);
        session(['room_id'=>$request->room_id]);
        session(['receive_room_day'=>$request->receive_day]);
        session(['return_room_day'=>$request->return_day]);
        session(['post_id'=>$request->post_id]);
        session(['total'=>$total]);
        session(['user_id'=>$request->user_id]);
        session(['isPay'=>0]);
        session(['flag_delete'=>0]);
        session(['id'=>$request->id]);

        return view('Profile.confirm_edit_booking', compact('post', 'room', 'day'));
    }

    // Confirm booking
    public function confirmEditBooking()
    {
        $input_booking = [];
        $input_booking['customer_name'] = session('customer_name');
        $input_booking['customer_address'] = session('customer_address');
        $input_booking['customer_phonenumber'] = session('customer_phonenumber');
        $input_booking['customer_email'] = session('customer_email');
        $input_booking['room_id'] = session('room_id');
        $input_booking['receive_room_day'] = session('receive_room_day');
        $input_booking['return_room_day'] = session('return_room_day');
        $input_booking['post_id'] = session('post_id');
        $input_booking['total'] = session('total');
        $input_booking['user_id'] = session('user_id');
        $input_booking['isPay'] = session('isPay');
        $input_booking['flag_delete'] = session('flag_delete');
        $input_booking['id'] = session('id');

        session()->forget([
            'customer_name', 
            'customer_address', 
            'customer_phonenumber', 
            'customer_email', 
            'room_id', 
            'receive_room_day', 
            'return_room_day',
            'post_id',
            'total',
            'user_id',
            'isPay',
            'flag_delete',
            'id',
        ]);

        $this->bookingRepository->editTransaction($input_booking, $input_booking['id']);

        return redirect()->route('booking')->with('thongbao','Cập nhật thông tin phòng thành công');
    }
}
