<p>Olá, bem-vindo ao dashboard! {{ Auth::user()->name ?? 'Convidado' }}</p>
<p>Teste 123</p>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>