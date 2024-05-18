<div class="admin-header-container">
    <div class="admin-header">
        <a href="/admin/<?=$_SESSION['user_id']?>/passengers">Manage Passengers</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
    </div>
</div>

<h1>Flights View</h1>

<input type="text" id="searchInput" onkeyup="searchPassenger()" placeholder="Search for passengers..">

<table id="flightTable">
    <tr>
        <th>Flight Number</th>
        <th>Origin</th>
        <th>Destination</th>
        <th>Date</th>
        <th>Arrival Time</th>
        <th>Intermediary City</th>
        <th>Departure Time</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($data as $flight): ?>
        <tr>
            <td><?= $flight['Flight_Num'] ?></td>
            <td><?= $flight['Origin'] ?></td>
            <td><?= $flight['Destination'] ?></td>
            <td><?= $flight['Date'] ?></td>
            <td><?= $flight['Arrival_time'] ?></td>
            <td><?= $flight['Intermediary_City'] ?? "None" ?></td>
            <td><?= $flight['Departure_time'] ?></td>
            <td>
                <a href="/admin/<?=$_SESSION['user_id']?>/flights/view/<?=$flight['Flight_Num']?>">View</a>
                <a href="/admin/<?=$_SESSION['user_id']?>/flights/edit/<?=$flight['Flight_Num']?>">Edit</a>
                <form action="/admin/<?=$_SESSION['user_id']?>/flights/delete/<?=$flight['Flight_Num']?>" method="POST">
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<footer>@software engineering 2024</footer>

<script>
    function searchPassenger() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("flightTable");
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
