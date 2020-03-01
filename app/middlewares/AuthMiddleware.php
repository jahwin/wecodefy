<?php
namespace app\middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AuthMiddleware implements IMiddleware
{

    public function handle(Request $request): void
    {
        $user = "User";
        // If authentication failed, redirect request to 404 page.
        if ( $user === null) {
            responce("",404);
        }

    }

}