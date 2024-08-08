<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Carbon\Carbon;

class DataController extends Controller
{
    public function getExpenseData()
    {
        // Fetch and aggregate expense data for the past week
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();

        $expenseData = Expense::selectRaw('DATE(date) as date, SUM(amount) as total')
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Create an array with the total expenses for each day of the week
        $dailyExpenses = [];
        $currentDate = $startOfWeek->copy();
        while ($currentDate->lte($endOfWeek)) {
            $dayExpense = $expenseData->firstWhere('date', $currentDate->toDateString());
            $dailyExpenses[] = $dayExpense ? (float) $dayExpense->total : 0.0;
            $currentDate->addDay();
        }

        return response()->json($dailyExpenses);
    }
}
