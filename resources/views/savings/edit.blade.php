<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Saving Goal</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- External styles -->
    <style>
        /* Matching previous page theme */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #fff;
            background-color: #e74c3c; /* Red background matching theme */
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
            display: inline-block;
        }

        input[type="text"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #e74c3c; /* Red button */
            color: #fff;
            border: none;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c0392b; /* Darker red on hover */
        }

        .back-link {
            margin-top: 20px;
            text-align: center;
        }

        .back-link a {
            color: #e74c3c; /* Red link */
            font-size: 18px;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Saving Goal</h1>

        <form method="POST" action="{{ route('savings.update', $saving->id) }}">
            @csrf
            @method('PUT')

            <label for="goal">Goal:</label>
            <input type="text" id="goal" name="goal" value="{{ $saving->goal }}" required>
            
            <label for="amount">Total Amount:</label>
            <input type="number" id="amount" name="amount" value="{{ $saving->amount }}" required>
            
            <label for="saved_amount">Saved Amount:</label>
            <input type="number" id="saved_amount" name="saved_amount" value="{{ $saving->saved_amount }}" required>
            
            <label for="target_date">Target Date:</label>
            <input type="date" id="target_date" name="target_date" value="{{ $saving->target_date }}" required>
            
            <button type="submit">Update Saving Goal</button>
        </form>

        <div class="back-link">
            <a href="{{ route('savings.index') }}">Back to Savings</a>
        </div>
    </div>

</body>
</html>
