<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<?php
session_start();
//$_SESSION[] = '';
//session_destroy();
if(empty($_SESSION['login']))
{
    header('Location: /login.php');
}
$cooks = [];
if(!empty($_GET['add_to_cart'])){
    $idBuy = $_GET['add_to_cart'];
    if(empty($_SESSION['cookies'])){
        $_SESSION['cookies'] = [];
    }
    if(array_key_exists($idBuy, $catalog)){
        $_SESSION['cookies'][$idBuy] = $catalog[$idBuy];
    }
}
?>
<section class="cookies container-fluid">
    <div class="row">
        <?php if (!empty($_SESSION['cookies'])){
            foreach ($_SESSION['cookies'] as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                    </figcaption>
                </figure>
            </div>
            </div>
        <?php }}else{
            echo "Empty card";
        } ?>

    </div>
    <div>
        <a href="/index.php" class="btn btn-primary">
            <spa aria-hidden="true">keep buying</spa>
        </a>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
