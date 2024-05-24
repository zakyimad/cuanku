<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Card;
use App\Models\Type;
use App\Models\Subtype;
use App\Models\Source;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Analytics extends Controller
{
  public function index()
  {
    $result = $this->NewUser();

    return view('content.dashboard.dashboards-analytics',[
        'expenses' => Expense::where('user_id',auth()->user()->id)->get(),
        'types' => Type::where('user_id',auth()->user()->id)->get(),

        // Get the start and end of the current month
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString(),
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString(),

        // Retrieve the total amount for transactions within the current month
        "ThisMonthExpense" => Expense::whereBetween('date', [$startOfMonth, $endOfMonth])
        ->where('user_id',auth()->user()->id)
        ->sum('amount'),

        "ThisMonthIncome" => Income::whereBetween('date', [$startOfMonth, $endOfMonth])
        ->where('user_id',auth()->user()->id)
        ->sum('amount'),

        // Get the current date
        $currentDate = Carbon::now()->toDateString(),

        // Retrieve the total amount for transactions on the current day
        "TodayCount" => Expense::whereDate('date', $currentDate)
        ->where('user_id',auth()->user()->id)
        ->count('id'),

        // Menggabungkan data pengeluaran dan pemasukan
        'alltransactions' => DB::table('expenses')
        ->select('date','title','expenses.amount','description','expenses.created_at','card_id','cards.name','cards.color', 'cards.icon','expenses.user_id', DB::raw("'Pengeluaran' as type"),DB::raw("'warning' as color_type"))
        ->join('users', 'expenses.user_id', '=', 'users.id')
        ->join('cards', 'expenses.card_id', '=', 'cards.id')
        ->where('expenses.user_id', auth()->user()->id)
        ->union(
            DB::table('incomes')
            ->select('date','title','incomes.amount','description','incomes.created_at','card_id','cards.name','cards.color', 'cards.icon','incomes.user_id', DB::raw("'Pemasukan' as type"),DB::raw("'success' as color_type"))
            ->join('users', 'incomes.user_id', '=', 'users.id')
            ->join('cards', 'incomes.card_id', '=', 'cards.id')
            ->where('incomes.user_id', auth()->user()->id)
        )
        ->orderBy('date', 'desc')
        ->get()
    ]);
  }

  public function NewUser()
    {
        $countcard = Card::where('user_id',auth()->user()->id)->count();
        $counttype = Type::where('user_id',auth()->user()->id)->count();
        $countsubtype = Subtype::where('user_id',auth()->user()->id)->count();
        $countsource = Source::where('user_id',auth()->user()->id)->count();

        if ($countcard == 0) {
            Card::create([
                'name' => 'Cash',
                'amount' => 60000,
                'color' => '#769E5C',
                'icon' => 'cash-multiple',
                'user_id' => auth()->user()->id
            ]);

            Card::create([
                'name' => 'BRI',
                'amount' => 100000,
                'color' => '#08579F',
                'icon' => 'credit-card',
                'user_id' => auth()->user()->id
            ]);
        };

        if ($counttype == 0) {
            Type::create([
                'name' => 'Needs',
                'color' => 'danger',
                'icon' => 'food',
                'percentage' => 0.4,
                'user_id' => auth()->user()->id
            ]);

            Type::create([
                'name' => 'Wants',
                'color' => 'warning',
                'icon' => 'gift-open',
                'percentage' => 0.3,
                'user_id' => auth()->user()->id
            ]);

            Type::create([
                'name' => 'Savings',
                'color' => 'info',
                'icon' => 'wallet-plus',
                'percentage' => 0.3,
                'user_id' => auth()->user()->id
            ]);
        };

        if ($countsubtype == 0) {
            Subtype::create([
                'name' => 'Makanan',
                'icon' => 'food-outline',
                'user_id' => auth()->user()->id
            ]);

            Subtype::create([
                'name' => 'Kerja',
                'icon' => 'briefcase-outline',
                'user_id' => auth()->user()->id
            ]);

            Subtype::create([
                'name' => 'Londri',
                'icon' => 'tumble-dryer',
                'user_id' => auth()->user()->id
            ]);
        };

        if ($countsource == 0) {
            Source::create([
                'name' => 'Gaji',
                'icon' => 'currency-usd',
                'user_id' => auth()->user()->id
            ]);

            Source::create([
                'name' => 'Lembur',
                'icon' => 'currency-usd',
                'user_id' => auth()->user()->id
            ]);
        }
    }
}
