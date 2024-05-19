<?php

namespace App\Http\Controllers;

use App\Models\source;
// use App\Http\Requests\StoresourceRequest;
// use App\Http\Requests\UpdatesourceRequest;
use Illuminate\Http\Request;


class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.preferences.sources.index',[
            'sources' => Source::where('user_id',auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.preferences.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'required|max:255',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Subtype::create($validatedData);

        return redirect('/subtypes')->with('success','Data baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(source $source)
    {
        return view('content.preferences.sources.edit',[
            'sources' => $source
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, source $source)
    {
        $id = $request->route('id');

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'required|max:255'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Source::where('id', $subtype->id)->update($validatedData);

        return redirect('/sources')->with('warning','Data telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(source $source)
    {
        Source::destroy($source->id);

        return redirect('/sources')->with('danger','Data telah dihapus!');
    }
}
