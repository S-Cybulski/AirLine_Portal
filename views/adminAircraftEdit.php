<div class="admin-header-container">
    <div class="admin-header">
        <a href="/admin/<?=$_SESSION['user_id']?>/passengers">Manage Passengers</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/flights">Manage Flights</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/aircraft">Manage Aircraft</a>
        <a href="/admin/<?=$_SESSION['user_id']?>/staff">Manage Staff</a>
    </div>
</div>

<h1>Edit Aircraft Record Id: <?=$data['Serial_Num']?></h1>

<?php if (isset($errors)): ?>
    <ul>
        <?php foreach ($errors as $field): ?>
            <?php foreach($field as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<form id="edit-form" method="POST" action="/admin/<?=$_SESSION['user_id']?>/aircraft/edit/<?=$data['Serial_Num']?>">
    <label for="serialNum">Serial Number:</label><br>
    <input type="number" id="serialNum" name="Serial_Num" value="<?= $data['Serial_Num'] ?>" readonly><br>
    <label for="manufacturer">Manufacturer:</label><br>
    <input type="text" id="manufacturer" name="Manufacturer" value="<?= $data['Manufacturer'] ?>"><br>
    <label for="model">Model:</label><br>
    <input type="text" id="model" name="Model" value="<?= $data['Model'] ?>"><br><br>
    <input type="hidden" name="aircraftId" value="<?= $data['Serial_Num'] ?>">
    <button type="submit">Save Changes</button>
</form>



<footer>@software engineering 2024</footer>