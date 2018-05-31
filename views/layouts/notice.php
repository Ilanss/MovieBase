<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 30.05.18
 * Time: 17:21
 */

if(isset($errors)){
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $errors; ?>
    </div>
    <?php
}

if(isset($notice)){
    ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $notice; ?>
    </div>
    <?php
}

if(isset($warning)){
    ?>
    <div class="alert alert-warning" role="alert">
        <?php echo $warning; ?>
    </div>
    <?php
}

if(isset($success)){
    ?>
    <div class="alert alert-success" role="alert">
        <?php echo $success; ?>
    </div>
    <?php
}