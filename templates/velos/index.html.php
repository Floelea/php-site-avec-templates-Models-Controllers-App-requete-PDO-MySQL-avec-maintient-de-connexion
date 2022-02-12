<?php    foreach ($velos as $velo) {   ?>

    <div class="mb-5">

            <h1>    <?=  $velo->getName() ?></h1>
            <h5>    <?=  $velo->getDescription() ?></h5>
            <img src="images/<?=  $velo->getImage() ?>" style="width:300px;"alt="">
            <h4> <?=  $velo->getPrice() ?> <sup>€</sup></h4>
            <a href="?type=velo&action=show&id=<?=  $velo->getId() ?>" class="btn btn-success">Voir ce vélo</a>

    </div>


    <?php    }    ?>
