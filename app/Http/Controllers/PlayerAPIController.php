<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlayerResource;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class PlayerAPIController extends Controller
{
    public function index(){
        $players = Player::all();
        return PlayerResource::collection($players);
    }

    public function show($id)
    {
        $players = Player::find($id);

        if($players == null){
            return response()->json('Player not found!');
        }

        return new PlayerResource($players);
    }

    public function create(Request $request)
    {
        $player = Player::create([
            'name' => $request->name,
            'country' => $request->country,
            'number' => $request->number,
            'image' => 'picture',
        ]);

        return response()->json(['message' => 'Successfully created player!', 'data' => $player, "created_by" => Auth::user()]);
    }

}
