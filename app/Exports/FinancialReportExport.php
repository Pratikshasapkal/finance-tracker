<?php

namespace App\Exports;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Saving;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
 


class FinancialReportExport
{
    public function collection()
    {
        $userId = auth()->id();

        $incomes = Income::where('user_id', $userId)->get(['source', 'amount', 'date']);
        $expenses = Expense::where('user_id', $userId)->get(['category', 'amount', 'date']);
        $savings = Saving::where('user_id', $userId)->get(['goal', 'saved_amount', 'date']);

        return collect([
            ['Type', 'Source/Category/Goal', 'Amount', 'Date'],
            ...$incomes->map(fn($i) => ['Income', $i->source, $i->amount, $i->date])->toArray(),
            ...$expenses->map(fn($e) => ['Expense', $e->category, $e->amount, $e->date])->toArray(),
            ...$savings->map(fn($s) => ['Saving', $s->goal, $s->saved_amount, $s->date])->toArray(),
        ]);
    }
}

?>