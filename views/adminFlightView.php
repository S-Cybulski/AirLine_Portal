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

        <h1>Flight Record for <?=$data['Flight_Num']?></h1>

        <table id="passengerTable">
            <tr>
                <th>Flight Number</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Arrival Time</th>
                <th>Intermediary City</th>
                <th>Departure Time</th>
                <th>Serial Number</th>
            </tr>
                <tr>
                    <td><?= $data['Flight_Num'] ?></td>
                    <td><?= $data['Origin'] ?></td>
                    <td><?= $data['Destination'] ?></td>
                    <td><?= $data['Arrival_time'] ?></td>
                    <td><?= $data['Intermediary_City'] ?></td>
                    <td><?= $data['Departure_time'] ?></td>
                    <td><?= $data['Serial_Num'] ?></td>
                </tr>
        </table>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights/edit/<?=$data['Flight_Num']?>">Edit</a>
        <form action="/admin/<?=$_SESSION['user_id']?>/flights/delete/<?=$data['Flight_Num']?>" method="POST">
            <button class="delete" type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
        </form>
        
        
    </div>
</div>

<footer>@software engineering 2024</footer>