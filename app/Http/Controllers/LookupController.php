<?php

namespace App\Http\Controllers;


use App\Services\CustomerService;
use Illuminate\Support\Str;

class LookupController extends Controller
{
    public function __invoke(CustomerService $service): \Illuminate\Http\JsonResponse
    {
        $code = Str::upper(request()->query('code'));
        $year = request()->query('year');

        $this->validate(request(), [
            'code' => 'required|min:4|max:7',
            'year' => 'required|numeric|min:1900|max:2100'
        ]);

        return response()->json(
            $service->lookup($code, $year)
        );
    }
}
