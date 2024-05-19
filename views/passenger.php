<header class="admin-header-container">
    <div class="admin-header">
        <a class='header-link' href="/passenger/<?=$_SESSION['user_id']?>">Search</a>
        <a class='header-link' href="/passenger/<?=$_SESSION['user_id']?>/flight-history">Flight History/Bookings</a>
        <a class='header-link' href="/passenger/<?=$_SESSION['user_id']?>/manage-profile">Profile</a>
    </div>
</header>

<div class="content-container">
    <div class="content">
        <div class="banner-container">
            <img src="/images/41822.jpg" width=350 alt="Plane">
            <div class="banner-content">
                <h1>Welcome to the Airline Portal</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>

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
                        <td>
                            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>/book" method="POST">
                                <input type="hidden" name="Flight_Num" value="<?= $flight['Flight_Num'] ?>">
                                <input type="hidden" name="ID" value="<?= $_SESSION['user_id']?>">
                                <button type="submit">Book</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>
        </div>

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