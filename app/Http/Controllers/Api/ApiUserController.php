<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\api\UserApi\Application\Find\UserApiFindByToken;
use Src\api\UserApi\Domain\Token;
use Src\api\UserApi\Infrastructure\EloquentUserApiRepository;
use Src\shared\Domain\Exceptions\DomainError;

class ApiUserController extends Controller
{
    public function checkToken(Request $request)
    {
        try {
            $userApiFinder = new UserApiFindByToken(new EloquentUserApiRepository());
            $userApi = $userApiFinder(new Token($request->get('token')));

            return response()->json([
                'status' => 'success',
                'message' => 'Valid token',
                'code' => '000',
                'result' => $userApi,
            ]);
        } catch (DomainError $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid token',
                'code' => $e->getCode(),
                'result' => false,
            ]);
        }
    }
}
