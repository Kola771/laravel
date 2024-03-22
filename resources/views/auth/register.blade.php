<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <form action="/register" method="post">
        @csrf
        <input type="text" name="name">
        <input type="email" name="email">
        <input type="password" name="password">
        <button type='submit'>Envoyer</button>
    </form>
</div>
