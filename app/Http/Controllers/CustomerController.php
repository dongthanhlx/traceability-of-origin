<?php

namespace App\Http\Controllers;

use App\Services\CustomerParams;
use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(CustomerService $service): JsonResponse
    {
        $pageSize = request()->query('pageSize', 10);

        return response()->json($service->getAll($pageSize));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(CustomerService $service): JsonResponse
    {
        $this->validate(request(), [
            'code' => 'required|unique:customers',
            'is_active' => 'nullable|date',
            'patient' => 'required|string',
            'phone' => 'required|numeric',
            'doctor' => 'required|string',
            'birthday' => 'required|date',
            'dentistry' => 'required',
            'lab' => 'required',
            'type' => 'required',
            'num_of_teeth' => 'required',
            'locations' => 'required'
        ]);

        $record = $service->store(
            new CustomerParams(
                code: Str::upper(request('code')),
                isActive: request('is_active'),
                patient: Str::upper(request('patient')),
                phone: request('phone'),
                doctor: Str::upper(request()->get('doctor')),
                birthday: request()->get('birthday'),
                dentistry: Str::upper(request()->get('dentistry')),
                lab: Str::upper(request()->get('lab')),
                type: Str::upper(request()->get('type')),
                numOfTeeth: request()->get('num_of_teeth'),
                locations: request()->get('locations')
            )
        );

        return response()->json($record);
    }

    public function show(int $id, CustomerService $service): JsonResponse
    {
        return response()->json(
            $service->getById($id)
        );
    }

    public function update(int $id , CustomerService $service): JsonResponse
    {
        $this->validate(request(), [
            'code' => 'required|unique:customers',
            'is_active' => 'required|date',
            'patient' => 'required|string',
            'phone' => 'required|numeric',
            'doctor' => 'required|string',
            'birthday' => 'required|date',
            'dentistry' => 'required',
            'lab' => 'required',
            'type' => 'required',
            'num_of_teeth' => 'required',
            'locations' => 'required'
        ]);

        $record = $service->update($id, new CustomerParams(
            code: Str::upper(request()->get('code')),
            isActive: request()->get('is_active'),
            patient: Str::upper(request()->get('patient')),
            phone: request()->get('phone'),
            doctor: Str::upper(request()->get('doctor')),
            birthday: request()->get('birthday'),
            dentistry: Str::upper(request()->get('dentistry')),
            lab: Str::upper(request()->get('lab')),
            type: Str::upper(request()->get('type')),
            numOfTeeth: request()->get('num_of_teeth'),
            locations: request()->get('locations')
        ));

        return response()->json($record);
    }

    public function destroy(int $id, CustomerService $service): JsonResponse
    {
        return response()->json(
            $service->destroy($id)
        );
    }
}
