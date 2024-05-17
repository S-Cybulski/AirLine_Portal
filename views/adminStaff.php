<div class="admin-header-container">
    <div class="admin-header">
        <a href="/admin/<?=$_SESSION['user_id']?>">Manage Passengers</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
    </div>
</div>

<h1>Passenger View</h1>

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
                <button onclick="viewFlight(<?= $flight['Flight_Num'] ?>)">View</button>
                <button onclick="editFlight(<?= $flight['Flight_Num'] ?>)">Edit</button>
                <button onclick="deleteFlight(<?= $flight['Flight_Num'] ?>)">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>


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
