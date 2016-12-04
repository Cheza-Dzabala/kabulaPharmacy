<?php
namespace App\Classes;


use App\stockDepartments;
use App\User;
use Illuminate\Support\Facades\Auth;

class departmentClass {

    public function getStockDepartments()
    {
        $departments = stockDepartments::get()->toArray();
        foreach ($departments as $key => $value) {
            $user = User::whereId($value['createdBy'])->get()->first();
            $departments[$key] = array_add($departments[$key], 'user', $user['name']);
        }
        return $departments;
    }

    public function saveStockDepartment (\App\Http\Requests\stockDepartments $request){
        stockDepartments::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'departmentLabel' => $request['departmentLabel'],
            'createdBy' => Auth::user()['id']
        ]);

        $request->session()->flash('success', 'Successfully saved Department.');
        return redirect()->route('stock-dpt-config');
    }
}