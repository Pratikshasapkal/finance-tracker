<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::where('user_id', auth()->id())
                            ->orderBy('date', 'desc')
                            ->paginate(10);

        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        $expense = new Expense();
        $expense->category = $request->category;
        $expense->amount = $request->amount;
        $expense->date = $request->date;
        $expense->user_id = auth()->id();
        $expense->save();

        return redirect()->route('expenses.index')->with('success', 'Expense added successfully!');
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully!');
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully!');
    }
}
