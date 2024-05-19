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

        <h1>Aircraft Record for <?=$data['Serial_Num']?></h1>

        <table id="aircraftTable">
            <tr>
                <th>Serial Number</th>
                <th>Manufacturer</th>
                <th>Model</th>
            </tr>
            <tr>
                <td><?= $data['Serial_Num'] ?></td>
                <td><?= $data['Manufacturer'] ?></td>
                <td><?= $data['Model'] ?></td>
            </tr>
        </table>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft/edit/<?=$data['Serial_Num']?>">Edit</a>
        <form class="delete" action="/admin/<?=$_SESSION['user_id']?>/aircraft/delete/<?=$data['Serial_Num']?>" method="POST">
            <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
        </form>

        
    </div>
</div>

<footer>@software engineering 2024</footer>