<form action="{{ route('incomes.store') }}" method="POST">
    @csrf
    <label for="source">Source:</label>
    <input type="text" name="source" id="source" required>
    <label for="amount">Amount:</label>
    <input type="number" name="amount" id="amount" required>
    <label for="date">Date:</label>
    <input type="date" name="date" id="date" required>
    <button type="submit">Add Income</button>
</form>
