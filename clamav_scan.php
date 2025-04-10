<?php

function scanFileWithClamAV($filepath) {
    $cmd = "clamscan " . escapeshellarg($filepath);
    $output = shell_exec($cmd);

    if(strpos($output, "OK") !== false) {
        return true;
    } else {
        return false;
    }
}

?>