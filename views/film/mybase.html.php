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
        <div class="col-md-12">
            <?php require_once ('views/layouts/notice.php'); ?>
            <?php if(!empty($films)){?>
            <div class="row">
                <div class="col-auto justify-content-end">
                    <form action="<?php echo $_SESSION['root'] ?>/film/create" method="post">
                        <button type="submit" class="btn btn-primary" name="add" id="add">Ajouter un film</button>
                    </form>
                </div>
            </div>
            <?php
            foreach ($films as $film){
                ?>
                <div class="row">
                    <div class="col-md-12 film">
                        <div class="row">
                            <div class="col-md-3 image"><img class="img-fluid" src="<?php
                                if(empty($film->image)){
                                    echo "assets/img/poster-placeholder.png";
                                }
                                else{
                                    echo $film->image;
                                };
                                ?>"></div>
                            <div class="col-md-7">
                                <h1 class="title"><?php echo $film->title ?></h1>
                                <p class="desc"><?php echo $film->description ?></p>
                            </div>
                            <div class="col-md-2">
                                <form action="#" onsubmit="return validateFormOnSubmit(this);" method="post">
                                    <button type="submit" class="btn btn-outline-primary pull-right" name="vu"
                                            id="submit">Film visionné
                                    </button>
                                </form>
                                <?php

                                if($_SESSION['admin']) {
                                    ?>
                                    <form action="<?php echo $base ?>/film/modify" method="post">
                                        <button type="submit" class="btn btn-outline-warning" name="modify"
                                                id="submit">
                                            Modifier le film
                                        </button>
                                    </form>
                                    <form action="#" method="post">
                                        <button type="submit" class="btn btn-outline-danger" name="delete"
                                                id="submit">
                                            Supprimer le film
                                        </button>
                                    </form>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <?php
            }}
            else{
                ?>
                <div class="row">
                    <div class="col text-center"><h1>Oups...</h1>Vous n'avez pas encore ajouté de film à votre liste!</div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <form action="<?php echo $_SESSION['root'] ?>/film/create" method="post">
                            <button type="submit" class="btn btn-primary" name="add" id="add">Ajouter un film</button>
                        </form>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    function validateFormOnSubmit(theForm) {
        alert("It works!");
    }
</script>