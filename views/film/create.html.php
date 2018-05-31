<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 18:02
 */

?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form method="post" action="<?php echo $base ?>/film/create" enctype="multipart/form-data">
                <?php require_once ('views/layouts/notice.php'); ?>
                <div class="form-group">
                    <label for="title">Nom du film</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Entrer le nom du film" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" accept=".png, .jpg, .jpeg" value="<?php echo isset($_POST['image']) ? $_POST['image'] : '' ?>">
                    <label class="custom-file-label" for="image">Choisir une image...</label>
                    <div class="invalid-feedback">Fichier invalide</div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?php echo isset($_POST['title']) ? $_POST['title'] : '' ?></textarea>
                </div>
                <?php
                if(isset($_POST['id'])){
                    ?>
                    <input type="hidden" value="<?php echo $_POST['id'];?>" name="id">
                    <button type="submit" id="submit" name="modify" class="btn btn-warning">Modifier le film </button>
                    <?php
                }
                else{
                    ?>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Ajouter le film </button>
                <?php } ?>
            </form>
        </div>
    </div>
</div>