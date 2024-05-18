<div class="admin-header-container">
    <div class="admin-header">
        <a href="/admin/<?=$_SESSION['user_id']?>/passengers">Manage Passengers</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
    </div>
</div>

<h1>Aircraft View</h1>

<input type="text" id="searchInput" onkeyup="searchStaff()" placeholder="Search for staff by Last Name">

<table id="staffTable">
    <tr>
        <th>Employee Number</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Salary</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($data as $staff): ?>
        <tr>
            <td><?= $staff['EMP_Num'] ?></td>
            <td><?= $staff['Last_name'] ?></td>
            <td><?= $staff['First_name'] ?></td>
            <td><?= $staff['Address'] ?></td>
            <td><?= $staff['Phone_number'] ?></td>
            <td><?= $staff['Salary'] ?></td>
            <td>
                <button onclick="viewStaff(<?= $staff['EMP_Num'] ?>)">View</button>
                <button onclick="editStaff(<?= $staff['EMP_Num'] ?>)">Edit</button>
                <button onclick="deleteStaff(<?= $staff['EMP_Num'] ?>)">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<footer>@software engineering 2024</footer>

<script>
    function searchStaff() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("staffTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Search by Last Name (index 1)
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
