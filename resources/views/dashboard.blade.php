<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<!-- Buttons Section (Top Right, Compact) -->
<div class="flex justify-end space-x-4 mb-6">
    <a href="{{ route('incomes.index') }}" 
       class="px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md shadow hover:bg-red-700 transition">
        Income
    </a> 
    <a href="{{ route('expenses.index') }}" 
       class="px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md shadow hover:bg-red-700 transition">
        Expenses
    </a>
    <a href="{{ route('savings.index') }}" 
       class="px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md shadow hover:bg-red-700 transition">
        Savings
    </a>
</div>

                    
                    <!-- Financial Overview Header -->
                    <h1 class="text-2xl  mb-6 text-center text-red-600">Financial Overview</h1>

                    <!-- Financial Overview Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-red-50 border-l-4 border-red-600 p-4 rounded-lg shadow">
                            <h3 class="font-semibold text-gray-700">Total Income</h3>
                            <p class="text-xl font-bold text-red-600">₹{{ number_format($totalIncome, 2) }}</p>
                        </div>

                        <div class="bg-red-50 border-l-4 border-red-600 p-4 rounded-lg shadow">
                            <h3 class="font-semibold text-gray-700">Total Expenses</h3>
                            <p class="text-xl font-bold text-red-600">₹{{ number_format($totalExpenses, 2) }}</p>
                        </div>

                        <div class="bg-red-50 border-l-4 border-red-600 p-4 rounded-lg shadow">
                            <h3 class="font-semibold text-gray-700">Total Savings</h3>
                            <p class="text-xl font-bold text-red-600">₹{{ number_format($totalSavings, 2) }}</p>
                        </div>

                        <div class="bg-red-50 border-l-4 border-red-600 p-4 rounded-lg shadow">
                            <h3 class="font-semibold text-gray-700">Remaining Balance</h3>
                            <p class="text-xl font-bold text-red-600">₹{{ number_format($remainingBalance, 2) }}</p>
                        </div>
                    </div>

                    <!-- Monthly Insights Section -->
                    <div class="mt-10">
                        <h3 class="text-xl font-semibold mb-4 text-gray-800">📊 Monthly Insights</h3>
                        <div class="bg-gray-50 p-4 rounded-lg shadow">
                            <p><strong>Income:</strong> {{ $monthlyIncome }}</p>
                            <p><strong>Expenses:</strong> {{ $monthlyExpenses }}</p>
                            <p><strong>Highest Expense Category:</strong> {{ $highestExpenseCategory->category ?? 'N/A' }} ({{ $highestExpenseCategory->total ?? 0 }})</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
