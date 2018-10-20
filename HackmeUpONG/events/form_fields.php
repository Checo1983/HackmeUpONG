<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($event)) {
    redirect_to(url_for('/staff/event/index.php'));
}
?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputName">Event Name</label>
        <input type="text" name="event[name]" value="<?php echo h($event->name); ?>" class="form-control" id="inputEventName" placeholder="Event Name"/>
    </div>
    <div class="form-group col-md-6">
        <label for="inputBirth">Event Date</label>
        <input type="date" name="event[date]" value="<?php echo h($event->date); ?>" class="form-control" id="inputEventDate" placeholder="Event Date"/>
    </div>
    <div class="form-group col-md-6">
        <label for="inputStartHour">Event Start Hour</label>
        <input type="time" name="event[start_hour]" value="<?php echo h($event->start_hour); ?>" class="form-control" id="inputStartHour" placeholder="Event Start Hour"/>
    </div>
    <div class="form-group col-md-6">
        <label for="inputEndHour">Event End Hour</label>
        <input type="time" name="event[end_hour]" value="<?php echo h($event->end_hour); ?>" class="form-control" id="inputEndHour" placeholder="Event End Hour"/>
    </div>
</div>