<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->first_name . ' ' . $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'street' => $this->street,
            'zip_code' => $this->zip_code,
            'ktp_number' => $this->ktp_number,
            'ktp_file' => $this->ktp_file != NULL ? env('APP_URL') . '/storage/images/' . $this->ktp_file : NULL,
            'position' => $this->positions->name,
            'bank' => $this->banks->name,
            'account_number' => $this->account_number,
        ];
    }
}
