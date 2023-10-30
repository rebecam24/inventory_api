<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Traits\ApiResponse;
use App\Http\Resources\ProviderResource as ProviderCollection;

class ProviderController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();

        return $this->success([
            'providers' => ProviderCollection::collection($providers),
        ],'providers list');
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
            'name'          => ['required','string','min:3','max:45'],
            'lastname'      => ['required','string','min:3','max:45'],
            'id_number'     => ['required','string','min:3','max:45'],
            'address'       => ['required','string','min:10','max:100'],
            'phone'         => ['required','string','min:7','max:15'],
            'email'         => ['required','string','email'],
            'description'   => ['nullable','string','max:45'],
        ]);

        $provider = Provider::create($data);

        return $this->success([
            'provider'  => new ProviderCollection($provider),
        ],'Registered provider');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::findOrFail($id);

        return $this->success([
            'provider' => new ProviderCollection($provider),
        ],'provider details');
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
            'name'          => ['nullable','string','min:3','max:45'],
            'lastname'      => ['nullable','string','min:3','max:45'],
            'id_number'     => ['nullable','string','min:3','max:45'],
            'address'       => ['nullable','string','min:10','max:100'],
            'phone'         => ['nullable','string','min:7','max:15'],
            'email'         => ['nullable','string','email'],
            'description'   => ['nullable','string','max:45'],
        ]);

        $provider = Provider::findOrFail($id);
        $provider->update($data);

        return $this->success([
            'provider'  => new ProviderCollection($provider),
        ],'Updated provider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->delete();

        return $this->success([],'provider Deleted ');
    }
}
