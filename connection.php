<?php
require_once __DIR__.'/back.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    connect_user($_POST['email'], $_POST['name']);
}

?>


<body>
    <h1> Connection </h1>

    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <label>Email</label>
        <input type="text" name="email" value="">
        <label>Name</label>
        <input type="text" name="name" value="">
        <input type="submit" value="Submit">
    </form>
</body>


