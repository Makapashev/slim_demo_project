<?php

namespace App\Domain\Account;

use DateTime;

final class Account
{
    private ?int $id;
    private int $idCustomer;
    private Balance $balance;
    private Status $status;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct()
    {
        $this->balance = Balance::init();
        $this->status = Status::wait();
    }
}