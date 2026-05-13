<form method="POST" action="/register">
    @csrf
    <input type="text" name="name" placeholder="Nome">
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Registrar</button>
</form>