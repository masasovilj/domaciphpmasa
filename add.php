<?php

include('config/db_connect.php');
include('models/Show.php');


$title = $director = $leading_actor = $year = $genre = '';

$errors = [
    'title' => '', 'director' => '', 'leading_actor' => '',
    'year' => '', 'genre' => ''
];

if (isset($_POST['add'])) {

    if (empty($_POST['title'])) {
        $errors['title'] = 'Title is required!';
    } else {
        $title = $_POST['title'];
    }

    if (empty($_POST['director'])) {
        $errors['director'] = 'Director is required!';
    } else {
        $director = $_POST['director'];
    }

    if (empty($_POST['leading_actor'])) {
        $errors['leading_actor'] = 'Leading actor is required!';
    } else {
        $leading_actor = $_POST['leading_actor'];
    }

    if (empty($_POST['year'])) {
        $errors['year'] = 'Year is required!';
    } else {
        $yearStr = $_POST['year'];
        // gledamo da li unos ima 4 cifre
        // i gledamo da li je unesen broj, ako nije unesen broj intval vraća 1
        // intval ~= strtoint
        if (strlen($yearStr) != 4 || intval($yearStr) == 1) {
            $errors['year'] = 'Wrong input for year!';
        } else {
            $year = intval($yearStr);
            // date("Y") trenutna godina
            if ($year < 1928 || $year > date("Y")) {
                $errors['year'] = 'Wrong input for year!';
            }
        }
    }

    if (empty($_POST['genre'])) {
        $errors['genre'] = 'Genre is required!';
    } else {
        $genre = $_POST['genre'];
    }

    if (!array_filter($errors)) {
        $title = $_POST['title'];
        $director = $_POST['director'];
        $leading_actor = $_POST['leading_actor'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];

        $newShow = new Show(
            null,
            $userid,
            $title,
            $director,
            $leading_actor,
            $year,
            $genre,
            null
        );

        $newShow->createShow();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container">
    <h4 class="center">Post a TV show</h4>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="white form" method="POST">
        <label for="title">Movie title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text"><?php echo $errors['title']; ?></div>

        <label for="director">Director:</label>
        <input type="text" name="director" value="<?php echo htmlspecialchars($director) ?>" onkeyup="suggestDirector(this.value)">
        <div class="red-text"><?php echo $errors['director']; ?></div>
        <p><span id="directorSuggest"></span></p>

        <label for="leading_actor">Leading actor:</label>
        <input type="text" name="leading_actor" value="<?php echo htmlspecialchars($leading_actor) ?>" onkeyup="suggestLeadingActor(this.value)">
        <div class="red-text"><?php echo $errors['leading_actor']; ?></div>
        <p><span id="leadingActorSuggest"></span></p>

        <label for="year">Year of release:</label>
        <input type="text" name="year" value="<?php echo htmlspecialchars($year) ?>">
        <div class="red-text"><?php echo $errors['year']; ?></div>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" value="<?php echo htmlspecialchars($genre) ?>" onkeyup="suggestGenre(this.value)">
        <div class="red-text"><?php echo $errors['genre']; ?></div>
        <p><span id="genreSuggest"></span></p>

        <input type="hidden" name="userid" value="<?php echo $loggedId; ?>">

        <div class="center">
            <input type="submit" name="add" value="Post a tv show" class="btn cyan darken-2 z-depth-0">
        </div>
    </form>


</section>

<?php include('templates/footer.php'); ?>

<script>
    function suggestDirector(str = "") {
        if (str.length == 0) {
            document.getElementById("directorSuggest").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("directorSuggest").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/directors.php?query=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<script>
    function suggestLeadingActor(str = "") {
        if (str.length == 0) {
            document.getElementById("leadingActorSuggest").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("leadingActorSuggest").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/actors.php?query=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<script>
    function suggestGenre(str = "") {
        if (str.length == 0) {
            document.getElementById("genreSuggest").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("genreSuggest").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/genre.php?query=" + str, true);
            xmlhttp.send();
        }
    }
</script>

</html>