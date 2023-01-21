<?php


class Show
{
    public $id;
    public $userid;
    public $title;
    public $director;
    public $leading_actor;
    public $year;
    public $genre;
    public $created_at;

    public function __construct(
        $id,
        $userid,
        $title,
        $director,
        $leading_actor,
        $year,
        $genre,
        $created_at
    ) {
        $this->id = $id;
        $this->userid = $userid;
        $this->title = $title;
        $this->director = $director;
        $this->leading_actor = $leading_actor;
        $this->year = $year;
        $this->genre = $genre;
        $this->created_at = $created_at;
    }

    public function createShow()
    {
        $host = 'localhost';
        $user = 'admin';
        $password = 'admin';
        $database = 'tvshows';
        $conn = mysqli_connect($host, $user, $password, $database);

        $query = "INSERT INTO tvshow(userid, title, director, leading_actor,
            year, genre)  VALUES($this->userid, '$this->title',
            '$this->director', '$this->leading_actor' , '$this->year'
            , '$this->genre')";

        if (mysqli_query($conn, $query)) {
            header('Location: index.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
