<?php
namespace App\Repositories\Eloquent;

use App\Models\SystemLog;
use App\Repositories\Interfaces\SystemLogInterface;

class SystemLogRepository extends EloquentRepository implements SystemLogInterface
{

    public function getModel()
    {
        return SystemLog::class;
    }
    public function getAll($request)
    {
        $systemLog = $this->model->select('*');
        if (isset($request->data) && $request->data) {
            $data = $request->data;
            $systemLog->where('data', 'LIKE', '%' . $data . '%');

        }
        $systemLog->orderBy('id', 'desc');
        $systemLogs = $systemLog->paginate(4);

        return $systemLogs;
    }


}
