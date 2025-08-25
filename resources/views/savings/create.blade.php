<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Saving Goal</title>
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
            max-width: 500px;
            margin: 50px auto;
            background: #2b2b2b;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            margin-top: 0;
            color: #ffcccc;
            text-align: center;
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
            border-color: #ff4e50;
            box-shadow: 0 0 5px #ff4e50;
        }
        button {
            padding: 10px 15px;
            font-size: 16px;
            color: #ffffff;
            background-color: #ff4e50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #ff6e6e;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Saving Goal</h1>
        <form action="{{ route('savings.store') }}" method="POST">
            @csrf
            <label for="goal">Goal:</label>
            <input type="text" name="goal" id="goal" required>
            <label for="amount">Total Amount:</label>
            <input type="number" name="amount" id="amount" required min="0">
            <label for="saved_amount">Saved Amount:</label>
            <input type="number" name="saved_amount" id="saved_amount" required min="0">
            <label for="target_date">Target Date:</label>
            <input type="date" name="target_date" id="target_date" required>
            <button type="submit">Add Saving Goal</button>
        </form>
    </div>
</body>
</html>
