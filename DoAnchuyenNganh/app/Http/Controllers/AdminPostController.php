<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\AdminPostRepository;
use Carbon\Carbon;
use Hash;

class AdminPostController extends Controller
{
    protected $adminPostRepository;

    public function __construct(){
    	$this->adminPostRepository = new AdminPostRepository();
    }

    public function getList()
    {
        $post = $this->adminPostRepository->getPost();

        return view('Admin_content.posts.all_post', compact('post'));
    }

    public function getDelete($id)
    {
        $this->adminPostRepository->delete($id);

        return redirect()->route('admin-post-list')->with('thongbao','Xóa thành công');
    }

    public function getReview($id)
    {
        $this->adminPostRepository->review($id);

        return redirect()->route('admin-post-list')->with('thongbao','Duyệt bài thành công');
    }

}