<?php

namespace App\Services;

use App\Repositories\Interfaces\EmailInterface;
use App\Services\Interfaces\EmailServiceInterface;

class EmailService implements EmailServiceInterface
{
    protected $emailInterface;

    public function __construct(EmailInterface $emailInterface)
    {
        $this->emailInterface = $emailInterface;
    }

    public function getAll($request)
    {
        return $this->emailInterface->getAll($request);
    }
    public function findById($id)
    {
        return $this->emailInterface->findById($id);
    }

    public function create($request)
    {
        $email = $this->emailInterface->create($request);
        return $email;

    }

    public function update($request, $id)
    {
        $email = $this->emailInterface->findById($id);
        $this->emailInterface->update($request, $email);
        return $email;
    }

    public function destroy($id)
    {
        $email = $this->emailInterface->findById($id);
        $this->emailInterface->destroy($email);
        return $email;

    }
}
