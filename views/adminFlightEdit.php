<div class="admin-header-container">
    <div class="admin-header">
        <a href="/admin/<?=$_SESSION['user_id']?>/passengers">Manage Passengers</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
    </div>
</div>

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

<form id="edit-form" method="POST" action="/admin/<?=$_SESSION['user_id']?>/flights/edit/<?=$data['Serial_Num']?>">
    <label for="id">ID:</label><br>
    <input type="number" id="ID" name="Serial_Num" value="<?= $data['Serial_Num'] ?>" readonly><br>
    <label for="firstName">Flight Number:</label><br>
    <input type="text" id="flightNumber" name="Flight_Num" value="<?= $data['Flight_Num'] ?>"><br>
    <label for="lastName">Origin:</label><br>
    <input type="text" id="origin" name="Origin" value="<?= $data['Origin'] ?>"><br>
    <label for="address">Destination:</label><br>
    <input type="text" id="destination" name="Destination" value="<?= $data['Destination'] ?>"><br>
    <label for="phoneNumber">Date:</label><br>
    <input type="text" id="date" name="Date" value="<?= $data['Date'] ?>"><br>
    <label for="arrivalTime">Arrival Time:</label><br>
    <input type="text" id="arrivalTime" name="Arrival_time" value="<?= $data['Arrival_time'] ?>"><br>
    <label for="intermediaryCity">Intermediary City:</label><br>
    <input type="text" id="intermediaryCity" name="Intermediary_City" value="<?= $data['Intermediary_City'] ?>"><br>
    <label for="departureTime">Departure Time:</label><br>
    <input type="text" id="departureTime" name="Departure_time" value="<?= $data['Departure_time'] ?>"><br><br>
    <input type="hidden" name="Flight_Num" value="<?= $data['Flight_Num'] ?>">
    <button type="submit">Save Changes</button>
</form>



<footer>@software engineering 2024</footer>