<!DOCTYPE html>
<html>
<head>
    <title>Financial Report</title>
</head>
<body>
    <h1>Financial Report</h1>

    <h2>Income</h2>
    @foreach($incomes as $income)
        <p>{{ $income->source }} - {{ $income->amount }}</p>
    @endforeach

    <h2>Expenses</h2>
    @foreach($expenses as $expense)
        <p>{{ $expense->category }} - {{ $expense->amount }}</p>
    @endforeach

    <h2>Savings</h2>
    @foreach($savings as $saving)
        <p>{{ $saving->goal }} - {{ $saving->saved_amount }}</p>
    @endforeach
</body>
</html>
