<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Expense</title>
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
            justify-content: center;
            min-height: 100vh;
        }
        h1 {
            margin-bottom: 20px;
            color: #ffcccc;
        }
        label {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        input {
            padding: 12px;
            border-radius: 5px;
            border: none;
            width: 100%;
            font-size: 1em;
        }
        button {
            color: #ffffff;
            background-color: #ff4e50;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 1.1em;
            width: 100%;
        }
        button:hover {
            background-color: #ff6e6e;
        }
        form {
            background: #2b2b2b;
            padding: 30px 50px; /* Equal padding for left and right */
            border-radius: 10px;
            width: 80%; /* Relative width for a horizontal rectangle */
            max-width: 900px; /* Max width for large screens */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
        .form-container {
            width: 100%; /* Ensures the form container is horizontally centered */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        .form-group.input-reverse {
            flex-direction: column-reverse;
        }
    </style>
</head>
<body>

    <h1>Edit Expense</h1>

    <div class="form-container">
        <form method="POST" action="{{ route('expenses.update', $expense->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" name="category" id="category" value="{{ $expense->category }}" required>
            </div>

            <div class="form-group input-reverse">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" id="amount" value="{{ $expense->amount }}" required min="0">
            </div>

            <div class="form-group input-reverse">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" value="{{ $expense->date }}" required>
            </div>

            <button type="submit">Update Expense</button>
        </form>
    </div>

</body>
</html>
