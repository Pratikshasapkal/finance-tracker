<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Income</title>
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
            max-width: 600px;
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
        form {
            display: flex;
            flex-direction: column;
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
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Income</h1>

        <form method="POST" action="{{ route('incomes.update', $income->id) }}">
            @csrf
            @method('PUT')

            <label for="source">Source:</label>
            <input type="text" id="source" name="source" value="{{ $income->source }}" required>
            
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" value="{{ $income->amount }}" required>
            
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="{{ $income->date }}" required>
            
            <button type="submit">Update</button>
        </form>
    </div>

</body>
</html>
