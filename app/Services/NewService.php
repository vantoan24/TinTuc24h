<?php

namespace App\Services;

use App\Repositories\Interfaces\NewInterface;
use App\Services\Interfaces\NewServiceInterface;

class NewService implements NewServiceInterface
{
    protected $newsRepository;

    public function __construct(NewInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function getAll($request)
    {
        $news = $this->newsRepository->getAll($request);
        return $news;
    }

    public function findById($id)
    {
        $news = $this->newsRepository->findById($id);
        $this->newsRepository->findById($id);
        return $news;
    }

    public function create($request)
    {
        $news = $this->newsRepository->create($request);
        $this->newsRepository->create($request);
        return $news;
    }

    public function update($request, $id)
    {
        $news = $this->newsRepository->findById($id);
        $this->newsRepository->update($request, $id);
        return $news;
    }

    public function destroy($id)
    {
        $news = $this->newsRepository->findById($id);
        $this->newsRepository->destroy($news);
        return $news;
    }
    public function getHot($request)
    {
        $news = $this->newsRepository->getHot($request);
        return $news;
    }

    public function trashedItems()
    {
        return $this->newsRepository->trashedItems();
    }

    public function restore($id)
    {
        return $this->newsRepository->restore($id);
    }
    public function force_destroy($id)
    {
        return $this->newsRepository->force_destroy($id);
    }

    public function getAllByCategory($id)
    {
        return $this->newsRepository->getAllByCategory($id);
    }
    public function newPresentli()
    {
        return $this->newsRepository->newPresentli();
    }
}
