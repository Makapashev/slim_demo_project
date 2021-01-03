<?php

namespace App\Domain\Account;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="accounts")
 * */
final class Account
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="account_balance")
     */
    private Balance $balance;

    /**
     * @ORM\Column(type="account_status")
     */
    private Status $status;
    
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct()
    {
        $this->balance = Balance::init();
        $this->status = Status::wait();
    }
}