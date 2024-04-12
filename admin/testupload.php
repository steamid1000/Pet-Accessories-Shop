<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../db_scripts/login.php';

    //General details of the movie form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $price = $_POST['Ticket_price'];


        //Adding in the movies table
        $movieQuery = "INSERT INTO `movies`(`movie_name`, `status`, `start_date`, `end_date`) VALUES('$title','Active','$start_date','$end_date')";
        mysqli_query($conn, $movieQuery);
    

    //Getting the movie id to fill rest of the information
    $movieIdQuery = "SELECT `movie_id` from `movies` where movie_name='$title'";
    $movieIdfetched = $conn->query($movieIdQuery);
    $movieID = mysqli_fetch_array($movieIdfetched);
    $finalMovieID = $movieID[0];

    if (isset($_FILES['thumbnail'])) {
        //Uploading thumbnail and back-image
        $filename = $_FILES["thumbnail"]["name"];
        $tempname = $_FILES["thumbnail"]["tmp_name"];
        $folder = "../image/" . $filename;

        //Move and rename the image file
        if (move_uploaded_file($tempname, $folder)) {
            //renaming the files
            $exten = substr($filename, stripos($filename, '.'));
            $movieThumb = $title . 'thumb' . $exten;
            rename($folder, '../MovieImages/' . $movieThumb);
        }
            $movieInfoQuery = "INSERT INTO `movie_info`() VALUES('$finalMovieID','$movieThumb','$description','$price')";
            mysqli_query($conn, $movieInfoQuery);
        
        header('admin.php', true);
    } else {
        header('admin.php', true);
    }


}
