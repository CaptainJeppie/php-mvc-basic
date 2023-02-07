<?php
if ($_POST){
    if (isset($_POST['email']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['bikeID'])) {
        $email = $_POST['email'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $bikeID = $_POST['bikeID'];

        $bike = $this->catalogueService->getById($bikeID);

        $price = $bike['priceperday'] * (strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24);
        $price = $price + $bike['borg'];

        $this->catalogueService->rent($bike['id'], $email, $startDate, $endDate, $price);
        header('Location: /catalogue/thankyou');
    }
}
if (isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
    include __DIR__ . '/../adminheader.php';
}
else{
    include __DIR__ . '/../header.php';
}
$id = $_POST['act'];
$bike = $this->catalogueService->getById($id);
?>

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
