<?php

namespace App\Application\Actions\V1\Auth;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class Auth implements RequestHandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        // TODO: Implement handle() method.
    }
}