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
                    <a href="/admin/<?=$_SESSION['user_id']?>/aircraft/view/<?=$aircraft['Serial_Num']?>">View</a>
                    <a href="/admin/<?=$_SESSION['user_id']?>/aircraft/edit/<?=$aircraft['Serial_Num']?>">Edit</a>
                    <form action="/admin/<?=$_SESSION['user_id']?>/aircraft/delete/<?=$aircraft['Serial_Num']?>" method="POST">
                        <button class="delete" type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                    </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        
    </div>
</div>

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

