<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income Records</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff4d4d, #1c1c1c);
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 900px;
            margin: 50px auto;
            background: #2b2b2b;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            color: #ffcccc;
            margin-bottom: 20px;
        }
        a {
            padding: 10px 15px;
            background-color: #ff4d4d;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #e60000;
        }
        form {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
            margin-bottom: 30px;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #444444;
            border-radius: 5px;
            background: #1c1c1c;
            color: #ffffff;
        }
        input:focus {
            outline: none;
            border-color: #ff4d4d;
            box-shadow: 0 0 5px #ff4d4d;
        }
        button {
            padding: 10px 15px;
            font-size: 16px;
            color: #ffffff;
            background-color: #ff4d4d;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #e60000;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #444444;
        }
        th {
            background-color: #ff4d4d;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background: #3a3a3a;
        }
        tr:hover {
            background: #444444;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .pagination a {
            padding: 8px 12px;
            margin: 0 5px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            color: #ffffff;
        }
        .pagination a:hover {
            background-color: #ff4d4d;
            border-color: #ff4d4d;
        }
        .no-records {
            text-align: center;
            color: #ffcccc;
            font-size: 1.2em;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Income Records</h1>

        <!-- Add Income Button -->
        <div style="margin-bottom: 20px;">
            <a href="{{ route('incomes.create') }}">Add Income</a>
        </div>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('incomes.index') }}">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}">

            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}">

            <label for="source">Source:</label>
            <input type="text" name="source" id="source" value="{{ request('source') }}">

            <button type="submit">Filter</button>
        </form>

        <!-- Income Table -->
        <table>
            <thead>
                <tr>
                    <th>Source</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Actions</th> <!-- Added Actions Column -->
                </tr>
            </thead>
            <tbody>
                @forelse ($incomes as $income)
                    <tr>
                        <td>{{ $income->source }}</td>
                        <td>{{ $income->amount }}</td>
                        <td>{{ $income->date }}</td>
                        <td>
                            <!-- Edit & Delete Actions -->
                            <a href="{{ route('incomes.edit', $income->id) }}">Edit</a>
                            <form method="POST" action="{{ route('incomes.destroy', $income->id) }}" style="display:inline;">
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

        <!-- Pagination Links -->
        <div class="pagination">
            {{ $incomes->links() }}
        </div>
    </div>

</body>
</html>
