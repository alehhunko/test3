<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function all_client()
    {
        $users = User::all();
        return $users;
    }

    public function add_client(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:1000',
            'company' => 'nullable|string|max:1000',
            'phone' => 'integer',
            'email' => 'nullable|string|max:1000',
            'birth_date' => 'date',
            'foto' => 'nullable|string|max:1000',
        ]);
        $client = User::create($data);
        return $client;
    }

    public function edit_client(Request $request, User $id)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:1000',
            'company' => 'nullable|string|max:1000',
            'phone' => 'integer',
            'email' => 'nullable|string|max:1000',
            'birth_date' => 'date',
            'foto' => 'nullable|string|max:1000',
        ]);
        $client = $id->update($data);
        return $client;
    }

    public function delete_client(User $id)
    {
        $id->delete();
        return response([]);
    }

    public function id_client($id)
    {
        $user = User::find($id);
        return $user;
    }
}
