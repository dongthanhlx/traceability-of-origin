<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function getAll(int $pageSize = 10): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Customer::query()->paginate($pageSize);
    }

    public function getById(int $id) {
        return Customer::query()->findOrFail($id)->first();
    }

    public function lookup(string $code, int $year)
    {
        return Customer::query()->where('code', '=', $code)
            ->whereYear('birthday', '=', $year)
            ->first()
            ->makeHidden('id');
    }

    public function store(CustomerParams $params)
    {
        return Customer::query()->firstOrCreate([
            'code' => $params->code,
            'is_active' => $params->isActive,
            'patient' => $params->patient,
            'phone' => $params->phone,
            'doctor' => $params->doctor,
            'birthday' => $params->birthday,
            'dentistry' => $params->dentistry,
            'lab' => $params->lab,
            'type' => $params->type,
            'num_of_teeth' => $params->numOfTeeth,
            'locations' => $params->locations
        ]);
    }

    public function update(int $id, CustomerParams $params): bool
    {
        $customer = Customer::query()->findOrFail($id);

        $customer->code = $params->code;
        $customer->is_active = $params->isActive;
        $customer->patient = $params->patient;
        $customer->phone = $params->phone;
        $customer->doctor = $params->phone;
        $customer->dentistry = $params->dentistry;
        $customer->lab = $params->lab;
        $customer->type = $params->type;
        $customer->num_of_teeth = $params->numOfTeeth;
        $customer->locations = $params->locations;

        return $customer->save();
    }

    public function destroy(int $id): ?bool
    {
        $customer = Customer::query()->findOrFail($id)->first();

        return $customer->delete();
    }
}
