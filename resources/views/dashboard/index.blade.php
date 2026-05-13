<p>Olá, bem-vindo ao dashboard! {{ Auth::user()->name ?? 'Convidado' }}</p>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>