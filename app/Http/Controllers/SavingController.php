<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saving;

class SavingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the savings for the logged-in user
        $query = Saving::where('user_id', auth()->id());

        // Apply filters if provided
        if ($request->has('goal')) {
            $query->where('goal', 'like', '%' . $request->goal . '%');
        }

        // Paginate the results
        $savings = $query->orderBy('target_date', 'desc')->paginate(10);

        return view('savings.index', compact('savings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the create view for savings
        return view('savings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'goal' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'saved_amount' => 'required|numeric|min:0|max:' . $request->amount,
            'target_date' => 'required|date',
        ]);

        // Create a new saving record
        Saving::create([
            'goal' => $validated['goal'],
            'amount' => $validated['amount'],
            'saved_amount' => $validated['saved_amount'],
            'target_date' => $validated['target_date'],
            'user_id' => auth()->id(),
        ]);

        // Redirect to the savings index page with a success message
        return redirect()->route('savings.index')->with('success', 'Saving goal added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the saving by ID and pass it to the edit view
        $saving = Saving::findOrFail($id);
        return view('savings.edit', compact('saving'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming data
        $validated = $request->validate([
            'goal' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'saved_amount' => 'required|numeric|min:0|max:' . $request->amount,
            'target_date' => 'required|date',
        ]);

        // Find the saving by ID and update it
        $saving = Saving::findOrFail($id);
        $saving->update([
            'goal' => $validated['goal'],
            'amount' => $validated['amount'],
            'saved_amount' => $validated['saved_amount'],
            'target_date' => $validated['target_date'],
        ]);

        // Redirect to the savings index page with a success message
        return redirect()->route('savings.index')->with('success', 'Saving goal updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the saving by ID and delete it
        $saving = Saving::findOrFail($id);
        $saving->delete();

        // Redirect to the savings index page with a success message
        return redirect()->route('savings.index')->with('success', 'Saving goal deleted successfully!');
    }

    
}
