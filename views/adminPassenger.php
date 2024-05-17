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

<table id="passengerTable">
    <tr>
        <th>Passenger ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($data as $passenger): ?>
        <tr>
            <td><?= $passenger['Passenger_ID'] ?></td>
            <td><?= $passenger['First_name'] ?></td>
            <td><?= $passenger['Last_name'] ?></td>
            <td><?= $passenger['Address'] ?></td>
            <td><?= $passenger['Phone_Number'] ?></td>
            <td>
                <button onclick="viewPassenger(<?= $passenger['Passenger_ID'] ?>)">View</button>
                <button onclick="editPassenger(<?= $passenger['Passenger_ID'] ?>)">Edit</button>
                <button onclick="deletePassenger(<?= $passenger['Passenger_ID'] ?>)">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
    function searchPassenger() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("passengerTable");
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
