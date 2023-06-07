<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;
use Illuminate\Http\Request;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }

    public function index2()
    {
        return view('store');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validation = $request->validate([
           'name' => 'required',
           'club' => 'required',
           'number' => 'required',
        ]);

        $filename = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('/public/Player', $filename);


        Player::create([
            'name' => $request->name,
            'club' => $request->club,
            'number' => $request->number,
            'image' => $filename
        ]);
        return redirect('/home');
    }

    public function show()
    {
        $players = Player::all();
        $players = $players->reverse();
        return view('home', compact('players'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $player = Player::findOrFail($id);
        return view('update', compact('player'));
    }


    public function update(Request $request, $id)
    {
    $player = Player::find($id);

    $player->update([
        'name' => $request->name,
        'club' => $request->club,
        'number' => $request->number,
    ]);

    if ($request->hasFile('image')) {
        $filename = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('/public/Player', $filename);

        $player->update([
            'image' => $filename
        ]);
    }

    return redirect('/home');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $image = "/storage/Player/" . $player->image;
        $path = str_replace('\\', '/', public_path());
        unlink($path . $image);
        Player::destroy($id);
        return redirect('/home');
    }
}
