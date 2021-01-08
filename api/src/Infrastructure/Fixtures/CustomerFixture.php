<?php

declare(strict_types=1);

namespace App\Infrastructure\Fixtures;

use App\Domain\Customer\Customer;
use App\Domain\Customer\Email;
use App\Domain\Customer\Name;
use App\Domain\Customer\PhoneNumber;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;

class CustomerFixture extends AbstractFixture
{
    private const PASSWORD_HASH = '$2y$10$8v85e/G.uPGVZqHCozLU4e6ZzwvafrBCVYkq0RNc3EwX7yZgtZAIG';

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $customer = new Customer(
            new Name('Ruslan'),
            new Name('Alimamadov'),
            new PhoneNumber('89999999999'),
            new Email('alimamadov@mail.ru'),
            self::PASSWORD_HASH
        );
        $customer->createNewAccount();

        $manager->persist($customer);
        $manager->flush();
    }
}