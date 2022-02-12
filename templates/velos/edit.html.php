<form action="?type=avis&action=edit" method="post">

        <input type="text" name="newInfo" value="<?= $avi->getContent()  ?>" id="">
        <button type="submit" name="id" value="<?= $avi->getId()  ?>">Modifier</button>

</form>