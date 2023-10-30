<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clients;
use App\Traits\ApiResponse;

class ClientController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::all();

        return $this->success([
            'clients' => $clients,
        ],'clients list');
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
        ]);

        $client = Clients::create($data);

        return $this->success([
            'client'  => $client,
        ],'Registered client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Clients::findOrFail($id);

        return $this->success([
            'client' => $client,
        ],'client details');
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
        ]);

        $client = Clients::findOrFail($id);
        $client->update($data);

        return $this->success([
            'client'  => $client,
        ],'Updated client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Clients::find($id);
        $client->delete();

        return $this->success([],'client Deleted ');
    }
}
