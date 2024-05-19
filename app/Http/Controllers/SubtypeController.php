<?php

namespace App\Http\Controllers;

use App\Models\subtype;
use App\Http\Requests\StoresubtypeRequest;
use App\Http\Requests\UpdatesubtypeRequest;
use Illuminate\Http\Request;


class SubtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.preferences.subtypes.index',[
            // 'types' => Type::all(),
            'subtypes' => Subtype::where('user_id',auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.preferences.subtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // 'color' => 'required|max:255|unique:types',
            'icon' => 'required|max:255',
            // 'percentage' => 'numeric',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Subtype::create($validatedData);

        return redirect('/subtypes')->with('success','Data baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(subtype $subtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subtype $subtype)
    {
        return view('content.preferences.subtypes.edit',[
            'subtypes' => $subtype
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subtype $subtype)
    {
        $id = $request->route('id');

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'required|max:255'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Subtype::where('id', $subtype->id)->update($validatedData);

        return redirect('/subtypes')->with('warning','Data telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subtype $subtype)
    {
        Subtype::destroy($subtype->id);

        return redirect('/subtypes')->with('danger','Data telah dihapus!');
    }
}
