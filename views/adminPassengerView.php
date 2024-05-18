<div class="admin-header-container">
    <div class="admin-header">
        <a href="/admin/<?=$_SESSION['user_id']?>/passengers">Manage Passengers</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
    </div>
</div>

<h1>Passenger Record for <?=$data['Passenger_ID']?></h1>

<table id="passengerTable">
    <tr>
        <th>Passenger ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Phone Number</th>
    </tr>
        <tr>
            <td><?= $data['Passenger_ID'] ?></td>
            <td><?= $data['First_name'] ?></td>
            <td><?= $data['Last_name'] ?></td>
            <td><?= $data['Address'] ?></td>
            <td><?= $data['Phone_Number'] ?></td>
        </tr>
</table>
<a href="/admin/<?=$_SESSION['user_id']?>/passengers/edit/<?=$data['Passenger_ID']?>">Edit</a>
<a href="/admin/<?=$_SESSION['user_id']?>/delete/<?=$data['Passenger_ID']?>">Delete</a>

<footer>@software engineering 2024</footer>