<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <meta charset="UTF-8"/>
        <title>アカウント存在確認画面</title>
    </head>
    <body>
        <div class="container">

            <h1>Blind SQL Injection.</h1>

            <form action = "q2.php" method = "post">
                <div class="form-group">
                    <label>name</label>
                    <input type="text" name="name" placeholder="guest" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">確認</button>
            </form>

            <?php

            $name = "";

            if(isset($_POST["name"])){
                $name = htmlspecialchars($_POST["name"]);
            }

            $mysqli = new mysqli('127.0.0.1', 'root', 'password', 'sql_injection2');

            if ($mysqli->connect_error) {
                echo $mysqli->connect_error;
                exit();
            }

            $mysqli->set_charset("utf8");

            $sql = "SELECT name, password FROM account WHERE name = '$name'";

            if ($result = $mysqli->query($sql)) {
                if ($result->num_rows > 0) {
                    echo "<h2>Yes! $name is Exists.</h2>";
                } else {
                    echo "<h2>No! $name is not Exists.</h2>";
                }
                $result->close();
            }

            $mysqli->close();

            ?>
        </div>
    </body>
</html>
