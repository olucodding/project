<?php

include 'config.php';
// Name of the data file

$filename = 'users.sql';
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));

$tempRow = '';

// Reading the data file
$rows = file($handle);


// Loop through each row
foreach ($rows as $row) {
    // Skip it if it's a comment
    if (substr($row, 0, 2) == '--' || $row == '')
        continue;

    // Add this row to the current segment
    $tempRow .= $row;

    // check the end of one query
    if (substr(trim($row), -1, 1) == ';') {
        // Perform the query
        mysqli_query($conn, $tempRow);

        // Reset temp variable to empty
        $tempRow = '';

    }
    echo $contents;
    fclose($handle);
}
echo "Tables imported successfully";
?>