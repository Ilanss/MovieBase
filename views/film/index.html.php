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
            <!-- Modal -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if(!empty($films)) {
                ?>
                <div class="row">
                <div class="col-auto justify-content-end">
                    <form action="<?php echo $_SESSION['root'] ?>/film/create" method="post">
                        <button type="submit" class="btn btn-primary" name="add" id="add">Ajouter un film</button>
                    </form>
                </div>
            </div>
                <?php
                foreach ($films as $film) {
                    ?>
                    <div class="row">
                        <div class="col-md-12 film">
                            <div class="row">
                                <div class="col-md-3 image"><img class="img-fluid" src="<?php
                                    if (empty($film->image)) {
                                        echo "assets/img/poster-placeholder.png";
                                    } else {
                                        echo $film->image;
                                    };
                                    ?>"></div>
                                <div class="col-md-7">
                                    <h1 class="title"><?php echo $film->title ?></h1>
                                    <p class="desc"><?php echo $film->description ?></p>
                                </div>
                                <div class="col-md-2">
                                    <?php
                                    if (!empty($_SESSION['login'])) {
                                        if ($film->list) {
                                            ?>
                                            <button type="submit" class="btn btn-outline-secondary pull-right disabled"
                                                    name="list"
                                                    id="submit">Déjà dans ma liste
                                            </button>
                                            <?php
                                            if ($film->vu) {
                                                ?>
                                                <button type="submit"
                                                        class="btn btn-outline-secondary pull-right disabled" name="vu"
                                                        id="submit">Déjà vu!
                                                </button>
                                                <?php
                                            } else {
                                                ?>
                                                <form action="<?php echo $_SESSION['root']; ?>/film/view" method="post">
                                                    <input type="hidden" value="<?php echo $film->id ?>" name="vu">
                                                    <button type="submit" class="btn btn-outline-primary pull-right"
                                                            id="submit">Film visionné
                                                    </button>
                                                </form>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <form action="<?php echo $_SESSION['root']; ?>/film/add" method="post">
                                                <input type="hidden" value="<?php echo $film->id; ?>" name="id">
                                                <button type="submit" class="btn btn-outline-primary pull-right"
                                                        name="list"
                                                        id="submit">Ajouter à ma liste
                                                </button>
                                            </form>
                                            <?php
                                        }

                                        if ($_SESSION['admin']) {
                                            ?>
                                            <form action="<?php echo $_SESSION['root'] ?>/film/modify" method="post">
                                                <input type="hidden" value="<?php echo $film->title ?>" name="title">
                                                <input type="hidden" value="<?php echo $film->image ?>" name="image">
                                                <input type="hidden" value="<?php echo $film->description ?>"
                                                       name="description">
                                                <input type="hidden" value="<?php echo $film->id ?>" name="id">
                                                <button type="submit" class="btn btn-outline-warning" name="modify"
                                                        id="submit">
                                                    Modifier le film
                                                </button>
                                            </form>
                                            <button type="button" class="btn btn-outline-danger" name="delete"
                                                    id="submit" data-toggle="modal" data-target="#delete">
                                                Supprimer le film
                                            </button>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
            }
            else{
                ?>
                <div class="row">
                    <div class="col text-center"><h1>Oups...</h1>Il n'y a pas de films à afficher...</div>
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