<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\CommentInterface;
use Illuminate\Support\Facades\Log;

class CommentRepository extends EloquentRepository implements CommentInterface
{

    public function getModel()
    {
        return Comment::class;
    }

    public function getAll($request)
    {
         $comment = $this->model->orderBy('startus', 'DESC')->paginate(8);
         return $comment;
    }

    public function update($request, $id)
    {
        // dd($id);
        $comment =$this->model->find($id);
        $comment->startus = $request->startus;
        $comment->content = $request->content;
        try {
            $comment->save();

            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        // dd($comment);
    }
    return $comment;
}

    public function destroy($id)
    {
        $comment = $this->model->find($id)->first();
        $comment->delete();
        return $comment;
    }

}
