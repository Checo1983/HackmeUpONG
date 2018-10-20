<?php
require_once('../../../private/initialize.php');
//require_login();

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/event/index.php'));
}
$id = $_GET['id'];
$event = Events::find_by_id($id);
if ($event == false) {
    redirect_to(url_for('/staff/event/index.php'));
}

if (is_post_request()) {

    // Save record using post parameters
    $args = $_POST['event'];
    $event->merge_attributes($args);
    $result = $event->save();

    if ($result === true) {
        $session->message('The event was updated successfully.');
        redirect_to(url_for('/staff/event/show.php?id=' . $id));
    } else {
        // show errors
    }
} else {

    // display the form
}
?>

<?php $page_title = 'Edit Event'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

    <a class="btn btn-dark" href="<?php echo url_for('/staff/event/index.php'); ?>">&laquo; Back to List</a>

    <div class="admin edit">
        <h1>Edit Admin</h1>

        <?php echo display_errors($event->errors); ?>

        <form action="<?php echo url_for('/staff/event/edit.php?id=' . h(u($id))); ?>" method="post">

            <?php include('form_fields.php'); ?>

            <div id="operations">
                <input type="submit" class="btn btn-success" value="Edit Event" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
