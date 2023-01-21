<?php

$actors[] = 'Emily Clarke';
$actors[] = 'Kit Harrington';
$actors[] = 'Bryan Cranston';
$actors[] = 'Aaron Paul';
$actors[] = 'Bob Odenkirk';
$actors[] = 'Jason Bateman';
$actors[] = 'Millie Bobbie Brown';


$query = $_REQUEST['query'];
$suggestion = "";  // responseText

if ($query !== "") {
    $query = strtolower($query);
    $length = strlen($query);

    foreach ($actors as $actor) {
        if (stristr($query, substr($actor, 0, $length))) {
            if ($suggestion == "") {
                $suggestion = $actor;
            } else {
                $suggestion .= ", $actor";
            }
        }
    }
}
if ($suggestion == "") {
    echo 'No suggestions';
} else {
    echo $suggestion;
}
