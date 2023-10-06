<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      title="My Doc API",
 *      version="1.0.0",
 * ),
 * 
 * @OA\PathItem(
 *      path="/api/",
 * ),
 * 
 * @OA\Post(
 *      path="/api/v1/notebook",
 *      summary="Add new user",
 *      tags={"Notebook"},
 * 
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="name", type="string", example="Jan"),
 *                      @OA\Property(property="company", type="string", example="JanCo"),
 *                      @OA\Property(property="phone", type="unsignedBigInteger", example="55555555"),
 *                      @OA\Property(property="email", type="string", example="jan@mail"),
 *                      @OA\Property(property="birth_date", type="date", example="2021-06-09"),
 *                      @OA\Property(property="foto", type="string", example="link"),
 *                  ),
 *              },
 *          ),
 *      ),
 * 
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="id", type="igInteger", example="1"),
 *              @OA\Property(property="name", type="string", example="Jan"),
 *              @OA\Property(property="company", type="string", example="JanCo"),
 *              @OA\Property(property="phone", type="unsignedBigInteger", example="55555555"),
 *              @OA\Property(property="email", type="string", example="jan@mail"),
 *              @OA\Property(property="birth_date", type="date", example="2021-06-09"),
 *              @OA\Property(property="foto", type="string", example="link"),
 *              @OA\Property(property="updated_at", type="date", example="2023-10-05T12:52:12.000000Z"),
 *              @OA\Property(property="created_at", type="date", example="2023-10-05T12:52:12.000000Z"),
 *          ),
 *      ),
 * ),
 * 
 * @OA\Get(
 *      path="/api/v1/notebook",
 *      summary="All users",
 *      tags={"Notebook"},
 * 
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(type="array",
 *                  @OA\Items(type="object",
 *                      @OA\Property(property="id", type="igInteger", example="1"),
 *                      @OA\Property(property="name", type="string", example="Jan"),
 *                      @OA\Property(property="company", type="string", example="JanCo"),
 *                      @OA\Property(property="phone", type="unsignedBigInteger", example="55555555"),
 *                      @OA\Property(property="email", type="string", example="jan@mail"),
 *                      @OA\Property(property="birth_date", type="date", example="2021-06-09"),
 *                      @OA\Property(property="foto", type="string", example="link"),
 *                      @OA\Property(property="updated_at", type="date", example="2023-10-05T12:52:12.000000Z"),
 *                      @OA\Property(property="created_at", type="date", example="2023-10-05T12:52:12.000000Z"),
 *                  ),
 *          ),
 *      ),
 * ),
 * 
 * @OA\Get(
 *      path="/api/v1/notebook/{id}",
 *      summary="User by id",
 *      tags={"Notebook"},
 * 
 *      @OA\Parameter(
 *          description="User ID",
 *          in="path",
 *          name="id",
 *          required=true,
 *          example=1
 *      ),
 * 
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="id", type="igInteger", example="1"),
 *              @OA\Property(property="name", type="string", example="Jan"),
 *              @OA\Property(property="company", type="string", example="JanCo"),
 *              @OA\Property(property="phone", type="unsignedBigInteger", example="55555555"),
 *              @OA\Property(property="email", type="string", example="jan@mail"),
 *              @OA\Property(property="birth_date", type="date", example="2021-06-09"),
 *              @OA\Property(property="foto", type="string", example="link"),
 *              @OA\Property(property="updated_at", type="date", example="2023-10-05T12:52:12.000000Z"),
 *              @OA\Property(property="created_at", type="date", example="2023-10-05T12:52:12.000000Z"),
 *          ),
 *      ),
 * ),
 * 
 * @OA\Patch(
 *      path="/api/v1/notebook/{id}",
 *      summary="Update user",
 *      tags={"Notebook"},
 * 
 *      @OA\Parameter(
 *          description="Update user",
 *          in="path",
 *          name="id",
 *          required=true,
 *          example=1
 *      ),
 *
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="name", type="string", example="Jan"),
 *                      @OA\Property(property="company", type="string", example="JanCo"),
 *                      @OA\Property(property="phone", type="unsignedBigInteger", example="55555555"),
 *                      @OA\Property(property="email", type="string", example="jan@mail"),
 *                      @OA\Property(property="birth_date", type="date", example="2021-06-09"),
 *                      @OA\Property(property="foto", type="string", example="link"),
 *                  ),
 *              },
 *          ),
 *      ),
 *  
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="id", type="igInteger", example="1"),
 *              @OA\Property(property="name", type="string", example="Jan"),
 *              @OA\Property(property="company", type="string", example="JanCo"),
 *              @OA\Property(property="phone", type="unsignedBigInteger", example="55555555"),
 *              @OA\Property(property="email", type="string", example="jan@mail"),
 *              @OA\Property(property="birth_date", type="date", example="2021-06-09"),
 *              @OA\Property(property="foto", type="string", example="link"),
 *              @OA\Property(property="updated_at", type="date", example="2023-11-05T12:52:12.000000Z"),
 *              @OA\Property(property="created_at", type="date", example="2023-10-05T12:52:12.000000Z"),
 *          ),
 *      ),
 * ),
 * 
 * @OA\Delete(
 *      path="/api/v1/notebook/{id}",
 *      summary="Delete user",
 *      tags={"Notebook"},
 * 
 *      @OA\Parameter(
 *          description="Delete user",
 *          in="path",
 *          name="id",
 *          required=true,
 *          example=1
 *      ),
 * 
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="delete"),
 *          ),
 *      ),
 * ),
 */

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
        return response()->json([
            'message'=> 'delete',
        ]);
    }

    public function id_client($id)
    {
        $user = User::find($id);
        return $user;
    }
}
