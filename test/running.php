<?php
ignore_user_abort(true);
set_time_limit(0);
$data = file_get_contents('filename.txt');
while (!file_exists('stop.txt')) {
    // Add 1 to $data
    $data = $data+1;
    // Update file
    file_put_contents('../test/update.txt', $data);

    // Wait 4 seconds
    sleep(4);
}
?>