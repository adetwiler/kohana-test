<?php foreach ($msgs as $msg_type => $msgs_of_type): ?>
<?php
    foreach ($msgs_of_type as $msg):?>
    <div class="alert fade in alert-<?php echo $msg_type; ?>"><?php echo $msg;?> <a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <?php endforeach ?>
<?php endforeach ?>