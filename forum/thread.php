<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Nerd's way - Forum for Nerds</title>
</head>
<body>
    <?php include("partials/_dbconnect.php");?>
    <?php include("partials/_header.php");?>

    <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE `thread_id`=$id";
            $result = mysqli_query($conn,$sql);

            while($row = mysqli_fetch_assoc($result)){
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $thread_user_id = $row['thread_user_id'];

                // query the users table to find out the name of OP(original poster)
                $sql2 = "SELECT user_email FROM `users` WHERE `sno`='$thread_user_id'";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $posted_by = $row2['user_email'];
                // echo $posted_by;
            }
    ?>

    <?php
        $showAlert=false;
        $method = $_SERVER['REQUEST_METHOD']; 
        if($method == 'POST'){
            //Insert thread into db
            $comment = $_POST['comment'];
            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace(">", "&gt;", $comment);
            $sno = $_POST['sno'];
            
            $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`) VALUES ('$comment', '$id', '$sno')";
            $result = mysqli_query($conn,$sql);
            
            $showAlert=true;
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!!</strong> Your comment has been added!
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
            <h1 class="display-4"><?php echo $title ?></h1>
            <hr class="my-4">
            <p class="lead"><?php echo $desc; ?></p>
            <!-- <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums. Do not post
                copyright-infringing material. Do not post “offensive” posts, links or images.
                Do not cross post questions. Do not PM users asking for help.
                Remain respectful of other members at all times.</p> -->
            <p>Posted by:<b><?php echo $posted_by; ?></b></p>
            

        </div>
    </div>

    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo '
        <div class="container ">
            <h1 class="pb-2">Post a comment</h1>
            <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
                <div class="form-group ">
                    <label for="exampleFormControlTextarea1">Type your comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
                </div>
                <button type="submit" class="btn btn-success mb-4">Post Comment</button>
            </form>';
    }
    else{
        echo '<div class="container ">
        <h1 class="my-2">Post a comment</h1> 
        <p class="lead ">You are not logged in! Please log in to be able to post a comment.</p>
        </div>';
    }
        ?>
        
    </div>
    </div>

    <div class="container">
        <h1 class="py-2">Discussions</h1>
        <?php
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE `thread_id`=$id";
            $result = mysqli_query($conn,$sql);
            

            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult=false;
                $id = $row['comment_id'];
                $content = $row['comment_content'];
                $comment_time = $row['comment_time'];
                $thread_user_id = $row['comment_by'];
                $sql2 = "SELECT user_email FROM `users` WHERE `sno`='$thread_user_id'";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_assoc($result2);

            echo '<div class="media mb-5">
                <img class="mr-3" width="40px" src="images/userdefault.png" alt="Generic placeholder image">
                <div class="media-body">
                <p class="font-weight-bold my-0">'. $row2['user_email'] . ' at '. $comment_time.' </p>
                '.$content.'
            </div>
        </div>';
                }
                if($noResult){
                    echo '<div class="jumbotron mb-5 jumbotron-fluid">
                    <div class="container">
                      <p class="display-4">No results found</p>
                      <p class="lead">Be the first one to post a comment on this topic.</p>
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
