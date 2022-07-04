<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\Interfaces\UserGroupServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService, UserGroupServiceInterface $userGroupService)
    {
        $this->UserService = $userService;
        $this->UserGroupService = $userGroupService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->UserService->getAll($request);
        $userGroups = $this->UserGroupService->getAll($request);
        // dd($users);
        // return response()->json($items, 200);
        $params = [
            'items' => $items,
            'userGroups' => $userGroups,
        ];
        return view('backend.users.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $items = $this->UserGroupService->getAll($request);
        $params = [
            'items' => $items,
        ];
        return view('backend.users.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $item = $this->UserService->create($request);
            return redirect()->route('users.index')->with('success', 'Thêm' . ' ' . $item->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index')->with('error', 'Thêm' . ' ' . $item->name . ' ' .  'không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $items = $this->UserGroupService->getAll($request);
        $item = User::find($id);

        $params = [
            'item' => $item,
            'items' => $items,
        ];
        return view('backend.users.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $item = $this->UserService->update($request, $id);
            return redirect()->route('users.index')->with('success', 'Sửa' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index')->with('error', 'Sửa' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $item = $this->UserService->destroy($id);
            return redirect()->route('users.index')->with('success', 'Xóa' . ' ' . $item->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index')->with('error', 'Xóa' . ' ' . $item->name . ' ' .  'không thành công');
        }
    }

    public function trashedItems()
    {
        // dd($request);
        $items = $this->UserService->trashedItems();
        // dd($items);
        $params = [
            'items' => $items,
            // 'userGroup'=>$userGroup
        ];
        return view('backend.users.trash',$params);
    }

    public function restore($id)
    {
        try {
            $this->UserService->restore($id);
            return redirect()->route('users.trash')->with('success', 'Khôi phục thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.trash')->with('success', 'Khôi phục thành công');
        }
    }

    public function force_destroy($id)
    {

        try {
            $user = $this->UserService->force_destroy($id);
            return redirect()->route('users.trash')->with('success', 'Xóa' . ' ' . $user->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.trash')->with('error', 'Xóa' . ' ' . $user->name . ' ' .  'không thành công');
        }
    }

    public function export(){

        return FacadesExcel::download( new UserExport, 'user.xlsx');
    }
}
