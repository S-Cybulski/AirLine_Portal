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
        <form action="/admin/<?=$_SESSION['user_id']?>/passengers/delete/<?=$passenger['Passenger_ID']?>" method="POST">
            <button class="delete" type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
        </form>

        
    </div>
</div>

<footer>@software engineering 2024</footer>