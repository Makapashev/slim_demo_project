<?php
declare(strict_types=1);

namespace App\Domain\Account;

use App\Domain\Customer\Customer;
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
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="accounts")
     * @ORM\JoinColumn(name="id_customer", referencedColumnName="id")
     * */
    private Customer $customer;

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