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
     * @ORM\ManyToOne(targetEntity="App\Domain\Customer\Customer", inversedBy="accounts")
     * @ORM\JoinColumn(name="id_customer", referencedColumnName="id",
     *     nullable=false)
     * */
    private Customer $customer;

    /**
     * @ORM\Column(type="account_balance", nullable=false)
     */
    private Balance $balance;

    /**
     * @ORM\Column(type="account_status", nullable=false)
     */
    private Status $status;

    /**
     * @ORM\Column(type="datetime",
     *     nullable=false,
     *     columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP"
     * )
     * */
    private DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime",
     *     nullable=false,
     *     columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"
     * )
     * */
    private DateTime $updatedAt;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
        $this->balance = Balance::init();
        $this->status = Status::wait();
    }
}