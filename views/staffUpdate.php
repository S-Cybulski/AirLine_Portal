<header>
    <div class="header-container">
        <div class="Logo">LOGO</div>
        <a href="/staff/<?=$_SESSION['user_id']?>/flight-history">Assigned Flights</a>
        <a href="/staff/<?=$_SESSION['user_id']?>/manage-profile">Update Details</a>
    </div>
</header>

<h1>Assigned Flights:</h1>

<div class="flight-container">
    <div class="flight-details">Flight Details</div>
    <div class="flights">

    <input type="text" id="searchInput" placeholder="Search...">
    <br><br>
    <table id="flightTable">
        <tr>
            <th>Flight Number</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Date</th>
            <th>Arrival time</th>
            <th>Intermediary City</th>
            <th>Departure time</th>
        </tr>
        <?php foreach ($data as $flight): ?>
            <tr>
                <td><?= $flight['Flight_Num'] ?></td>
                <td><?= $flight['Origin'] ?></td>
                <td><?= $flight['Destination'] ?></td>
                <td><?= $flight['Date'] ?></td>
                <td><?= $flight['Arrival_time'] ?></td>
                <td><?= $flight['Intermediary_City'] ?? "" ?></td>
                <td><?= $flight['Departure_time'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
</div>

<footer>@software engineering 2024</footer>

<script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("flightTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    });
</script>