<?php
declare(strict_types=1);

namespace App\Domain\Customer;

use App\Domain\DomainException\DomainException;

final class CustomerAlreadyExistsException extends DomainException
{

}