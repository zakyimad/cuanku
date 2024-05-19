<?php

namespace App\Http\Controllers;

use App\Models\card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.finances.index',[
            'cards' => Card::where('user_id',auth()->user()->id)->get(),
            // 'cards' => Card::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.finances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'amount' => 'required|numeric',
            'icon' => 'max:255',
            'color' => 'max:255',
            'description' => 'max:255',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Card::create($validatedData);

        return redirect('/cards')->with('success','Data baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(card $card)
    {
        return view('content.finances.show', [
            'cards' => $card
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(card $card)
    {
        return view('content.finances.edit', [
            'cards' => $card
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, card $card)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'amount' => 'required|numeric',
            'icon' => 'max:255',
            'color' => 'max:255',
            'description' => 'max:255',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Card::where('id', $card->id)->update($validatedData);

        return redirect('/cards')->with('warning','Data telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(card $card)
    {
        Card::destroy($card->id);

        return redirect('/cards')->with('danger','Data telah dihapus!');
    }
}
