<form method="POST" action="/login">
    @csrf
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>