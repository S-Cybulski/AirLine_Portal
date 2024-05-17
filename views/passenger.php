<header>
    <div class="header-container">
        <div class="Logo">LOGO</div>
        <a href="/flight-history">Flight History</a>
        <a href="/manage-profile">Profile</a>
    </div>
</header>

<div class="banner-container">
    <img src="" alt="Plane">
    <h1>Welcome to the Airline Portal</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

<div class="flight-container">
    <div class="flight-details">Flight Details</div>
    <div class="flights">
    <table>
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
                <td><button action="/book">Book</button></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
</div>

<footer>@software engineering 2024</footer>