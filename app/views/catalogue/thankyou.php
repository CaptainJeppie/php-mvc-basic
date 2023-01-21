<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
    include __DIR__ . '/../adminheader.php';
}
else{
    include __DIR__ . '/../header.php';
}
?>
    <h1>Thank you for renting</h1>

<?php
include __DIR__ . '/../footer.php';
?>
