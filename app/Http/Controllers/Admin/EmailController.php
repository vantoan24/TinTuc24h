<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\MailUpdate;
use App\Models\Newsletter;
use App\Services\Interfaces\EmailServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller{

    protected $emailServiceInterface;

    public function  __construct(EmailServiceInterface $emailServiceInterface) {

        $this->emailServiceInterface = $emailServiceInterface;
    }

    public function index(Request $request){
        $newsletters =$this->emailServiceInterface->getAll($request);
        $param = [
            'newsletters' => $newsletters,
        ];
        return view('backend.email.index',$param);
    }

    public function create(){

        return view('backend.email.create');
    }

    public function store(EmailRequest $request){

        try {
            $this->emailServiceInterface->create($request);
            return redirect()->route('email.index')->with('success', ' Thêm mới email ' . $request->email . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('email.index')->with('error', ' Thêm mới email ' . $request->email . 'không thành công ');
        }

    }

    public function edit($id)

    {
        $newSletter = $this->emailServiceInterface->findById($id);
        $params = [
            'newSletter' => $newSletter,
        ];

        return view('backend.email.edit', $params);
    }



    public function update(MailUpdate $request, $id)
    {
        try {
            $this->emailServiceInterface->update($request, $id);
            return redirect()->route('email.index')->with('success', 'Sửa email' . ' ' . $request->content . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('email.index')->with('error', 'Sửa email' . ' ' . $request->content . ' ' .  'không thành công');
        }
    }

    public function destroy($id)
    {
        try {
            $this->emailServiceInterface->destroy($id);
            return redirect()->route('email.index')->with('success', 'Xóa email thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('email.index')->with('error', 'Xóa email không thành công');
        }
    }

    public function test(Request $request){

        $validated = $request->validate(
            [
                'ids' => 'required',
            ],
            [
                'ids.required' => 'Bạn phải chọn ô',
            ],
    );
       $id=$request->ids;
       Newsletter::whereIn('id', $id)->delete();
       return redirect()->route('email.index')->with('success', 'Xóa email thành công');
    }
}
