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
    <style>
        .container{
            min-height: 82vh;;
        }
    </style>
</head>

<body>
    <?php include("partials/_dbconnect.php");?>
    <?php include("partials/_header.php");?>
    


    <div class="container my-3">
        <h1>Search result for <em>"<?php echo $_GET['search'];?>"</em></h1>
        <?php
        $noResults = true;
        $query = $_GET["search"];
        $sql = "SELECT * FROM `threads` where match (thread_title, thread_desc) against ('$query')";
        $result = mysqli_query($conn,$sql);

            while($row = mysqli_fetch_assoc($result)){
                $title = $row['thread_title'];
                $noResults = false;
                $desc = $row['thread_desc'];
                $thread_id = $row['thread_id'];
                $url = "/thread.php?threadid=".$thread_id;

                echo '<div class="result">
                        <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
                        <p>'.$desc.'</p>
                </div>';
            }
            if($noResults){
                echo '<div class="jumbotron mt-4">
                <h1 class="display-4">No results found</h1>
                <hr class="my-4">
                <p class="lead"> Suggestions:
                <ul>
                    <li>Make sure that all words are spelled correctly.</li>
                    <li>Try different keywords.</li>
                    <li>Try more general keywords.</li>
                    <ul>
                </p>
                
    
            </div>';
            }
        ?>

        <!-- just for reference  -->
        <!-- <div class="result">
            <h3><a href="" class="text-dark">Can not install pyaudio.</a></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum libero obcaecati recusandae veniam doloremque vitae nobis quia impedit, velit magnam quae officia necessitatibus odio illum et hic! Dolore, ducimus assumenda impedit voluptatibus autem omnis laboriosam.</p>
        </div> -->
        
        
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