<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Records</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff4e50, #1c1c1c);
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        h1 {
            margin: 20px 0;
            color: #ffcccc;
        }
        a {
            text-decoration: none;
            color: #ffffff;
            background-color: #ff4e50;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #ff6e6e;
        }
        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
            background: #2b2b2b;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #444444;
        }
        th {
            background: #ff4e50;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background: #3a3a3a;
        }
        tr:hover {
            background: #444444;
        }
        button {
            color: #ffffff;
            background-color: #ff4e50;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #ff6e6e;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .pagination a {
            margin: 0 5px;
            padding: 8px 12px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            color: #ffffff;
        }
        .pagination a:hover {
            background: #ff4e50;
            border-color: #ff4e50;
        }
        .no-records {
            text-align: center;
            color: #ffcccc;
            font-size: 1.2em;
        }
        .add-expense-btn {
            background-color: #ff4e50;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
            position: absolute;
            right: 10px;
            top: 10px;
        }
        .add-expense-btn:hover {
            background-color: #ff6e6e;
        }
    </style>
</head>
<body>
    <h1>Expense Records</h1>

    <!-- Table of Expenses -->
    <table>
        <thead>
            <tr>
                <th>Category</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right; padding-right: 20px;">
                    <a href="{{ route('expenses.create') }}" class="add-expense-btn">Add New Expense</a>
                </td>
            </tr>
        </thead>
        <tbody>
            @forelse ($expenses as $expense)
                <tr>
                    <td>{{ $expense->category }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->date }}</td>
                    <td>
                        <a href="{{ route('expenses.edit', $expense->id) }}" style="margin-right: 10px;">Edit</a>
                        <form method="POST" action="{{ route('expenses.destroy', $expense->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="no-records">No records found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        {{ $expenses->links() }}
    </div>
</body>
</html>
