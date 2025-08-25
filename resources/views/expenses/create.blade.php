<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Expense</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff4e50, #1c1c1c);
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            margin-bottom: 20px;
            color: #ffcccc;
            text-align: center;
        }
        .form-container {
            background: #2b2b2b;
            padding: 20px 30px;
            border-radius: 10px;
            width: 40%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            text-align: left;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
            color: #ffcccc;
        }
        input {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 15px;
            background: #3a3a3a;
            color: #ffffff;
        }
        input:focus {
            outline: none;
            box-shadow: 0px 0px 5px #ff4e50;
        }
        button {
            background-color: #ff4e50;
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            align-self: flex-end;
        }
        button:hover {
            background-color: #ff6e6e;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Create Expense</h1>
        <form method="POST" action="{{ route('expenses.store') }}">
            @csrf

            <label for="category">Category:</label>
            <input type="text" name="category" id="category" required>

            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" required min="0">

            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>

            <button type="submit">Save Expense</button>
        </form>
    </div>
</body>
</html>
