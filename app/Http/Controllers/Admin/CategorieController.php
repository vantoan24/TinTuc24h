<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Services\Interfaces\CategorieServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategorieController extends Controller
{
    protected $categorieService;

    public function __construct(CategorieServiceInterface $categorieService)
    {
        $this->categorieService = $categorieService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $this->categorieService->getAll($request);
        $params = [
            "categories" => $categories,
        ];
        return view("backend.categories.index", $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategorieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategorieRequest $request)
    {
        try {
            $categories = $this->categorieService->create($request->all());
            return redirect()->route('categories.index')->with('success', ' Thêm loại tin tức ' . $categories->name . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('success', ' Thêm loại tin tức ' . $categories->name . 'không thành công ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie, $id)
    {
        $category = $this->categorieService->findById($id);
        $params = [
            'category' => $category,
        ];
        return view("backend.categories.edit", $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategorieRequest  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategorieRequest $request, Categorie $categorie, $id)
    {
        try {
            $oldCustomer = $this->categorieService->update($request->all(), $id);
            return redirect()->route('categories.index')->with('success', ' Sửa loại tin tin tức' . $oldCustomer->name . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('success', ' Sửa loại tin tin tức' . $oldCustomer->name . 'không thành công ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie, $id)
    {
        try {
            $categorie = $this->categorieService->destroy($id);
            return redirect()->route('categories.index')->with('success', ' Xóa loại tin tức ' . $categorie->name . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', 'Xóa loại tin tức' . ' ' . $categorie->name . ' ' .  'không thành công');
        }
    }
}
