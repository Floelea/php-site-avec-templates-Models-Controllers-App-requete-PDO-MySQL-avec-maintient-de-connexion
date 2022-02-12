<div class="mb-5">
           
            <h1>    <?=  $velo->getName() ?></h1>
            <h5>    <?=  $velo->getDescription() ?></h5>
            <img src="images/<?=  $velo->getImage() ?>" style="width:300px;"alt="">
            <h4> <?=  $velo->getPrice() ?> <sup>€</sup></h4>

            <?php  if( \Models\User::getUser() == $velo->getAuthor()){ ?>   
                       
                        <form action="?type=velo&action=delete" method="post">

                                <button type="submit" name="id" value="<?= $velo->getId()  ?>" class="btn btn-danger">Supprimer ce vélo</button>

                        </form>    

                        <a href="?type=velo&action=edit&id=<?= $velo->getId()  ?>" class="btn btn-success ms-3">Modifier</a>
                <?php } ?>
</div>


<?php if(\Models\User::getUser()){ ?>

<form action="?type=avis&action=new" method="post" class="mb-5">

        

        <div class="form-group mb-3">
                <label class="col-form-label mt-4" for="inputDefault">Votre Commentaire</label>
                <input type="text" name="contentAvis" class="form-control" placeholder="Commentaire" id="inputDefault">
        </div>



        <button type="submit" class="btn btn-primary" name="veloId" value="<?=   $velo->getId()   ?>">Valider</button>


</form>
<?php }else{ ?>   
    
    <h2>Connectez vous pour commenter   </h2>
    <a href="?type=user&action=signin" class="btn btn-primary">sign in</a>
    <?php } ?>
<h4 class="mb-5">Vos commentaires</h4>

            
            <?php   foreach ($velo->getAvis() as $avi) {   ?>

            <div class="mb-5">
            <h3>  <?=   $avi->getAuthor()->getDisplay_name()  ?>   </h3>
            <p>     <?=   $avi->getContent()  ?>   </p>
                
            <div class="d-flex">
                    <form action="?type=avis&action=erase" method="post">

                                <button type="submit" name="id" value="<?=   $avi->getId()  ?>" class="btn btn-danger">Supprimer</button>

                    </form>

                    <a href="?type=avis&action=edit&id=<?=   $avi->getId()  ?>" class="btn btn-success ms-3">Modifier</a>
            </div>
            </div>    
            <?php    }    ?>

    


