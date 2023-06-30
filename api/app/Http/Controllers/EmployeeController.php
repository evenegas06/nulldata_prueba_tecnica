<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Models\Skill;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class EmployeeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return new EmployeeCollection(Employee::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:employees',
            'position'  => 'required',
            'birthdate' => 'required|date_format:d/m/Y',
            'address'   => 'required',
            'skills'    => 'required'
        ]);

        $date = CarbonImmutable::create($request->birthdate);

        $employee = new Employee();
        $employee->name         = $request->name;
        $employee->email        = $request->email;
        $employee->position     = $request->position;
        $employee->birthdate    = $date->format('Y-m-d'); # the default format for date column in mysql is Y-m-d
        $employee->address      = $request->address;
        $employee->save();

        $skills = $request->skills;
        $new_skill = null;

        foreach ($skills as $skill) {
            $new_skill = Skill::where('name', $skill['name'])->first();

            if (is_null($new_skill)) {
                $new_skill = new Skill([
                    'name' => $skill['name']
                ]);

                $new_skill->save();
            }

            $employee->skills()->attach($new_skill->id, [
                'score' => $skill['score']
            ]);
        }

        return response()->json([
            'message'   => 'Register success.',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee) {
        return new EmployeeResource($employee);
    }
}
