<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEmployeesRequest;
use App\Http\Requests\UpdateEmployeesRequest;
use Symfony\Component\HttpFoundation\Response;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Employees::paginate(10);
        return $collections;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeesRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $file = $request->file('ktp_file');

        // Upload File
        if ($file) {
            Storage::putFileAs("images", $file, $file->getClientOriginalName());
            $data['ktp_file'] = $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
        }

        Employees::create($data);

        return response()->json([
            "message" => "store employee has been successfully"
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resource = Employees::findOrFail($id);
        return $resource;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeesRequest $request, $id)
    {
        $resource = Employees::findOrFail($id);

        $data = $request->only(array_keys($request->rules()));
        $file = $request->file('ktp_file');

        $resource->first_name = $data['first_name'];
        $resource->last_name = $data['last_name'];
        $resource->date_of_birth = $data['date_of_birth'];
        $resource->phone_number = $data['phone_number'];
        $resource->email = $data['email'];
        $resource->province_id = $data['province_id'];
        $resource->city_id = $data['city_id'];
        $resource->street = $data['street'];
        $resource->zip_code = $data['zip_code'];
        $resource->ktp_number = $data['ktp_number'];
        $resource->account_number = $data['account_number'];

        if (isset($data['position_id'])) {
            $resource->position_id = $data['position_id'];
        }

        if (isset($data['bank_id'])) {
            $resource->bank_id = $data['bank_id'];
        }

        // Upload File
        if ($file) {
            Storage::putFileAs("images", $file, $file->getClientOriginalName());
            $imageFileName = $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $resource->ktp_file = $imageFileName;
        }

        $resource->save();

        return response()->json([
            "message" => "update employee has been successfully"
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = Employees::findOrFail($id);
        $resource->delete();
    }
}
