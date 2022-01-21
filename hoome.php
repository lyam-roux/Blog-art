<?php

require_once __DIR__.'/back.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['createPost'])){
        header('Location: createPost.php');
    }
    if (isset($_POST['like'])){
    }
}

?>




<body>
    <div class="container">
        
        <div class="heading">
            <h1> LOGGED to <?php echo(urldecode($_COOKIE['user'])) ?> </h1>
            <h2> HI <?php echo(get_user_name(urldecode($_COOKIE['user']))) ?> </h2>
        </div>
        <div><img src="" alt=""></div>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <input type="submit" name="createPost" value="créer">
        </form>

        <div>
            <h3> Posts récents : </h3>
            <?php 
            
            $allPost = select_all();
            foreach ($allPost as $key => $item) {
                echo $item['libPost'] . '<br>'. $item['descripPost']. '<br>' . 'de : '. $item['eMailUser'];
                ?>
                

                <form method = "POST">
                    <input type="submit" name="like" value="like">
                </form>

                
                <?php 
                echo('<br>');
                echo('<br>');
              }
              ?>
            
            






        </div>
    </div>
</body>