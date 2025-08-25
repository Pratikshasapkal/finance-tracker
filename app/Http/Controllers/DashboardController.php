<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Saving;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
    
        // Calculate totals
        $totalIncome = Income::where('user_id', $userId)->sum('amount');
        $totalExpenses = Expense::where('user_id', $userId)->sum('amount');
        $totalSavings = Saving::where('user_id', $userId)->sum('saved_amount');
        $remainingBalance = $totalIncome - ($totalExpenses + $totalSavings);
    
        // Calculate monthly totals
        $monthlyIncome = Income::where('user_id', $userId)
                               ->whereMonth('created_at', now()->month)
                               ->whereYear('created_at', now()->year)
                               ->sum('amount');
                               
        $monthlyExpenses = Expense::where('user_id', $userId)
                                  ->whereMonth('created_at', now()->month)
                                  ->whereYear('created_at', now()->year)
                                  ->sum('amount');
        
        // Fetch the highest expense category for the current month
        $highestExpenseCategory = Expense::select('category', \DB::raw('SUM(amount) as total'))
                                         ->where('user_id', $userId)
                                         ->whereMonth('created_at', now()->month)
                                         ->whereYear('created_at', now()->year)
                                         ->groupBy('category')
                                         ->orderByDesc('total')
                                         ->first();
    
        return view('dashboard', compact(
            'totalIncome', 
            'totalExpenses', 
            'totalSavings', 
            'remainingBalance', 
            'monthlyIncome', 
            'monthlyExpenses', 
            'highestExpenseCategory'
        ));
    }
    

    public function getMonthlyInsights()
{
    $userId = auth()->id();
    $currentMonth = now()->format('Y-m');

    // Monthly totals
    $monthlyIncome = Income::where('user_id', $userId)
        ->where('date', 'like', "$currentMonth%")
        ->sum('amount');

    $monthlyExpenses = Expense::where('user_id', $userId)
        ->where('date', 'like', "$currentMonth%")
        ->sum('amount');

    $highestExpenseCategory = Expense::where('user_id', $userId)
        ->where('date', 'like', "$currentMonth%")
        ->groupBy('category')
        ->selectRaw('category, SUM(amount) as total')
        ->orderByDesc('total')
        ->first();

    return view('dashboard', compact('monthlyIncome', 'monthlyExpenses', 'highestExpenseCategory'));
}

}
