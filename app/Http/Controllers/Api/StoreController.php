<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\api\shared\Domain\StoreId;
use Src\api\Store\Application\Delete\StoreDelete;
use Src\api\Store\Application\Find\StoreFindAll;
use Src\api\Store\Application\Save\StoreSave;
use Src\api\Store\Domain\Name;
use Src\api\Store\Domain\Store;
use Src\api\Store\Infrastructure\EloquentStoreRepository;
use Src\api\UserApi\Application\Find\UserApiFindByToken;
use Src\api\UserApi\Domain\Token;
use Src\api\UserApi\Infrastructure\EloquentUserApiRepository;
use Src\shared\Domain\Exceptions\DomainError;
use function response;

class StoreController extends Controller
{
    public function save(Request $request): JsonResponse
    {

        try {
            $userApiFinder = new UserApiFindByToken(new EloquentUserApiRepository());
            $userApi = $userApiFinder(new Token($request->get('token')));

            $saver = new StoreSave(new EloquentStoreRepository(), $userApi);
            $saver(
                new Store(
                    new StoreId($request->get('id')),
                    new Name($request->get('name'))
                )
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Store saved correctly',
                'code' => '000',
                'result' => true,
            ]);
        } catch (DomainError $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'result' => false
            ]);
        }
    }

    public function getAll(Request $request): JsonResponse
    {
        try {
            $userApiFinder = new UserApiFindByToken(new EloquentUserApiRepository());
            $userApi = $userApiFinder(new Token($request->get('token')));

            $finder = new StoreFindAll(new EloquentStoreRepository(), $userApi);
            $stores = $finder();

            return response()->json([
                'status' => 'success',
                'message' => 'stores retrieved correctly',
                'code' => '000',
                'result' => $stores,
            ]);
        } catch (DomainError $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'result' => false
            ]);
        }
    }

    public function delete(Request $request): JsonResponse
    {
        try {
            $userApiFinder = new UserApiFindByToken(new EloquentUserApiRepository());
            $userApi = $userApiFinder(new Token($request->get('token')));

            $finder = new StoreDelete(new EloquentStoreRepository(), $userApi);
            $finder(new StoreId($request->get('id')));

            return response()->json([
                'status' => 'success',
                'message' => 'Store deleted correctly',
                'code' => '000',
                'result' => true,
            ]);
        } catch (DomainError $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'result' => false
            ]);
        }

    }

}
