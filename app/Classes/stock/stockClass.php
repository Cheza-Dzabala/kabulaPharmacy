<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 8/24/16
 * Time: 6:04 PM
 */

namespace App\Classes\stock;

use App\Classes\departmentClass;
use App\Classes\genericNamesClass;
use App\Classes\orders\orderClass;
use App\Classes\stockTypesClass;
use App\Classes\TaxClass;
use App\genericNames;
use App\Http\Requests\newStockRequest;
use App\stock;
use App\stockDetails;
use App\stockTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class stockClass {

    public function newStockDependencies()
    {
        $taxClass = new TaxClass();
        $departmentClass = new departmentClass();
        $orderClass = new orderClass();
        $genericNameClass = new genericNamesClass();
        $stockTypeClass = new stockTypesClass();

        $taxProfiles = $taxClass->getTaxProfiles();
        $departments = $departmentClass->getStockDepartments();
        $orders = $orderClass->getOrders('active');
        $genericNames = $genericNameClass->getGenericNames();
        $stockTypes = $stockTypeClass->getStockTypes();

        return array($taxProfiles, $departments, $orders, $genericNames, $stockTypes);
    }


    public function saveNewStock(newStockRequest $request)
    {
        $stock = $this->createStock($request);
        $stockId = $stock['id'];
        //Create The Stock & Update The Current Stock Level
        $currentLevel = $stock->currentLevel += $request['quantity'];
        $stock->currentLevel = $currentLevel;
        $stock->save();

       stockDetails::create([
            'orderId' => $request['orderId'],
            'stockId' => $stockId,
            'expiry_date' => $request['expiry_date'],
            'quantity' => $request['quantity'],
            'purchaseCost' => $request['purchaseCost'],
            'markup' => $request['markup'],
            'batchNumber' => $request['batchNumber'],
        ]);

        $request->session()->flash('success', 'Successfully saved Stock.');
        return redirect()->route('stock');
    }

    public function get_stock()
    {
        $stock = stock::get()->toArray();

        foreach ($stock as $key => $value)
        {
            $genericName = genericNames::whereId($value['genericName'])->get()->first()->toArray();
            $stock[$key] = array_add($stock[$key], 'actualGenericName', $genericName['name']);

            $stockType = stockTypes::whereId($value['type'])->get()->first()->toArray();
            $stock[$key] = array_add($stock[$key], 'stockType', $stockType['name']);
        }
        return $stock;
    }

    /**
     * @param newStockRequest $request
     * @return static
     */
    private function createStock(newStockRequest $request)
    {

        $stock = stock::create([
            'genericName' => $request['genericName'],
            'brandName' => $request['brandName'],
            'type' => $request['type'],
            'strength' => $request['strength'],
            'departmentId' => $request['departmentId'],
            'taxProfile1' => $request['taxProfile1'],
            'taxProfile2' => $request['taxProfile2'],
            'reorderLevel' => $request['reorderLevel'],
        ]);
        return $stock;
    }

    public function updateStockItem(Request $request, $id)
    {


        $stockItem = stock::whereId($id)->first();

        $stockItem->genericName = $request['genericName'];
        $stockItem->brandName = $request['brandName'];
        $stockItem->type = $request['type'];
        $stockItem->batchNumber = $request['batchNumber'];
        $stockItem->strength = $request['strength'];
        $stockItem->departmentId = $request['departmentId'];
        $stockItem->purchaseCost = $request['purchaseCost'];
        $stockItem->departmentId = $request['departmentId'];
        $stockItem->markup = $request['markup'];
        $stockItem->taxProfile1 = $request['taxProfile1'];
        $stockItem->taxProfile2 = $request['taxProfile2'];
        $stockItem->save();

        return redirect()->route('stock');
    }

}