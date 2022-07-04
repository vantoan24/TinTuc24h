<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsletersController extends Controller{

    public function addNewsleters(Request $request){
        $email = $request->email;

        $CheckMail = Newsletter::where('email', $email)->first();

        if($CheckMail){
            $Newsleter = $CheckMail;
        }else{
            $Newsleter = new Newsletter();
        }
        $Newsleter->email = $email;

        try {
            $Newsleter->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
