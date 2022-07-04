<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CommentsController extends Controller
{

    public function load_comment(Request $request)
    {
        $new_id = $request->news_comment;
        $comments = Comment::where('new_id', $new_id)->where('startus', 'approved')->get();

        $output = '';
        foreach ($comments as $key => $comment) {
            $output .= '

            <div class="row style_comment">

                <div class="col-md-4">
                    <div class="comment">
                        <p style="color:green">Văn Toàn ' . $comment->created_at->diffForHumans() . '</p>
                        <p>' . $comment->content . '</p>
                    </div>
                </div>
            </div>
            ';
        }
        echo $output;
    }
    public function send_comment(Request $request)
    {

        $new_id = $request->news_comment;
        $content =  $request->comment;
        $comment = new Comment();
        $comment->startus = "pending";
        $comment->content = $content;
        $comment->new_id = $new_id;
        // $comment->created_at =Carbon::now('Asia/Ho_Chi_Minh');
        // $comment->updated_at =Carbon::now('Asia/Ho_Chi_Minh');
        $comment->save();
    }
}
