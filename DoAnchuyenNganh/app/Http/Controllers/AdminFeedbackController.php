<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\AdminFeedbackRepository;
use Carbon\Carbon;
use Hash;

class AdminFeedbackController extends Controller
{
    protected $adminFeedbackRepository;

    public function __construct(){
    	$this->adminFeedbackRepository = new AdminFeedbackRepository();
    }

    public function getList()
    {
        $feedback = $this->adminFeedbackRepository->getFeedback();

        return view('Admin_content.feedback.all_feedback', compact('feedback'));
    }

}