<div class="admin-header-container">
    <div class="admin-header">
        <a href="/admin/<?=$_SESSION['user_id']?>/passengers">Manage Passengers</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
    </div>
</div>

<h1>Staff Record for <?=$data['EMP_Num']?></h1>

<table id="staffTable">
    <tr>
        <th>Employee Number</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Salary</th>
        <th>Type_Rating</th>
    </tr>
        <tr>
            <td><?= $data['EMP_Num'] ?></td>
            <td><?= $data['Last_name'] ?></td>
            <td><?= $data['First_name'] ?></td>
            <td><?= $data['Address'] ?></td>
            <td><?= $data['Phone_number'] ?></td>
            <td>$<?= $data['Salary'] ?></td>
            <td><?= $data['Type_rating'] ?></td>

        </tr>
</table>
<a href="/admin/<?=$_SESSION['user_id']?>/staff/edit/<?=$data['EMP_Num']?>">Edit</a>
<form action="/admin/<?=$_SESSION['user_id']?>/staff/delete/<?=$data['EMP_Num']?>" method="POST">
    <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
</form>

<footer>@software engineering 2024</footer>