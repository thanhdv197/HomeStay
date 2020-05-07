<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\BookingRepository;
use Auth;
use DateTime;

class BookingController extends Controller
{
    protected $bookingRepository;

    public function __construct(){
    	$this->bookingRepository = new BookingRepository();
    }

    // Display booking room
    public function getBooking($type)
    {
        $room = $this->bookingRepository->getRoom($type);
        $post = $this->bookingRepository->getPostById($type);

        return view('Customer.payment', compact('room', 'post'));
    }

    // Insert data booking room
    public function insertBooking(Request $request)
    {
        // Get post id
        $post_id = $this->bookingRepository->getPost($request->room_id);
        // Get price of this room
        $price = $post_id->price;

        if(Auth::check())
        {
            $user_id = Auth::user()->id;
        }

        $this->validate($request,
    		[
    			'name'=>'required',
    			'address'=>'required',
    			'email'=>'required|email',
    			'receive_day'=>'required',
    			'return_day'=>'required',
    		],[
    			'name.required'=>'Bạn chưa nhập tên',
    			'address.required'=>'Bạn chưa nhập địa chỉ',
    			'email.required'=>'Bạn chưa nhập email',
    			'email.email'=>'Nhập sai định dạng email',
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
        session(['post_id'=>$post_id->post->id]);
        session(['total'=>$total]);
        session(['user_id'=>$user_id??0]);
        session(['isPay'=>0]);
        session(['flag_delete'=>0]);

        return view('Customer.confirmation', compact('post_id', 'day'));
    }

    // Confirm booking
    public function confirmBooking()
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
        ]);

        $this->bookingRepository->insertTransaction($input_booking);

        return redirect()->route('book-room', $input_booking['post_id'])->with('thongbao','Đặt phòng thành công');
    }
}
