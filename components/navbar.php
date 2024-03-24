<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .navbar {
            padding-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: orange;

        }

        .navbar-nav button {
            border-radius: 2rem;
            font-size: 1rem;
        }

        .collapse {
            align-items: center;
            justify-content: space-around;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <a class="navbar-brand" href="../newindex.php"><span style="font-size: larger; font-weight: 900;">🐶Happy
                Biengs😸</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-5 " id="navbarNav">
            <ul class="navbar-nav" style="font-size: 1.2rem; font-weight: 600;">
                <li class="nav-item mr-4">
                    <a class="nav-link" href="../../Pet-Accessories-Shop/newindex.php">Home</a>
                </li>
                <li class="nav-item mr-4">
                    <a class="nav-link" href="../../Pet-Accessories-Shop/pages/feedback.php">Feedback</a>
                </li>
                <li class="nav-item mr-4">
                    <a class="nav-link" href="../../Pet-Accessories-Shop/pages/about.php">About Us</a>
                </li>

            </ul>
        </div>



        <ul class="navbar-nav ">
            <li class="nav-item  mr-3">
                <?php if (!strpos($_SERVER["REQUEST_URI"], "login.php")) {
                ?>
                    <a href="../../Pet-Accessories-Shop/pages/login.php"><button type="button" class="btn btn-info">Login</button></a>
                <?php  } else { ?>
                    <i class="fas fa-dragon">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </i>
                <?php } ?>
            </li>
            <?php if (!strpos($_SERVER["REQUEST_URI"], "signup.php")) {
                ?>
            <li class="nav-item mr-4">
                <button type="button" class="btn btn-warning">Sign Up</button>
              <?php }  ?>
            </li>


        </ul>




    </nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>