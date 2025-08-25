<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Income::where('user_id', auth()->id());

        // Apply filters if provided
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        if ($request->has('source')) {
            $query->where('source', 'like', '%' . $request->source . '%');
        }

        // Paginate the results
        $incomes = $query->orderBy('date', 'desc')->paginate(10);

        return view('incomes.index', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return view for creating income
        return view('incomes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'source' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
        'date' => 'required|date',
    ]);

    Income::create([
        'user_id' => auth()->id(),
        'source' => $request->source,
        'amount' => $request->amount,
        'date' => $request->date,
    ]);

    return redirect()->route('income.index')->with('success', 'Income added successfully!');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the income by ID and pass it to the edit view
        $income = Income::findOrFail($id);
        return view('incomes.edit', compact('income'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming data
        $validated = $request->validate([
            'source' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        // Find the income by ID and update it
        $income = Income::findOrFail($id);
        $income->update([
            'source' => $validated['source'],
            'amount' => $validated['amount'],
            'date' => $validated['date'],
        ]);

        // Redirect to the income index page with a success message
        return redirect()->route('incomes.index')->with('success', 'Income updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the income by ID and delete it
        $income = Income::findOrFail($id);
        $income->delete();

        // Redirect to the income index page with a success message
        return redirect()->route('incomes.index')->with('success', 'Income deleted successfully!');
    }
}
