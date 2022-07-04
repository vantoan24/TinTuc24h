<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemLog;
use App\Http\Requests\StoreSystemLogRequest;
use App\Http\Requests\UpdateSystemLogRequest;
use App\Services\Interfaces\SystemLogServiceInterface;
use Illuminate\Http\Request;

class SystemLogController extends Controller
{
    protected $systemLogService;

    public function __construct(SystemLogServiceInterface $systemLogService)
    {
        $this->SystemLogService = $systemLogService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->SystemLogService->getAll($request);

        $params =[
            'items' => $items,
        ];
        return view('backend.systemLogs.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
}
