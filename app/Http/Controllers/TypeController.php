<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Subtype;
use App\Http\Requests\StoretypeRequest;
use App\Http\Requests\UpdatetypeRequest;
use Illuminate\Http\Request;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.preferences.types.index',[
            'types' => Type::where('user_id',auth()->user()->id)->get(),
            // 'subtypes' => Subtype::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.preferences.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretypeRequest $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'color' => 'required|max:255',
            'icon' => 'required|max:255',
            'percentage' => 'numeric',
        ]);

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['payment_id'] = '1';

        unset($validatedData['color2']);
        unset($validatedData['is_user']);

        if($request['is_user'] == "true") {
            $validatedData['color'] = $request['color2'];
        };

        $validatedData['user_id'] = auth()->user()->id;

        Type::create($validatedData);

        return redirect('/types')->with('success','Data baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('content.preferences.types.edit',[
            'types' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        // dd($request);
        $id = $request->route('id');

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'color' => 'max:255',
            'icon' => 'required',
            'percentage' => 'numeric',
        ]);

        unset($validatedData['color2']);
        unset($validatedData['is_user']);

        if($request['is_user'] == "true") {
            $validatedData['color'] = $request['color2'];
        };

        Type::where('id', $type->id)->update($validatedData);

        return redirect('/types')->with('warning','Data telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        Type::destroy($type->id);

        return redirect('/types')->with('danger','Data telah dihapus!');
    }
}
