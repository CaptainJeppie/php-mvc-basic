<h1>Renting page!</h1>

<form method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <br>
    <label for="phoneNumber">Phone number:</label>
    <input type="text" name="phoneNumber" required>
    <br>

    <label for="startDate">Start date:</label>
    <input type="date" name="startDate"
           value="<?= date_format(date_create('now', timezone_open('Europe/Amsterdam')), 'Y-m-d'); ?>"
           min="<?= date_format(date_create('now', timezone_open('Europe/Amsterdam')), 'Y-m-d'); ?>"
           max="2023-12-31">
    <br>
    <label for="endDate">End date:</label>
    <input type="date" name="endDate"
           value="<?= date_format(date_create('now', timezone_open('Europe/Amsterdam')), 'Y-m-d'); ?>"
           min="<?= date_format(date_create('now', timezone_open('Europe/Amsterdam')), 'Y-m-d'); ?>"
           max="2023-12-31">
    <br>
    <input type="hidden" name="bikeID" value="<?= $bike['id']?>">
    <input type="submit" name="act" value="Rent Bike">
</form>
<?php


include __DIR__ . '/../footer.php';
?>
