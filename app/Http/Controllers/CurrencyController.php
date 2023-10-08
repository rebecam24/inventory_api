<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
use App\Traits\ApiResponse;

class CurrencyController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::all();

        return $this->success([
            'currencies' => $currencies,
        ],'List of currencies');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => ['required','string','min:3','max:45'],
            'rate'  => ['required','numeric'],
        ]);

        $currency = Currency::create($data);

        return $this->success([
            'currency'  => $currency,
        ],'Registered Currency');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currency = Currency::findOrFail($id);

        return $this->success([
            'currency' => $currency,
        ],'Currency details');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'  => ['nullable','string','min:3','max:45'],
            'rate'  => ['nullable','numeric'],
        ]);

        $currency = Currency::findOrFail($id);
        $currency->update($data);

        return $this->success([
            'currency'  => $currency,
        ],'Updated currency');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = Currency::find($id);
        $currency->delete();

        return $this->success([],'Currency Remove ');
    }
}
