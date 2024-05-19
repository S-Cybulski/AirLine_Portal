<div class="admin-header-container">
    <div class="admin-header">
        <a href="/admin/<?=$_SESSION['user_id']?>/passengers">Manage Passengers</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
    </div>
</div>

<form id="staffForm" action="/admin/<?=$_SESSION['user_id']?>/assign-to-flight" method="POST">
    <label for="staffFilter">Filter Staff by Last Name:</label>
    <select id="staffFilter" name="empNum">
        <option value="">Select Staff</option>
        <?php foreach ($staffData as $staff): ?>
            <option value="<?= $staff['EMP_Num'] ?>"><?= $staff['Last_name'] ?>, <?= $staff['First_name'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="flightFilter">Filter Flights by Origin:</label>
    <select id="flightFilter" name="flightNum">
        <option value="">Select Flight</option>
        <?php foreach ($flightData as $flight): ?>
            <option value="<?= $flight['Flight_Num'] ?>"><?= $flight['Flight_Num'] ?> - <?= $flight['Origin'] ?> to <?= $flight['Destination'] ?></option>
        <?php endforeach; ?>
    </select>
    
    <div id="flightDetails">
        <!-- Flight details will be displayed here -->
    </div>
    <button type="submit">Submit</button>
</form>

<table id="assignedFlightsTable">
    <tr>
        <th>Employee Number</th>
        <th>Flight Number</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($assigned as $assign): ?>
        <tr>
            <td><?= $assign['EMP_Num'] ?></td>
            <td><?= $assign['Flight_Num'] ?></td>
            <td>
                <a href="/admin/<?= $_SESSION['user_id'] ?>/flights/view/<?= $assignment['Flight_Num'] ?>">View Flight</a>
                <!-- Add other actions if needed -->
            </td>
        </tr>
    <?php endforeach; ?>
</table>


<script>
    function showStaffDetails() {
        var staffSelect = document.getElementById("staffFilter");
        var selectedStaffId = staffSelect.value;
        var staffDetailsDiv = document.getElementById("staffDetails");
        staffDetailsDiv.innerHTML = ""; // Clear previous details
        if (selectedStaffId !== "") {
            var staff = <?= json_encode($staffData) ?>.find(function(staff) {
                return staff['EMP_Num'] === selectedStaffId;
            });
            var detailsHTML = "<h3>Staff Details</h3>";
            detailsHTML += "<p><strong>Employee Number:</strong> " + staff['EMP_Num'] + "</p>";
            detailsHTML += "<p><strong>Last Name:</strong> " + staff['Last_name'] + "</p>";
            detailsHTML += "<p><strong>First Name:</strong> " + staff['First_name'] + "</p>";
            detailsHTML += "<p><strong>Address:</strong> " + staff['Address'] + "</p>";
            detailsHTML += "<p><strong>Phone Number:</strong> " + staff['Phone_number'] + "</p>";
            detailsHTML += "<p><strong>Salary:</strong> $" + staff['Salary'] + "</p>";
            detailsHTML += "<p><strong>Type Rating:</strong> " + staff['Type_rating'] + "</p>";
            staffDetailsDiv.innerHTML = detailsHTML;
        }
    }

    function showFlightDetails() {
        var flightSelect = document.getElementById("flightFilter");
        var selectedFlightNum = flightSelect.value;
        var flightDetailsDiv = document.getElementById("flightDetails");
        flightDetailsDiv.innerHTML = ""; // Clear previous details
        if (selectedFlightNum !== "") {
            var flight = <?= json_encode($flightData) ?>.find(function(flight) {
                return flight['Flight_Num'] === selectedFlightNum;
            });
            var detailsHTML = "<h3>Flight Details</h3>";
            detailsHTML += "<p><strong>Flight Number:</strong> " + flight['Flight_Num'] + "</p>";
            detailsHTML += "<p><strong>Origin:</strong> " + flight['Origin'] + "</p>";
            detailsHTML += "<p><strong>Destination:</strong> " + flight['Destination'] + "</p>";
            detailsHTML += "<p><strong>Date:</strong> " + flight['Date'] + "</p>";
            detailsHTML += "<p><strong>Arrival Time:</strong> " + flight['Arrival_time'] + "</p>";
            detailsHTML += "<p><strong>Intermediary City:</strong> " + (flight['Intermediary_City'] || "None") + "</p>";
            detailsHTML += "<p><strong>Departure Time:</strong> " + flight['Departure_time'] + "</p>";
            flightDetailsDiv.innerHTML = detailsHTML;
        }
    }
</script>
