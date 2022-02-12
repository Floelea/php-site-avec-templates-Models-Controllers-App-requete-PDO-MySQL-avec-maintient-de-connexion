<form action="?type=velo&action=edit" method="post">

<div class="form-group">
        <label class="col-form-label mt-4" for="inputDefault">Renseignez votre nom de vélo</label>
        <input type="text" name="nomVelo" value="<?= $velo->getName()  ?>" class="form-control" placeholder="Nom" id="inputDefault">
</div>

<div class="form-group">
        <label class="col-form-label mt-4" for="inputDefault">Description du vélo</label>
        <input type="text" name="descriptionVelo" value="<?= $velo->getDescription()  ?>" class="form-control" placeholder="Description" id="inputDefault">
</div>


<div class="form-group">
        <label class="col-form-label mt-4" for="inputDefault">Inserez une photo</label>
        <input type="text" name="photoVelo" value="<?= $velo->getImage()  ?>" class="form-control" placeholder="URL photo" id="inputDefault">
</div>

<div class="form-group mb-3">
        <label for="exampleTextarea" class="form-label mt-4">Indiquez un prix</label>
        <textarea class="form-control" name="prixVelo" value="" placeholder="Prix" id="exampleTextarea" rows="3"><?= $velo->getPrice()  ?></textarea>
</div>


<button type="submit" name="id" value="<?= $velo->getId()  ?>" class="btn btn-primary" >Valider</button>




</form>