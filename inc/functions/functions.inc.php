<?php // Filename: function.inc.php
function display_message()
{
    if (isset($_GET["message"])) {
        $message = $_GET["message"];
        echo '<div class="mt-4 alert alert-success" role="alert">';
        echo $message;
        echo '</div>';
    }
}

function display_letter_filters($filter)
{
    echo '<span class="d-inline-block mr-3">Filter by <strong>Last Name</strong></span> ';

    $letters = range('A', 'Z');

    for ($i = 0; $i < count($letters); $i++) {
        if ($filter == $letters[$i]) {
            $class = 'class="d-inline-block text-light font-weight-bold p-2 mr-3 bg-dark"';
        } else {
            $class = 'class="d-inline-block text-dark p-2 mr-5 bg-light border rounded"';
        }
        echo "<a $class href='?filter=$letters[$i]' title='Letter $letters[$i]'>$letters[$i]</a>";
    }
    echo '<a class="text-decoration-none bg-dark text-secondary p-2 mx-2 bg-primary text-light border rounded" href="?clearfilter" title="Reset Filter">Reset</a>&nbsp;&nbsp;';
}

function display_record_table($records)
{
    echo '<div class="table-responsive">';
    echo "<table class=\"table table-striped table-hover table-sm mt-3 table-bordered\">";
    echo '<thead class="table-dark"><tr><th class="bg-primary">Actions</th><th><a href="?sortby=student_id">Student ID</a></th><th><a href="?sortby=first_name">First Name</a></th><th><a href="?sortby=last_name">Last Name</a></th><th><a href="?sortby=email">Email</a></th><th><a href="?sortby=phone">Phone</a></th></thead>';

    foreach ($records as $row) {
        # display rows and columns of data
        echo '<tr>';
        echo "<td><a class='text-decoration-none' href=\"update-record.php?id={$row->id}\">Update</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class='text-decoration-none' href=\"delete-record.php?id={$row->id}\" onclick=\"return confirm('Are you sure?');\">Delete</a></td>";
        echo "<td>{$row->student_id}</td>";
        echo "<td><strong>{$row->first_name}</strong></td>";
        echo "<td><strong>{$row->last_name}</strong></td>";
        echo "<td>{$row->email}</td>";
        echo "<td>{$row->phone}</td>";
        echo '</tr>';
    } // end while
    echo '</table>';
    echo '</div>';
}

function display_error_bucket($error_bucket)
{
    echo '<div class="pt-4 alert alert-warning" role="alert">';
    echo '<p>The following errors were detected:</p>';
    echo '<ul>';
    foreach ($error_bucket as $text) {
        echo '<li>' . $text . '</li>';
    }
    echo '</ul>';
    echo '</div>';
    echo '<p>All of these fields are required. Please fill them in.</p>';
}

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER["REQUEST_URI"], ".php");
    if ($current_file_name == $requestUri)
        echo 'active';
}
