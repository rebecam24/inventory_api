<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Traits\ApiResponse;

class PaymentMethodController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all();

        return $this->success([
            'paymentMethods' => $paymentMethods,
        ],'List of payment methods');
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
            'type'  => ['required','string','min:3','max:45'],
        ]);

        $paymentMethod = PaymentMethod::create($data);

        return $this->success([
            'paymentMethod'  => $paymentMethod,
        ],'Registered payment method');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);

        return $this->success([
            'paymentMethod' => $paymentMethod,
        ],'Payment method details');
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
            'type'  => ['nullable','string','min:3','max:45'],
        ]);

        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->update($data);

        return $this->success([
            'paymentMethod'  => $paymentMethod,
        ],'Updated payment method');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->delete();

        return $this->success([],'payment method Remove ');
    }
}
