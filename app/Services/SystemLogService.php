<?php

namespace App\Services;

use App\Repositories\Interfaces\SystemLogInterface;
use App\Services\Interfaces\SystemLogServiceInterface;

class SystemLogService implements SystemLogServiceInterface
{
    protected $systemLogRepository;

    public function __construct(SystemLogInterface $systemLogRepository)
    {
        $this->systemLogRepository = $systemLogRepository;
    }

    public function getAll($request)
    {
        return $this->systemLogRepository->getAll($request);
    }

    public function findById($id)
    {
        $systemLog = $this->systemLogRepository->findById($id);
        return $systemLog;
    }

    public function create($request)
    {
        $systemLog = $this->systemLogRepository->create($request);
        return $systemLog;
    }

    public function update($request, $id)
    {
        $systemLog = $this->systemLogRepository->findById($id);
        $this->systemLogRepository->update($request, $systemLog);
        return $systemLog;
    }

    public function destroy($id)
    {
        $systemLog = $this->systemLogRepository->findById($id);
        $this->systemLogRepository->destroy($systemLog);
        return $systemLog;
    }
}
