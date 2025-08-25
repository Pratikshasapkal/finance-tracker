<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savings</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff4e50, #1c1c1c);
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            background: #2b2b2b;
            padding: 20px;
            border-radius: 10px;
            position: relative;
        }
        h1 {
            margin-top: 0;
            color: #ffcccc;
            text-align: center;
        }
        a.add-goal-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            text-decoration: none;
            color: #ffffff;
            background-color: #ff4e50;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        a.add-goal-btn:hover {
            background-color: #ff6e6e;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
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
        .no-records {
            text-align: center;
            color: #ffcccc;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('savings.create') }}" class="add-goal-btn">Add Goal</a>
        Edit
    </a>
        <h1>Savings</h1>
        
        <!-- Table -->
        <table>
    <thead>
        <tr>
            <th>Goal</th>
            <th>Amount</th>
            <th>Saved Amount</th>
            <th>Target Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($savings as $saving)
            <tr>
                <td>{{ $saving->goal }}</td>
                <td>{{ $saving->amount }}</td>
                <td>{{ $saving->saved_amount }}</td>
                <td>{{ $saving->target_date }}</td>
                <td>
                    <a href="{{ route('savings.edit', $saving->id) }}" style="padding: 5px 10px; background-color:#ff4e50 ; color: #fff; text-decoration: none; border-radius: 5px;">
                        Edit
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
</body>
</html>
