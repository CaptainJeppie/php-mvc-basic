<?php
if ($_POST) {
    if (isset($_POST['edit']) && isset($_POST['availability']) && isset($_POST['name']) && isset($_POST['category']) && isset($_POST['description']) && isset($_POST['picture']) && isset($_POST['borg']) && isset($_POST['priceperday'])) {
        $name = $_POST['name'];
        $availability = $_POST['availability'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $picture = $_POST['picture'];
        $borg = $_POST['borg'];
        $priceperday = $_POST['priceperday'];
        $bikeId = $_POST['edit'];

        $this->catalogueService->editBicycle($bikeId, $name, $availability, $category, $description, $picture, $borg, $priceperday);
        header('Location: /admin/Bicycles');
    }
}
$bikeId = $_POST['edit'];
$model = $this->catalogueService->getById($bikeId);

include __DIR__ . '/../adminheader.php';
?>

<h2>Edit Bicycle</h2>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?= $model['name'] ?>" required>
    <br>
    <label for="availability">Availability:</label>
    <input type="number" name="availability" value="<?= $model['isAvailable'] ?>" required>
    <br>
    <label for="category">Category:</label>
    <input type="text" name="category" value="<?= $model['category'] ?>" required>
    <br>
    <label for="description">Description:</label>
    <input type="text" name="description" value="<?= $model['description'] ?>" required>
    <br>
    <label for="picture">Picture link:</label>
    <input type="text" name="picture" value="<?= $model['picture'] ?>" required>
    <br>
    <label for="borg">Deposit:</label>
    <input type="text" name="borg" value="<?= $model['borg'] ?>" required>
    <br>
    <label for="priceperday">Price per day:</label>
    <input type="text" name="priceperday" value="<?= $model['priceperday'] ?>" required>
    <br>
    <br>
    <input type="submit" name="add" value="Edit Bicycle">
    <input type="hidden" id="id" name="edit" value="<?= $model['id'] ?>">
</form>


<?php
include __DIR__ . '/../footer.php';
?>
