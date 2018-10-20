<?php
require_once('../../../private/initialize.php');
//require_login();

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/event/index.php'));
}
$id = $_GET['id'];
$event = Events::find_by_id($id);
if ($admin == false) {
    redirect_to(url_for('/staff/event/index.php'));
}

if (is_post_request()) {

    // Delete admin
    $result = $event->delete();
    $session->message('The event was deleted successfully.');
    redirect_to(url_for('/staff/event/index.php'));
} else {
    // Display form
}
?>

<?php $page_title = 'Delete Event'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

    <a class="btn btn-dark" href="<?php echo url_for('/staff/event/index.php'); ?>">&laquo; Back to List</a>

    <div class="user delete">
        <h1>Delete Event</h1>
        <p>Are you sure you want to delete this event?</p>
        <p class="item"><?php echo h($event->full_name()); ?></p>

        <form action="<?php echo url_for('/staff/event/delete.php?id=' . h(u($id))); ?>" method="post">
            <div id="operations">
                <input type="submit" class="btn btn-danger" name="commit" value="Delete Event" />
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
