<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
    include __DIR__ . '/../adminheader.php';
}
else{
    include __DIR__ . '/../header.php';
}?>


<?php
$id = $_POST['act'];
$model = $this->catalogueService->getById($id);
?>
    <h1>Detail page!</h1>
    <section>
        <div class="container">
            <div class="row" id="itemList">
                <div class="row">
                    <div class="col-md-6 col-xxl-4">

                        <img class="img-thumbnail" src="<?= $model['picture'] ?>" alt="fiets">
                        <p><?= $model['name'] ?></p>
                        <p><small>Category: <?= $model['category'] ?></small></p>
                        <p><?= $model['description'] ?></p>
                        <p>Price per day: €<?= $model['priceperday'] ?></p>
                        <p>Deposit: €<?= $model['borg'] ?></p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xxl-4">
                        <form action="rent" method="post">
                            <input type="hidden" name="act" value="<?= $model['id']?>">
                            <input type="submit" value="Rent bike">
                        </form>
                    </div>
    </section>


<?php
include __DIR__ . '/../footer.php';
?>