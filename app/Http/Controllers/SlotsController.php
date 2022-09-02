<?php

namespace App\Http\Controllers;

use App\Http\Services\ParseJsonFileService;
use Illuminate\Http\JsonResponse;

class SlotsController extends Controller
{
    public function __construct(private ParseJsonFileService $parseJsonFileService)
    {}

    /**
     * Handle the request to the main service.
     */
    public function __invoke(): JsonResponse
    {
        $result = ($this->parseJsonFileService)();
        if(!$result){
            return response()->json(['error_message' => 'There is a problem'], 422);
        }else{
            return response()->json(['available_slots' => $result]);
        }
    }
}
