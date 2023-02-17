<section>
    <div class="container">
        <h2>Catalogue</h2>
        <div class="row" id="itemList">
            <?php
            /** @var Array $model */
            foreach ($model as $product) {
                ?>
                <div class="col-md-6 col-xxl-4">
                    <div class="card">
                        <div class="card-body">
                            <img class="img-thumbnail" src="<?= $product['picture'] ?>" alt="fiets">
                            <p><?= $product['name'] ?></p>
                            <form action="catalogue/detail" method="post">
                                <input type="hidden" name="act" value="<?= $product['id']?>">
                                <input type="submit" value="View more">
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
</section>

<?php
include __DIR__ . '/../footer.php';
?>
