<div class="admin-header-container">
    <div class="admin-header">
        <a class="header-link" href="/admin/<?=$_SESSION['user_id']?>/passengers">Manage Passengers</a>
        <a class="header-link" href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a class="header-link" href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a class="header-link" href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
        <a class="header-link" href="/admin/<?=$_SESSION['user_id']?>/assign-to-flight">Assign To Flight</a>
    </div>
</div>


<div class="content-container">
    <div class="content">

        <h1>Edit Passenger Record Id: <?=$data['Passenger_ID']?></h1>

        <?php if (isset($errors)): ?>
            <ul>
                <?php foreach ($errors as $field): ?>
                    <?php foreach($field as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>

        <form id="edit-form" method="POST" action="/admin/<?=$_SESSION['user_id']?>/passengers/edit/<?=$data['Passenger_ID']?>">
            <label for="id">ID:</label><br>
            <input type="number" id="ID" name="Passenger_ID" value="<?= $data['Passenger_ID'] ?>" readonly><br>
            <label for="firstName">First Name:</label><br>
            <input type="text" id="firstName" name="First_name" value="<?= $data['First_name'] ?>"><br>
            <label for="lastName">Last Name:</label><br>
            <input type="text" id="lastName" name="Last_name" value="<?= $data['Last_name'] ?>"><br>
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="Address" value="<?= $data['Address'] ?>"><br>
            <label for="phoneNumber">Phone Number:</label><br>
            <input type="text" id="phoneNumber" name="Phone_Number" value="<?= $data['Phone_Number'] ?>"><br><br>
            <input type="hidden" name="passengerId" value="<?= $data['Passenger_ID'] ?>">
            <button type="submit">Save Changes</button>
        </form>

        
    </div>
</div>

<footer>@software engineering 2024</footer>