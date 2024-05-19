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

        <form id="staffForm" action="/admin/<?=$_SESSION['user_id']?>/assign-to-flight" method="POST">
            <label for="staffFilter">Filter Staff by Last Name:</label>
            <select id="staffFilter" name="empNum">
                <option value="">Select Staff</option>
                <?php foreach ($staffData as $staff): ?>
                    <option value="<?= $staff['EMP_Num'] ?>"><?php echo $staff['EMP_Num'] . " - " . $staff['Last_name'] . ", " . $staff['First_name'] ?></option>
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

            <input type="hidden" id="selectedEmpNum" name="EMP_Num" value="">
            <input type="hidden" id="selectedFlightNum" name="Flight_Num" value="">

            <button type="submit">Submit</button>
        </form>

        <h1>Assigned To Flight Table</h1>

        <!-- Add a search input field -->
        <input type="text" id="searchInput" placeholder="Search by Employee Number">

        <table id="assignedFlightsTable">
            <tr>
                <th>Employee Number</th>
                <th>Flight Number</th>
            </tr>
            <?php foreach ($assigned as $assign): ?>
                <tr>
                    <td><?= $assign['EMP_Num'] ?></td>
                    <td><?= $assign['Flight_Num'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        
    </div>
</div>

<footer>@software engineering 2024</footer>

<script>

    // Function to filter table rows based on search input
function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("assignedFlightsTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those that don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0]; // Change index to match the column you want to search
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

function showStaffDetails() {
    var staffSelect = document.getElementById("staffFilter");
    var selectedStaffId = staffSelect.value;
    document.getElementById("selectedEmpNum").value = selectedStaffId;

    var staffDetailsDiv = document.getElementById("staffDetails");
    staffDetailsDiv.innerHTML = ""; // Clear previous details

    if (selectedStaffId !== "") {
        var staff = <?= json_encode($staffData) ?>;
        for (var i = 0; i < staff.length; i++) {
            if (staff[i]['EMP_Num'] === selectedStaffId) {
                var detailsHTML = "<h3>Staff Details</h3>";
                detailsHTML += "<p><strong>Employee Number:</strong> " + staff[i]['EMP_Num'] + "</p>";
                detailsHTML += "<p><strong>Last Name:</strong> " + staff[i]['Last_name'] + "</p>";
                detailsHTML += "<p><strong>First Name:</strong> " + staff[i]['First_name'] + "</p>";
                staffDetailsDiv.innerHTML = detailsHTML;
                break; // Exit loop once staff member is found
            }
        }
    }
    showSelectedValues(); // Update selected values display when staff selection changes
}

function showFlightDetails() {
    var flightSelect = document.getElementById("flightFilter");
    var selectedFlightNum = flightSelect.value;
    document.getElementById("selectedFlightNum").value = selectedFlightNum;

    var flightDetailsDiv = document.getElementById("flightDetails");
    flightDetailsDiv.innerHTML = ""; // Clear previous details

    if (selectedFlightNum !== "") {
        var flights = <?= json_encode($flightData) ?>;
        for (var i = 0; i < flights.length; i++) {
            if (flights[i]['Flight_Num'] === selectedFlightNum) {
                var detailsHTML = "<h3>Flight Details</h3>";
                detailsHTML += "<p><strong>Flight Number:</strong> " + flights[i]['Flight_Num'] + "</p>";
                detailsHTML += "<p><strong>Origin:</strong> " + flights[i]['Origin'] + "</p>";
                detailsHTML += "<p><strong>Destination:</strong> " + flights[i]['Destination'] + "</p>";
                flightDetailsDiv.innerHTML = detailsHTML;
                break; // Exit loop once flight is found
            }
        }
    }
    showSelectedValues(); // Update selected values display when flight selection changes
}

function showSelectedValues() {
    var selectedEmpNum = document.getElementById("staffFilter").value;
    var selectedFlightNum = document.getElementById("flightFilter").value;
    
    document.getElementById("selectedEmpNumDisplay").textContent = "Selected Employee Number: " + selectedEmpNum;
    document.getElementById("selectedFlightNumDisplay").textContent = "Selected Flight Number: " + selectedFlightNum;
}

// Attach event listener to staff filter
document.getElementById("staffFilter").addEventListener("change", showStaffDetails);

// Attach event listener to flight filter
document.getElementById("flightFilter").addEventListener("change", showFlightDetails);

document.getElementById("searchInput").addEventListener("keyup", searchTable);

// Call the function initially to display default selected values
showSelectedValues();
</script>
