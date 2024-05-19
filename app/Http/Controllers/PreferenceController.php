<?php

namespace App\Http\Controllers;

use App\Models\type;
use App\Models\subtype;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function index()
    {
        return view('content.preferences.types.index',[
            'types' => Type::where('user_id',auth()->user()->id),
        ]);
    }
}
