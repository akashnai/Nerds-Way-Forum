<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Nerd's way - Forum for Nerds</title>
</head>

<body>
    <?php include("partials/_dbconnect.php");?>
    <?php include("partials/_header.php");?>
    <!-- Slider starts here  -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/slider-1.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/slider-2.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/slider-3.jfif" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Category container starts here  -->

    <div class="container my-3">
        <h2 class="text-center my-3">Nerd's Way - Browse Categories</h2>
        <div class="row my-3">
            <!-- fetch all the categories  -->
            <!-- use a loop to fetch all the categories  -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn,$sql);

            while($row = mysqli_fetch_assoc($result)){
              // echo $row['category_id'];
              // echo $row['category_name'];
              $id = $row['category_id'];
              $cat = $row['category_name'];
              $desc = $row['category_description'];
              
              echo '
              <div class="col md-4 my-2">
                  <div class="card" style="width: 18rem;">
                      
                      <img src="images/card-'.$id.'.jfif" class="card-img-top" alt="...">
                      <div class="card-body">
                      <h5 class="card-title"> <a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
                      <p class="card-text">' .substr($desc,0,100).'...</p>
                      <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                      </div>
                      </div>
                      </div>';
                    }
                    ?>
        </div>
    </div>

    <!-- testing  -->
    <!-- <img src="images/card-'.$id.'.jfif" class="card-img-top" alt="..."> -->
    <!-- https://source.unsplash.com/1600x900/?nature,water -->

    <?php include("partials/_footer.php");?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>