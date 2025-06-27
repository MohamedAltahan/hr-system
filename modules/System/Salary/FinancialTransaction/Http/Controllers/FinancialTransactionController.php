<?php

namespace Modules\System\Salary\FinancialTransaction\Http\Controllers;

use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Http\Controllers\ApiController;
use Modules\Common\Traits\ApiResponse;
use Modules\System\Salary\FinancialTransaction\Http\Requests\FinancialTransactionRequest;
use Modules\System\Salary\FinancialTransaction\Http\Resources\FinancialTransactionResource;
use Modules\System\Salary\FinancialTransaction\Models\FinancialTransaction;
use Modules\System\Salary\FinancialTransaction\Services\FinancialTransactionService;

class FinancialTransactionController extends ApiController
{
    use ApiResponse;

    public static ?string $model = FinancialTransaction::class;

    public function __construct(protected FinancialTransactionService $service)
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->service->getPaginatedData($this->perPage);

        return $this->sendResponse(
            FinancialTransactionResource::paginate($data),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function store(FinancialTransactionRequest $request)
    {
        $data = $this->service->create($request);

        return $this->sendResponse(
            FinancialTransactionResource::make($data),
            __('Data created successfully'),
            StatusCodeEnum::Created_successfully->value
        );
    }

    public function show(FinancialTransaction $FinancialTransaction)
    {
        return $this->sendResponse(
            FinancialTransactionResource::make($FinancialTransaction),
            __('Data fetched successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function update(FinancialTransactionRequest $request, int $id)
    {
        $data = $this->service->update($request, $id);

        return $this->sendResponse(
            FinancialTransactionResource::make($data),
            __('Data updated successfully'),
            StatusCodeEnum::Success->value
        );
    }

    public function destroy(int $id)
    {
        $deleteStatus = $this->service->destroy($id);

        if (! $deleteStatus) {
            return $this->sendResponse(
                [],
                __('Data not deleted because it is in use'),
                StatusCodeEnum::CONFlICT->value
            );
        }

        return $this->sendResponse(
            [],
            __('Data deleted successfully'),
            StatusCodeEnum::Success->value
        );
    }
}
