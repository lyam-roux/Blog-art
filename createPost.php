<?php
require_once __DIR__.'/back.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    create_post($_POST['title'], $_POST['description'],urldecode($_COOKIE['user']));
    header('Location: hoome.php');
}

?>

<body>
    <h1> REDIGEZ VOTRE POST ! </h1>

    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <label>Titre</label>
        <input type="text" name="title" value=" ">
        <label>Description</label>
        <input type="text" name="description" value="">
        <input type="submit" value="Submit">
    </form>
</body>
