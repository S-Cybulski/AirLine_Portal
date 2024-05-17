<h1>Signup</h1>

<?php if (isset($errors)): ?>
    <ul>
        <?php foreach ($errors as $field): ?>
            <?php foreach($field as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<form method="post" action="/signup">
    <label for="First_name">First Name:</label>
    <input type="text" name="First_name" id="First_name" value="<?=htmlspecialchars($data['First_name'] ?? '')?>">

    <label for="Last_name">Last Name:</label>
    <input type="text" name="Last_name" id="Last_name" value="<?=htmlspecialchars($data['Last_name'] ?? '')?>">
    
    <label for="Address">Address:</label>
    <input type="text" name="Address" id="Address" value="<?=htmlspecialchars($data['Address'] ?? '')?>">

    <label for="Phone_Number">Phone Number:</label>
    <input type="text" name="Phone_Number" id="Phone_Number" value="<?=htmlspecialchars($data['Phone_Number'] ?? '')?>">

    <label for="password">Password:</label>
    <input type="password" name="password" id="password">

    <label for="password_confirmation">Repeat password:</label>
    <input type="password" name="password_confirmation" id="password_confirmation">

    <button>Sign up</button>
</form>