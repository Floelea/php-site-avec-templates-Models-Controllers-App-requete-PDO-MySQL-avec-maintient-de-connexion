
<form action="?type=velo&action=new" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label class="col-form-label mt-4" for="inputDefault">Renseignez votre nom de vélo</label>
        <input type="text" name="nomVelo" class="form-control" placeholder="Nom" id="inputDefault">
</div>

<div class="form-group">
        <label class="col-form-label mt-4" for="inputDefault">Description du vélo</label>
        <input type="text" name="descriptionVelo" class="form-control" placeholder="Description" id="inputDefault">
</div>


<div class="form-group">
        <label class="col-form-label mt-4" for="inputDefault">Inserez une photo</label>
        <input type="file" name="photoVelo" class="form-control" placeholder="URL photo" id="inputDefault">
</div>

<div class="form-group mb-3">
        <label for="exampleTextarea" class="form-label mt-4">Indiquez un prix</label>
        <textarea class="form-control" name="prixVelo" placeholder="Prix" id="exampleTextarea" rows="3"></textarea>
</div>


<button type="submit" class="btn btn-primary" >Valider</button>




</form>