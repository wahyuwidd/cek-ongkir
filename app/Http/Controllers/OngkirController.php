<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RajaOngkirService; 

class OngkirController extends Controller
{
    protected $rajaOngkirService;

    public function __construct(RajaOngkirService $rajaOngkirService)
    {
        $this->rajaOngkirService = $rajaOngkirService;
    }
    public function index()
    {
        $provinces = $this->rajaOngkirService->getProvinces();
        $cities = $this->rajaOngkirService->getCities(null);
        return view('ongkir.index', compact('provinces', 'cities'));
    }

    public function getCities(Request $request)
    {
        $cities = $this->rajaOngkirService->getCities($request->province_id);
        return response()->json($cities);
    }

    public function checkOngkir(Request $request)
    {
    $origin = $request->origin;
    $destination = $request->destination;
    $weight = $request->weight;
    $courier = $request->courier;

    $cost = $this->rajaOngkirService->checkOngkir($origin, $destination, $weight, $courier);

    return view('ongkir.result', compact('cost'));
    }
}
