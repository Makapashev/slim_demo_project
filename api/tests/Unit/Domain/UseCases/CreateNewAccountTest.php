<?php

namespace Tests\Unit\Domain\UseCases;

use App\Domain\Account\Account;
use PHPUnit\Framework\TestCase;
use Tests\Builder\CustomerBuilder;

class CreateNewAccountTest extends TestCase
{
    private $builder;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->builder = new CustomerBuilder();
        parent::__construct($name, $data, $dataName);
    }

    public function testSuccess()
    {
        $customer = $this->builder->build();
        $customer->createNewAccount();
        $accounts = $customer->getAccounts();
        self::assertInstanceOf(Account::class, $accounts[0]);
    }
}