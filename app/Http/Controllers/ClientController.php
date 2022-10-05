<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laravel\Passport\Http\Controllers\ClientController as ControllersClientController;
use Laravel\Passport\Passport;

class ClientController extends ControllersClientController
{
    public function index(Request $request)
    {
        $userId = $request->user()->getAuthIdentifier();
        $data = Client::where('user_id', $userId)->get();
        // dd($data);
        return view('clients.index', compact('data'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $this->validation->make($request->all(), [
            'name' => 'required|max:191',
            'redirect' => ['required', $this->redirectRule],
            'confidential' => 'boolean',
        ])->validate();

        $client = $this->clients->create(
            $request->user()->getAuthIdentifier(),
            $request->name,
            $request->redirect,
            null,
            false,
            false,
            (bool) $request->input('confidential', true)
        );

        if (Passport::$hashesClientSecrets) {
            return ['plainSecret' => $client->plainSecret] + $client->toArray();
        }

        return redirect()->route('client.index')->with('success', 'Berhasil menambah client oauth');
    }

    public function update(Request $request, $clientId)
    {
        $client = $this->clients->findForUser($clientId, $request->user()->getAuthIdentifier());

        if (!$client) {
            return new Response('', 404);
        }

        $this->validation->make($request->all(), [
            'name' => 'required|max:191',
            'redirect' => ['required', $this->redirectRule],
        ])->validate();

        $this->clients->update(
            $client,
            $request->name,
            $request->redirect
        );
    }
}
