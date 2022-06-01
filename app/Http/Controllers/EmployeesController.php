<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeesRequest;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        // Upload File
        if ($request->file('ktp_file')) {
            Storage::putFileAs("images", $request->file('ktp_file'), $request->file('ktp_file')->getClientOriginalName());
            $data['ktp_file'] = $request->file('ktp_file')->getClientOriginalName() . '.' . $request->file('ktp_file')->getClientOriginalExtension();
        }

        Employees::create($data);

        return response()->json([
            "message" => "store employee has been successfully"
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int
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
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employees)
    {
        //
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
