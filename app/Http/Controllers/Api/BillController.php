<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\api\Bill\Application\Create\BillCreate;
use Src\api\Bill\Application\Find\BillFindAll;
use Src\api\Bill\Application\Find\BillFindByStore;
use Src\api\Bill\Domain\Bill;
use Src\api\Bill\Domain\BillId;
use Src\api\Bill\Domain\Value;
use Src\api\Bill\Infrastructure\EloquentBillRepository;
use Src\api\shared\Domain\StoreId;
use Src\api\UserApi\Application\Find\UserApiFindByToken;
use Src\api\UserApi\Domain\Token;
use Src\api\UserApi\Infrastructure\EloquentUserApiRepository;
use Src\shared\Domain\Exceptions\DomainError;
use function response;

class BillController extends Controller
{
    public function save(Request $request): JsonResponse
    {
        $id = $request->get('id');
        $storeId = $request->get('store_id');
        $value = $request->get('value');

        try {
            $userApiFinder = new UserApiFindByToken(new EloquentUserApiRepository());
            $userApi = $userApiFinder(new Token($request->get('token')));

            $saver = new BillCreate(new EloquentBillRepository(), $userApi);

            $saver(
                new Bill(
                    new BillId($id),
                    new StoreId($storeId),
                    new Value($value),
                )
            );

            return response()->json([
                'status' => 'success',
                'message' => 'bills retrieved correctly',
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

            $finder = new BillFindAll(new EloquentBillRepository(), $userApi);
            $bills = $finder();

            return response()->json([
                'status' => 'success',
                'message' => 'bills retrieved correctly',
                'code' => '000',
                'result' => $bills,
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

    public function getByStore(Request $request): JsonResponse
    {
        try {
            $userApiFinder = new UserApiFindByToken(new EloquentUserApiRepository());
            $userApi = $userApiFinder(new Token($request->get('token')));

            $finder = new BillFindByStore(new EloquentBillRepository(), $userApi);

            $bills = $finder(new StoreId($request->get('store_id')));

            return response()->json([
                'status' => 'success',
                'message' => 'bills retrieved correctly',
                'code' => '000',
                'result' => $bills,
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
