<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserGroup;
use App\Http\Requests\StoreUserGroupRequest;
use App\Http\Requests\UpdateUserGroupRequest;
use App\Services\Interfaces\UserGroupServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserGroupController extends Controller
{
    protected $userGroupService;

    public function __construct(UserGroupServiceInterface $userGroupService)
    {
        $this->UserGroupService = $userGroupService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->UserGroupService->getAll($request);
        // dd($userGroups);
        // return response()->json($items, 200);
        // $userGroups = UserGroup::all();
        $params =[
            'items' => $items,
        ];
        return view('backend.userGroups.index',$params);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.userGroups.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserGroupRequest $request)
    {

        try {
            $item = $this->UserGroupService->create($request->all());
            return redirect()->route('userGroups.index')->with('success', 'Thêm nhóm' . ' ' . $item->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('userGroups.index')->with('error', 'Thêm nhóm' . ' ' . $item->name . ' ' .  'không thành công');
        }

        // return response()->json($item, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserGroup  $UserGroup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->UserGroupService->findById($id);

        return response()->json($item, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserGroup  $UserGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = UserGroup::find($id);
        $params = [
            'item' => $item,
        ];
        return view('backend.userGroups.edit',$params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserGroupRequest  $request
     * @param  \App\Models\UserGroup  $UserGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserGroupRequest $request, $id)
    {

        try {
            $item = $this->UserGroupService->update($request->all(), $id);
            return redirect()->route('userGroups.index')->with('success', 'Sửa nhóm' . ' ' . $item->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('userGroups.index')->with('error', 'Sửa nhóm' . ' ' . $item->name . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserGroup  $UserGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        try {
            $item = $this->UserGroupService->destroy($id);
            return redirect()->route('userGroups.index')->with('success', 'Xóa nhóm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('userGroups.index')->with('error', 'Xóa nhóm' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    public function trashedItems()
    {
        // dd($request);
        $items = $this->UserGroupService->trashedItems();
        // dd($items);
        $params = [
            'items' => $items,
            // 'userGroup'=>$userGroup
        ];
        return view('backend.userGroups.trash',$params);
    }

    public function restore($id)
    {
        try {
            $this->UserGroupService->restore($id);
            return redirect()->route('userGroups.trash')->with('success', 'Khôi phục thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('userGroups.trash')->with('success', 'Khôi phục thành công');
        }
    }

    public function force_destroy($id)
    {

        try {
            $userGroup = $this->UserGroupService->force_destroy($id);
            return redirect()->route('userGroups.trash')->with('success', 'Xóa' . ' ' . $userGroup->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('userGroups.trash')->with('error', 'Xóa' . ' ' . $userGroup->name . ' ' .  'không thành công');
        }
    }

}
