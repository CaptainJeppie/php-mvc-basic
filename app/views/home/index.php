<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
    include __DIR__ . '/../adminheader.php';
}
else{
    include __DIR__ . '/../header.php';
}
?>

    <h2>Welcome to VenJ-Bike Rentals</h2>
    <p>We offer a wide range of bikes for rent, from mountain bikes to road bikes to beach cruisers. Whether you're looking to hit the trails, explore the city, or take a leisurely ride along the beach, we've got you covered.</p>
    <h2>Featured bikes:</h2>
    <ul>
        <li>Mountain bikes</li>
        <li>Electric bikes</li>
    </ul>


<?php
include __DIR__ . '/../footer.php';
