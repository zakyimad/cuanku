<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Type;
use App\Models\Subtype;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination;
use Carbon\Carbon;
// use App\Http\Requests\StoreexpenseRequest;
// use App\Http\Requests\UpdateexpenseRequest;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.expenses.index',[
            'expenses' => Expense::where('user_id',auth()->user()->id)
            ->orderBy('date','desc')
            ->orderBy('created_at','desc')->get(),

            // Get the current date
            $currentDate = Carbon::now()->toDateString(),

            // Get the start and end of the current week
            $startOfWeek = Carbon::now()->startOfWeek()->toDateString(),
            $endOfWeek = Carbon::now()->endOfWeek()->toDateString(),

            // Get the start and end of the current month
            $startOfMonth = Carbon::now()->startOfMonth()->toDateString(),
            $endOfMonth = Carbon::now()->endOfMonth()->toDateString(),

            // Get the start and end of the current year
            $startOfYear = Carbon::now()->startOfYear()->toDateString(),
            $endOfYear = Carbon::now()->endOfYear()->toDateString(),

            // Retrieve the total amount for transactions on the current day
            "Today" => Expense::whereDate('date', $currentDate)
                                ->where('user_id',auth()->user()->id)
                                ->sum('amount'),

            // Retrieve the total amount for transactions within the current week
            "ThisWeek" => Expense::whereBetween('date', [$startOfWeek, $endOfWeek])
                                ->where('user_id',auth()->user()->id)
                                ->sum('amount'),

            // Retrieve the total amount for transactions within the current month
            "ThisMonth" => Expense::whereBetween('date', [$startOfMonth, $endOfMonth])
                                ->where('user_id',auth()->user()->id)
                                ->sum('amount'),

            // Retrieve the total amount for transactions within the current year
            "ThisYear" => Expense::whereBetween('date', [$startOfYear, $endOfYear])
                                ->where('user_id',auth()->user()->id)
                                ->sum('amount'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.expenses.create',[
            'types' => Type::where('user_id',auth()->user()->id)->get(),
            'subtypes' => Subtype::where('user_id',auth()->user()->id)->get(),
            'cards' => Card::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'max:255',
            'type_id' => 'required',
            'subtype_id' => 'required',
            'amount' => 'required|numeric',
            // 'payment_id' => 'required',
            'card_id' => 'required',
            // 'invoice' => 'required',
            'date' => 'required|date',
            'image' => 'image|file|max:5120'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('expense-images');
            $validatedData['invoice'] = '1';
        }
        else{
            $validatedData['invoice'] = '1';
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['payment_id'] = '1';

        Expense::create($validatedData);

        // Change Amount in Cards
        $dummy= Card::where('user_id',auth()->user()->id)->where('id',$validatedData['card_id'])->pluck('amount')->first() - $validatedData['amount'];
        Card::where('user_id',auth()->user()->id)->where('id',$validatedData['card_id'])->update(['amount' => $dummy]);

        return redirect('/expenses')->with('success','Data baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view('content.expenses.show', [
            'expenses' => $expense
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return view('content.expenses.edit', [
            'expenses' => $expense,
            'types' => Type::where('user_id',auth()->user()->id)->get(),
            'subtypes' => Subtype::where('user_id',auth()->user()->id)->get(),
            'cards' => Card::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        // dd($request);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'max:255',
            'type_id' => 'required|numeric',
            'subtype_id' => 'required|numeric',
            'amount' => 'required|numeric',
            // 'payment_id' => 'required',
            'card_id' => 'required',
            // 'invoice' => 'required',
            'date' => 'nullable',
            'image' => 'image|file|max:5120'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('expense-images');
        }

        Expense::where('id', $expense->id)->update($validatedData);

        // Change Amount in Cards

        if($expense->card_id <> $validatedData['card_id']){
            $dummy1 = Card::where('user_id',auth()->user()->id)->where('id',$expense['card_id'])->pluck('amount')->first() + $validatedData['amount'];
            Card::where('user_id',auth()->user()->id)->where('id',$expense['card_id'])->update(['amount' => $dummy1]);

            $dummy2 = Card::where('user_id',auth()->user()->id)->where('id',$validatedData['card_id'])->pluck('amount')->first() - $validatedData['amount'];
            Card::where('user_id',auth()->user()->id)->where('id',$validatedData['card_id'])->update(['amount' => $dummy2]);
        }

        if($expense->amount <> $validatedData['amount']){
            $dummy1 = $expense->amount - $validatedData['amount'];
            $dummy2 = Card::where('user_id',auth()->user()->id)->where('id',$validatedData['card_id'])->pluck('amount')->first() + $dummy1;
            Card::where('user_id',auth()->user()->id)->where('id',$expense['card_id'])->update(['amount' => $dummy2]);
        }

        return redirect('/expenses')->with('warning','Data telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(expense $expense)
    {
        if($expense->image) {
            Storage::delete($expense->image);
        }

        Expense::destroy($expense->id);

        return redirect('/expenses')->with('danger','Data telah dihapus!');
    }
}
