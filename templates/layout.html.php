<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/morph/bootstrap.min.css">
    <title><?= $pageTitle  ?></title>
</head>
<body>
    

<nav class="navbar navbar-expand-lg bg-primary text-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?type=velo&action=index">Vélos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

    </div>
    
    <!-- <a href="?type=cocktail&action=new"class="btn btn-success" >Créez votre cocktail</a>
    <a href="?type=info&action=index"class="btn btn-success" >Voir les infos</a>
    <a href="?type=info&action=new" class="btn btn-success">Créez votre info</a>
    <a href="?type=pizza&action=index" class="btn btn-success">Voir les pizzas</a>
    <a href="?type=pizza&action=new" class="btn btn-success">Créez votre pizza</a> -->
    <a href="?type=velo&action=new" class="btn btn-success">Créer un vélo</a>
    <a href="?type=user&action=signUp" class="btn btn-success">Créer votre compte</a>
    <a href="?type=user&action=signin" class="btn btn-success">Connectez vous</a>
    <a href="?type=user&action=signout" class="btn btn-success">Déconnexion</a>
</nav>


        <div class="alert alert-warning alert-dismissible fade <?php if($_GET['info']=='errSupp') { echo'show';} ?>" role="alert">
                <strong>Hey petit malin !    </strong>Vous tentez de supprimer un cocktain qui n'existe pas.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

            <div class="container mt-4">

         <?php     var_dump($_SESSION)  ?>

                    <?= $pageContent ?>


            </div>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>