<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Saving;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\FinancialReportExport;

class ReportController extends Controller
{
    
    public function downloadPDF()
    {
        $userId = auth()->id();
        $incomes = Income::where('user_id', $userId)->get();
        $expenses = Expense::where('user_id', $userId)->get();
        $savings = Saving::where('user_id', $userId)->get();

    }

    
}
