<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\Feedback;


class AdminFeedbackRepository
{
    protected $feedback;


    public function __construct(){
        $this->feedback = new Feedback();
    }

    public function getFeedback()
    {
        return $this->feedback->all();
    }

}
