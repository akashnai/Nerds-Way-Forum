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

    <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE `category_id`=$id";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];
        }
    ?>

    <?php
        $showAlert=false;
        $method = $_SERVER['REQUEST_METHOD']; 
        if($method == 'POST'){
            //Insert thread into db
            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];
            $sno = $_POST['sno'];
            
            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ('$th_title', '$th_desc', '$id', '$sno')";
            $result = mysqli_query($conn,$sql);
            $showAlert=true;
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!!</strong> Your thread has been added! Please wait for community to respond.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>                
                ';
            }
        }
    ?>


<!-- category container starts here  -->
<div class="container my-4">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to <?php echo $catname ?> Forums</h1>
        <p class="lead"><?php echo $catdesc; ?></p>
        <hr class="my-4">
        <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums. Do not post
            copyright-infringing material. Do not post “offensive” posts, links or images.
            Do not cross post questions. Do not PM users asking for help.
            Remain respectful of other members at all times.</p>
        </div>
    </div>
    
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo '<div class="container">
        <h1 class="pb-2">Start a Discussion</h1> 
        <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
        <div class="form-group">
        <label for="exampleInputEmail1">Problem title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Keep your title as short as possible.</small>
        </div>
        <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Describe your problem</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success mb-4">Submit</button>
        </form>
        </div>';
    }
    else{
        echo '<div class="container">
        <h1 class="my-2">Start a Discussion</h1> 
        <p class="lead ">You are not logged in! Please log in to be able to start the discussion.</p>
        </div>';
    }
        ?>

    <div class="container mb-5">
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE `thread_cat_id`=$id";
                $result = mysqli_query($conn,$sql);
                $noResult = true;
                while($row = mysqli_fetch_assoc($result)){
                    $noResult = false;
                    $id = $row['thread_id'];
                    $title = $row['thread_title']; 
            $title = str_replace("<", "&lt;", $title);
            $title = str_replace(">", "&gt;", $title);
                   
            $desc = $row['thread_desc'];
            $desc = str_replace("<", "&lt;", $desc);
            $desc = str_replace(">", "&gt;", $desc);
                    $thread_time = $row['timestamp'];
                    $thread_user_id = $row['thread_user_id'];
                    $sql2 = "SELECT user_email FROM `users` WHERE `sno`='$thread_user_id'";
                    $result2 = mysqli_query($conn,$sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    

            echo '<div class="media my-3">
                <img class="mr-3" width="40px" src="images/userdefault.png" alt="Generic placeholder image">
                <div class="media-body">
                <p class="font-weight-bold my-0"> Asked By: '. $row2['user_email']. ' at '. $thread_time. ' </p>
                <h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid='.$id.'">'.$title.'</a></h5>    
                '.$desc.'
            </div>
        </div>';
                }
            if($noResult){
                echo '<div class="jumbotron mb-5 jumbotron-fluid">
                <div class="container">
                  <p class="display-4">No results found</p>
                  <p class="lead">Be the first one to ask the question.</p>
                </div>
              </div>';
            }
        ?>

    </div>



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