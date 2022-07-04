<?php

namespace App\Http\Controllers\Admin;

use App\Events\EventNewsleters;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Services\Interfaces\NewServiceInterface;
use Illuminate\Support\Facades\Session;

use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use App\Models\News;
use App\Services\Interfaces\CategorieServiceInterface;
use Illuminate\Support\Facades\Log;


class NewsController extends Controller
{
    protected $newsService;
    protected $categorieService;
    protected $usersService;

    public function __construct(NewServiceInterface $newsService, UserServiceInterface $usersService, CategorieServiceInterface $categorieService)
    {
        $this->newsService = $newsService;
        $this->usersService = $usersService;
        $this->categorieService = $categorieService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $news = $this->newsService->getAll($request);
        $categories = $this->categorieService->getAll($request);
        $params = [
            "news" => $news,
            "categories" => $categories,
        ];
        return view('backend.news.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $users = $this->usersService->getAll($request);

        $categories = $this->categorieService->getAll($request);
        $params = [
            'users' => $users,
            'categories' => $categories
        ];
        return view('backend.news.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        try {
            if ((int) $request->hot === 1) {

                $newhots = News::where('hot', 1)->get();
                
                if (count($newhots) === 10) {

                    Session::flash('message', 'Chung tôi chỉ cho phép 10 sản phẩm  Hot');
                    return redirect()->back();
                }
            }
            $news = $this->newsService->create($request);
            return redirect()->route('news.index')->with('success', ' Thêm tin tức ' . $request->title . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('news.index')->with('error', ' Thêm tin tức ' . $request->title . 'không thành công ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $users = $this->usersService->getAll($id);
        $new = $this->newsService->findById($id);
        $news = News::select('id', 'image')->get();

        $categories = $this->categorieService->getAll($id);

        $params = [
            'users' => $users,
            'categories' => $categories,
            'news' => $news,
            'new' => $new
        ];
        // dd($params);
        return view('backend.news.edit', $params);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateNewsRequest $request, $id)
    {
        try {

            if ((int) $request->hot === 1) {
                $newhots = News::where('hot', 1)->get();
                if (count($newhots) === 10) {

                    Session::flash('message', 'Chung tôi chỉ cho phép 10 sản phẩm  Hot');
                    return redirect()->back();
                }
            }

            $news = $this->newsService->update($request, $id);
            return redirect()->route('news.index')->with('success', ' Sửa  Tin tức ' . $request->title . ' ' . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('news.index')->with('success', ' Sửa  Tin tức ' . $request->title . ' ' . 'không thành công ');
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        try {
            $news = $this->newsService->destroy($id);
            return redirect()->route('news.index')->with('success', ' Xóa Tin tức ' . $news->name . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('news.index')->with('error', 'Xóa' . 'Tin tức' . $news->name . ' ' .  'không thành công');
        }
    }

    public function trashedItems()
    {
        // dd($request);
        $news = $this->newsService->trashedItems();
        // dd($items);
        $params = [
            'news' => $news,
            // 'userGroup'=>$userGroup
        ];
        return view('backend.news.trash', $params);
    }

    public function restore($id)
    {
        try {
            $this->newsService->restore($id);
            return redirect()->route('news.trash')->with('success', 'Khôi phục thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('news.trash')->with('success', 'Khôi phục thành công');
        }
    }

    public function force_destroy($id)
    {
        try {
            $news = $this->newsService->force_destroy($id);

            return redirect()->route('news.trash')->with('success', 'Xóa' . ' ' . $news->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('news.trash')->with('error', 'Xóa' . ' ' . $news->name . ' ' .  'không thành công');
        }
    }
}
