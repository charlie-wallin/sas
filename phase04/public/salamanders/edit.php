<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 
$pageTitle = 'Edit Salamander';
$id = $_GET['id'];
// need to remove this line but right now it works.
$salamander = find_salamander_by_id($id);
if(is_post_request()) {
    $salamander = [];
    $salamander['id'] = $id;
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';
    update_salamander($salamander);
    redirect_to(url_for('salamanders/show.php?id=' . $id));
}
   else {
    $salamander = find_salamander_by_id($id);
   }
?>

<form action="<?= url_for('salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
<label for="name">
     <p>Name:<br> <input type="text" name="name" value="<?= h($salamander['name']); ?>"></p>
 </label>
 <label for="habitat">
     <p>Habitat: <br>
        <input type="text" size="50" maxlength="100" name="habitat" 
        value = "<?php echo trim(h($salamander['habitat'])); ?>">
    </p>
</label>
 <label for="description">
     <p>Description:<br>
     <input type="text" size="50" maxlength="100" name="description" 
        value = "<?php echo trim(h($salamander['description'])); ?>">
     </p>
 </label>
 <lable for="submit">
     <p><input type="submit" value="Edit Salamander"></p>
 </label>
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
