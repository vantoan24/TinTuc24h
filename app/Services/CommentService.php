<?php

namespace App\Services;

use App\Repositories\Interfaces\CommentInterface;
use App\Services\Interfaces\CommentServiceInterface;

class CommentService implements CommentServiceInterface
{

    protected $commentRepository;

    public function __construct(CommentInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }
    public function getAll($request)
    {
        return $this->commentRepository->getAll($request);
    }
    public function findById($id)
    {
        return $this->commentRepository->findById($id);
    }

    public function create($request)
    {
        $comment = $this->commentRepository->create($request);
        return $comment;

    }

    public function update($request, $id)
    {
        return $this->commentRepository->update($request, $id);
    }

    public function destroy($id)
    {
        $comment = $this->commentRepository->findById($id);
        $this->commentRepository->destroy($comment);
        return $comment;

    }

}
