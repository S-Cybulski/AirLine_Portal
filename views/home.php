<h1>Hello world</h1>

<?php if (empty($_SESSION['user_id'])): ?>

<a href="/signup">Sign up</a>
<p> or </p>
<a href="/login">Login</a>

<?php else: ?>

    <a href="/logout">Logout</a>

<?php endif; ?>