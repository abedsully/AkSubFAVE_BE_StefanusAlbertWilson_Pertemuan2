<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class APIController extends Controller
{
    public function index(){
        $users = User::all();
        return UserResource::collection($users);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email is Required Dude!',
            'password.required' => 'Password is Required Dude!',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->email)->plainTextToken;
        return 'Thanks for logging in, Here is your token: ' . $token;
    }

    public function logout(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email is Required Dude!',
            'password.required' => 'Password is Required Dude!',
        ]);

        $user = User::where('email', $request->email)->first();

        $user->tokens()->delete();

        return response('Successfully logout and deleted token!');
    }

    public function show(){
        $players = Player::all();
        return PlayerResource::collection($players);
    }

    public function showId($id)
    {
        $players = Player::find($id);

        if($players == null){
            return response('Player not found!');
        }

        return new PlayerResource($players);
    }

    public function create(Request $req){
        $player = Player::create([
            'name' => $req->name,
            'country' => $req->country,
            'number' => $req->number,
            'image' => 'picture',
        ]);
        return response()->json(['message' => 'Successfully created Player!', 'data' => $player, "created_by" => Auth::user()]);
    }

    public function update($id, Request $req)
    {
        $player = Player::find($id);

        if($player == null){
            return response('Player not found!');
        }

        $player->update([
            'name' => $req->name,
            'country' => $req->country,
            'number' => $req->number,
            'image' => 'picture'
        ]);


        return response()->json(['message' => 'Successfully updated Player!', 'data' => $player, "updated_by" => Auth::user()]);
    }

    public function delete($id)
    {
        $player = Player::find($id);
        Player::destroy($id);

        if($player == null){
            return response('Player not found!');
        }

        return response()->json(["message" => "Successfully deleted Player!", "data" => $player, "created_by" => Auth::user()]);
    }
}
