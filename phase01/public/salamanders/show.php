<?php require_once('../../private/initialize.php'); 

// fancy if...else

if(!empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 1;
}
$id = $_GET['id'] ?? '1'; 
$page_title = 'Salamander Details';
include(SHARED_PATH . '/salamander-header.php'); 

?>

<h2>Salamander Details</h2>
<p> Page ID: <?= h($id); ?></p>
<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
