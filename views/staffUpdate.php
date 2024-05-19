<header>
    <div class="header-container">
        <div class="Logo">LOGO</div>
        <a href="/staff/<?=$_SESSION['user_id']?>">Assigned Flights</a>
        <a href="/staff/<?=$_SESSION['user_id']?>/manage-profile">Update Details</a>
    </div>
</header>

<h1>Change Personal Data</h1>

<?php if (isset($errors)): ?>
    <ul>
        <?php foreach ($errors as $field): ?>
            <?php foreach($field as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<form id="edit-form" method="POST" action="/staff/<?=$data['EMP_Num']?>/manage-profile/update">
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
    <input type="number" id="salary" name="Salary" value="<?= $data['Salary'] ?>" readonly><br><br>
    <input type="hidden" name="employeeId" value="<?= $data['EMP_Num'] ?>">
    <button type="submit">Save Changes</button>
</form>