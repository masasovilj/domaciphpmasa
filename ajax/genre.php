<?php

$genres[] = 'Action';
$genres[] = 'Horror';
$genres[] = 'Drama';
$genres[] = 'Thriller';
$genres[] = 'Western';
$genres[] = 'Science Fiction';
$genres[] = 'Comedy';
$genres[] = 'Romance';
$genres[] = 'Crime';
$genres[] = 'Musical';
$genres[] = 'Adventure';
$genres[] = 'Fantasy';
$genres[] = 'Documentary';
$genres[] = 'Narrative';
$genres[] = 'Indie';
$genres[] = 'Romantic comedy';
$genres[] = 'War';
$genres[] = 'History';

$query = $_REQUEST['query'];
$suggestion = "";  // responseText

if ($query !== "") {
    $query = strtolower($query);
    $length = strlen($query);

    foreach ($genres as $genre) {
        if (stristr($query, substr($genre, 0, $length))) {
            if ($suggestion == "") {
                $suggestion = $genre;
            } else {
                $suggestion .= ", $genre";
            }
        }
    }
}
if ($suggestion == "") {
    echo 'No suggestions';
} else {
    echo $suggestion;
}
