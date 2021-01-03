<?php

declare(strict_types=1);

namespace App\Domain\Services;

interface Flusher
{
    public function flush();
}