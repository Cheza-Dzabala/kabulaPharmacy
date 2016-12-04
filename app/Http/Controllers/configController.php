<?php

namespace App\Http\Controllers;


use App\Classes\departmentClass;
use App\Classes\genericNamesClass;
use App\Classes\rolesClass;
use App\Classes\stockTypesClass;
use App\Classes\TaxClass;
use App\taxProfiles;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class configController extends Controller
{
    //
    /**
     * @var taxProfiles
     */
    private $taxProfiles;

    /**
     * configController constructor.
     * @param taxProfiles $taxProfiles
     */
    public function __construct(taxProfiles $taxProfiles)
    {
        $this->taxProfiles = $taxProfiles;
    }

    public function index()
    {
        return view('config.index');
    }

    //Stock Configurations

    //Departments

    public function stockDepartmentIndex()
    {
        $departmentClass = new departmentClass();
        $departments =$departmentClass->getStockDepartments();
        return view('config.stock.department', compact('departments'));
    }

    public function saveStockDepartment(Requests\stockDepartments $request)
    {
        $stockDepartment = new departmentClass();

        $dpt = $stockDepartment->saveStockDepartment($request);

        return $dpt;

    }

    //Taxation Configurations

    public function stockTaxIndex()
    {
        $taxProfiles = new TaxClass();
        $profiles = $taxProfiles->getTaxProfiles();
        return view('config.stock.tax', compact('profiles'));
    }

    public function saveTaxProfile(Requests\taxProfiles $request)
    {
        $taxProfile = new TaxClass();
        $newProfile = $taxProfile->saveProfile($request);
        return $newProfile;
    }

    //Generic Names Configurations

    public function genericNamesIndex()
    {
        $genericNamesClass = new genericNamesClass();
        $genericNames = $genericNamesClass->getGenericNames();
        return view('config.stock.genericNames', compact('genericNames'));
    }

    public function saveGenericName(Requests\genericNamesRequest $request)
    {
        $genericNamesClass = new genericNamesClass();
        $newGenericName = $genericNamesClass->saveGenericName($request);
        return $newGenericName;
    }

    public function stockTypesIndex()
    {
        $stockTypeClass = new stockTypesClass();
        $stockTypes = $stockTypeClass->getStockTypes();
        return view('config.stock.stockTypes', compact('stockTypes'));
    }


    public function saveStockTypes(Requests\stockTypesRequest $request)
    {
        $stockTypeClass = new stockTypesClass();
        $stockTypes = $stockTypeClass->saveStockTypes($request);
        return view('config.stock.stockTypes', compact('stockTypes'));
    }

    //Roles And Permissions

    public function rolesIndex()
    {
        $rolesClass = new rolesClass();
        $index = $rolesClass->rolesIndex();
        return $index;
    }

    public function rolesAttachPermissions($roleName)
    {
        $roleClass = new rolesClass();
        $attachPage = $roleClass->rolesAttachPermissions($roleName);
        return $attachPage;
    }

    public function rolesSaveAttachment(Request $request)
    {
        $roleClass = new rolesClass();
        $attachRoles = $roleClass->rolesSaveAttachment($request);
        return $attachRoles;
    }

    public function newRoles(Request $request)
    {
        $roleClass = new rolesClass();
        $newRole = $roleClass->newRoles($request);
        return $newRole;
    }

}
