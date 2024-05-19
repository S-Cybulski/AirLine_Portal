<div class="admin-header-container">
    <div class="admin-header">
        <a href="/admin/<?=$_SESSION['user_id']?>/passengers">Manage Passengers</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
    </div>
</div>

<h1>Edit Aircraft Record Id: <?=$data['EMP_Num']?></h1>

<?php if (isset($errors)): ?>
    <ul>
        <?php foreach ($errors as $field): ?>
            <?php foreach($field as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<form id="edit-form" method="POST" action="/admin/<?=$_SESSION['user_id']?>/employees/edit/<?=$data['EMP_Num']?>">
    <label for="empNum">Employee Number:</label><br>
    <input type="number" id="empNum" name="EMP_Num" value="<?= $data['EMP_Num'] ?>" readonly><br>
    <label for="lastName">Last Name:</label><br>
    <input type="text" id="lastName" name="Last_name" value="<?= $data['Last_name'] ?>"><br>
    <label for="firstName">First Name:</label><br>
    <input type="text" id="firstName" name="First_name" value="<?= $data['First_name'] ?>"><br>
    <label for="address">Address:</label><br>
    <input type="text" id="address" name="Address" value="<?= $data['Address'] ?>"><br>
    <label for="phoneNumber">Phone Number:</label><br>
    <input type="text" id="phoneNumber" name="Phone_number" value="<?= $data['Phone_number'] ?>"><br>
    <label for="salary">Salary:</label><br>
    <input type="number" id="salary" name="Salary" value="<?= $data['Salary'] ?>"><br><br>
    <input type="hidden" name="employeeId" value="<?= $data['EMP_Num'] ?>">
    <button type="submit">Save Changes</button>
</form>

<footer>@software engineering 2024</footer>