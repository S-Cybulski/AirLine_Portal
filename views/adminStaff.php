<div class="admin-header-container">
    <div class="admin-header">
        <a href="/admin/<?=$_SESSION['user_id']?>/passengers">Manage Passengers</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
    </div>
</div>

<h1>Staff View</h1>

<input type="text" id="searchInput" onkeyup="searchStaff()" placeholder="Search for staff by Last Name">

<table id="staffTable">
    <tr>
        <th>Employee Number</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Salary</th>
        <th>Type_Rating</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($data as $staff): ?>
        <tr>
            <td><?= $staff['EMP_Num'] ?></td>
            <td><?= $staff['Last_name'] ?></td>
            <td><?= $staff['First_name'] ?></td>
            <td><?= $staff['Address'] ?></td>
            <td><?= $staff['Phone_number'] ?></td>
            <td>$<?= $staff['Salary'] ?></td>
            <td><?= $staff['Type_rating']?></td>
            <td>
                <a href="/admin/<?=$_SESSION['user_id']?>/staff/view/<?=$staff['EMP_Num']?>">View</a>
                <a href="/admin/<?=$_SESSION['user_id']?>/staff/edit/<?=$staff['EMP_Num']?>">Edit</a>
                <form action="/admin/<?=$_SESSION['user_id']?>/staff/delete/<?=$staff['EMP_Num']?>" method="POST">
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<footer>@software engineering 2024</footer>
<script>
    var currentIndex = 0; // Keep track of the current index of the displayed record

    function searchFlight() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput2");
        filter = input.value.toUpperCase();
        table = document.getElementById("flightTable");
        tr = table.getElementsByTagName("tr");

        // Reset currentIndex when filtering
        currentIndex = 0;

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Search by Origin (index 1)
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    if (currentIndex === 0) {
                        tr[i].style.display = ""; // Show the first matching record
                    } else {
                        tr[i].style.display = "none"; // Hide other matching records
                    }
                    currentIndex++;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        // If no matches found, show the first record
        if (currentIndex === 0) {
            tr[1].style.display = "";
        }
    }

    function searchStaff() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("staffTable");
        tr = table.getElementsByTagName("tr");

        // Reset currentIndex when filtering
        currentIndex = 0;

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Search by Last Name (index 1)
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    if (currentIndex === 0) {
                        tr[i].style.display = ""; // Show the first matching record
                    } else {
                        tr[i].style.display = "none"; // Hide other matching records
                    }
                    currentIndex++;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        // If no matches found, show the first record
        if (currentIndex === 0) {
            tr[1].style.display = "";
        }
    }
</script>