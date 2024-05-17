<h1>Login</h1>

<?php if (isset($error)): ?>

    <p><?=$error?></p>

<?php endif;?>

<form method="post" action="/login">
    <label for="id">ID:</label>
    <input type="text" name="id" id="id" value="<?=htmlspecialchars($data['id'] ?? '')?>">

    <label for="password">Password:</label>
    <input type="password" name="password" id="password">

    <button>Login</button>
</form>