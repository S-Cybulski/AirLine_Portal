<div class="admin-header-container">
    <div class="admin-header">
        <a href="/admin/<?=$_SESSION['user_id']?>/passengers">Manage Passengers</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
    </div>
</div>

<h1>Aircraft View</h1>

<input type="text" id="searchInput" onkeyup="searchAircraft()" placeholder="Search for aircraft by Serial Number">

<table id="aircraftTable">
    <tr>
        <th>Serial Number</th>
        <th>Manufacturer</th>
        <th>Model</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($data as $aircraft): ?>
        <tr>
            <td><?= $aircraft['Serial_Num'] ?></td>
            <td><?= $aircraft['Manufacturer'] ?></td>
            <td><?= $aircraft['Model'] ?></td>
            <td>
                <button onclick="viewAircraft(<?= $aircraft['Serial_Num'] ?>)">View</button>
                <button onclick="editAircraft(<?= $aircraft['Serial_Num'] ?>)">Edit</button>
                <button onclick="deleteAircraft(<?= $aircraft['Serial_Num'] ?>)">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<footer>@software engineering 2024</footer>

<script>
    function searchAircraft() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("aircraftTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
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

