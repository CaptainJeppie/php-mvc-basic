<?php
include __DIR__ . '/../header.php';
?>


    <section>
        <div class="container">
            <h2>Catalogue</h2>
            <div class="row">
                <?php
                foreach ($model as $product) {
                    ?>
                    <div class="col-md-4">
                        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                        <p><?= $product['name'] ?></p>
                        <p><small><?= $product['category'] ?></small></p>
                        <form action="../../scripts/OpenDetailPageScript.js" method="get">
                            <input type="hidden" name="act" value="run">
                            <input type="submit" value="View more">
                        </form>
                    </div>
                    <?php
                }
                ?>
            </div>
    </section>

<?php
include __DIR__ . '/../footer.php';
?>
<script type="/../../scripts/CreateCard.js"></script>
