<?php

$directors[] = 'Mark Mylod';
$directors[] = 'Alex Graves';
$directors[] = 'David Nutter';
$directors[] = 'Vince Gilligan';
$directors[] = 'Bill Dubuque';
$directors[] = 'Matt Duffer';


$query = $_REQUEST['query'];
$suggestion = "";  // responseText

if ($query !== "") {
    $query = strtolower($query);
    $length = strlen($query);

    foreach ($directors as $director) {
        if (stristr($query, substr($director, 0, $length))) {
            if ($suggestion == "") {
                $suggestion = $director;
            } else {
                $suggestion .= ", $director";
            }
        }
    }
}
if ($suggestion == "") {
    echo 'No suggestions';
} else {
    echo $suggestion;
}
