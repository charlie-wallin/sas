<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 

if(is_post_request()) {
    $salamander = [];
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';

    $result = insert_salamander($salamander);
    if($result === true) {
        $newID = mysqli_insert_id($db);
        redirect_to(url_for('salamanders/show.php?id=' . $newID  ));
    } else {
        $errors = $result;
    }
}

// First time in using GET and show the form

$pageTitle = 'Create Salamander'; ?>

    <h1>Create Salamander</h1>
    <?= display_errors($errors); ?>
    <form action="<?= url_for('salamanders/new.php'); ?>" method="post">
    <label for="name">
        <p>Name:<br> <input type="text" name="name" value="<?= h($salamander['name']); ?>"></p>
    </label>
    <label for="habitat">
        <p>Habitat: <br>
            <textarea rows="4" cols="50" name="habitat" value=""><?= h($salamander['habitat']); ?></textarea>
        </p>
    </label>
    <label for="description">
        <p>Description:<br>
            <textarea rows="4" cols="50" name="description" value=""><?= h($salamander['description']); ?></textarea> 
        </p>
    </label>
    <lable for="submit">
        <p><input type="submit" value="Create Salamander"></p>
    </label>
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
