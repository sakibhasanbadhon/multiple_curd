<?php

namespace App\Http\Controllers;

use App\Mail\QueueMail;
use App\Jobs\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QueueController extends Controller
{
    public function queue()
    {
        return view('backend.brand.queue');
    }


    public function queueStore(Request $request)
    {
        UserRegister::dispatch($request->all())->delay(now()->addSeconds(15));
        return back()->with('success','Queue mail send successfully');

    }
}
