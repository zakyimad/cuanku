<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Mutation;
use Illuminate\Http\Request;
// use App\Http\Requests\StoremutationRequest;
// use App\Http\Requests\UpdatemutationRequest;

class MutationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.mutations.index',[
            'mutations' => Mutation::where('user_id',auth()->user()->id)
            ->orderBy('date','desc')
            ->orderBy('created_at','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.mutations.create',[
            'cards' => Card::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'title' => 'required|max:255',
            'amount' => 'required|numeric',
            'from_id' => 'required',
            'to_id' => 'required',
            // 'invoice' => 'required',
            'description' => 'max:255',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Mutation::create($validatedData);

        return redirect('/mutations')->with('success','Data baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mutation $mutation)
    {
        return view('content.mutations.show', [
            'mutations' => $mutation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mutation $mutation)
    {
        return view('content.mutauions.edit', [
            'mutations' => $mutation,
            'cards' => Card::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mutation $mutation)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'title' => 'required|max:255',
            'amount' => 'required|numeric',
            'from_id' => 'required',
            'to_id' => 'required',
            'description' => 'max:255',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Income::where('id', $income->id)->update($validatedData);

        return redirect('/mutations')->with('warning','Data telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mutation $mutation)
    {
        Mutation::destroy($mutation->id);

        return redirect('/mutations')->with('danger','Data telah dihapus!');
    }
}
