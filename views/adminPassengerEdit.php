<div class="admin-header-container">
    <div class="admin-header">
        <a href="/admin/<?=$_SESSION['user_id']?>/passengers">Manage Passengers</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
    </div>
</div>

<h1>Edit Passenger Record Id: <?=$data['Passenger_ID']?></h1>

<form id="editForm" method="POST">
    <label for="firstName">First Name:</label><br>
    <input type="text" id="firstName" name="firstName" value="<?= $data['First_name'] ?>"><br>
    <label for="lastName">Last Name:</label><br>
    <input type="text" id="lastName" name="lastName" value="<?= $data['Last_name'] ?>"><br>
    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address" value="<?= $data['Address'] ?>"><br>
    <label for="phoneNumber">Phone Number:</label><br>
    <input type="text" id="phoneNumber" name="phoneNumber" value="<?= $data['Phone_Number'] ?>"><br><br>
    <input type="hidden" name="passengerId" value="<?= $data['Passenger_ID'] ?>">
    <button type="submit">Save Changes</button>
</form>

<footer>@software engineering 2024</footer>