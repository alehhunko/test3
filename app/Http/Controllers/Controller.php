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
        $user = User::all();
        return $user;
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
}
