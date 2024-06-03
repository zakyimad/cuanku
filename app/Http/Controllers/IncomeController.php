<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Source;
use App\Models\Card;
use Illuminate\Http\Request;
use Carbon\Carbon;
// use App\Http\Requests\StoreincomeRequest;
// use App\Http\Requests\UpdateincomeRequest;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.incomes.index',[
            'incomes' => Income::where('user_id',auth()->user()->id)
            ->orderBy('date','desc')
            ->orderBy('created_at','desc')->get(),

            // // Get the current date
            $currentDate = Carbon::now()->toDateString(),

            // // Get the start and end of the current week
            $startOfWeek = Carbon::now()->startOfWeek()->toDateString(),
            $endOfWeek = Carbon::now()->endOfWeek()->toDateString(),

            // // Get the start and end of the current month
            $startOfMonth = Carbon::now()->startOfMonth()->toDateString(),
            $endOfMonth = Carbon::now()->endOfMonth()->toDateString(),

            // // Get the start and end of the current year
            $startOfYear = Carbon::now()->startOfYear()->toDateString(),
            $endOfYear = Carbon::now()->endOfYear()->toDateString(),

            // // Retrieve the total amount for transactions on the current day
            "Today" => Income::whereDate('date', $currentDate)->sum('amount'),

            // // Retrieve the total amount for transactions within the current week
            "ThisWeek" => Income::whereBetween('date', [$startOfWeek, $endOfWeek])->sum('amount'),

            // // Retrieve the total amount for transactions within the current month
            "ThisMonth" => Income::whereBetween('date', [$startOfMonth, $endOfMonth])->sum('amount'),

            // // Retrieve the total amount for transactions within the current year
            "ThisYear" => Income::whereBetween('date', [$startOfYear, $endOfYear])->sum('amount'),
        ]);
      }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.incomes.create',[
            'sources' => Source::where('user_id',auth()->user()->id)->get(),
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
            'source_id' => 'required',
            'card_id' => 'required',
            // 'invoice' => 'required',
            'description' => 'max:255',
            'image' => 'image|file|max:5120'
        ]);

        // if($request->file('image')){
        //     $validatedData['image'] = $request->file('image')->store('expense-images');
        // }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['invoice'] = '1';

        Income::create($validatedData);

        // Change Amount in Cards
        $dummy= Card::where('user_id',auth()->user()->id)->where('id',$validatedData['card_id'])->pluck('amount')->first() + $validatedData['amount'];
        Card::where('user_id',auth()->user()->id)->where('id',$validatedData['card_id'])->update(['amount' => $dummy]);

        return redirect('/incomes')->with('success','Data baru telah ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Income $expense)
    {
        return view('content.incomes.show', [
            'incomes' => $income
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        return view('content.incomes.edit', [
            'incomes' => $income,
            'sources' => Source::where('user_id',auth()->user()->id)->get(),
            'cards' => Card::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'title' => 'required|max:255',
            'amount' => 'required|numeric',
            'source_id' => 'required',
            'card_id' => 'required',
            // 'invoice' => 'required',
            'description' => 'max:255',
            'image' => 'image|file|max:5120'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('income-images');
        }

        Income::where('id', $income->id)->update($validatedData);

        // Change Amount in Cards

        if($income->card_id <> $validatedData['card_id']){
            $dummy1 = Card::where('user_id',auth()->user()->id)->where('id',$income['card_id'])->pluck('amount')->first() - $validatedData['amount'];
            Card::where('user_id',auth()->user()->id)->where('id',$income['card_id'])->update(['amount' => $dummy1]);

            $dummy2 = Card::where('user_id',auth()->user()->id)->where('id',$validatedData['card_id'])->pluck('amount')->first() + $validatedData['amount'];
            Card::where('user_id',auth()->user()->id)->where('id',$validatedData['card_id'])->update(['amount' => $dummy2]);
        }

        if($income->amount <> $validatedData['amount']){
            $dummy1 = $income->amount - $validatedData['amount'];
            $dummy2 = Card::where('user_id',auth()->user()->id)->where('id',$validatedData['card_id'])->pluck('amount')->first() - $dummy1;
            Card::where('user_id',auth()->user()->id)->where('id',$income['card_id'])->update(['amount' => $dummy2]);
        }

        return redirect('/incomes')->with('warning','Data telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        if($income->image) {
            Storage::delete($income->image);
        }

        Income::destroy($income->id);

        return redirect('/incomes')->with('danger','Data telah dihapus!');
    }
}
