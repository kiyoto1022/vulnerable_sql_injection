<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <meta charset="UTF-8"/>
        <title>アカウント検索画面</title>
    </head>
    <body>
        <div class="container">

            <h1>SQL Injection.</h1>

            <form action = "q1.php" method = "post">
                <div class="form-group">
                    <label>name</label>
                    <input type="text" name="name" placeholder="guest" class="form-control">
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="text" name="password" placeholder="guest" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">検索</button>
            </form>

            <?php

            $name = "";
            $password = "";

            if(isset($_POST["name"])){
                $name = htmlspecialchars($_POST["name"]);
            }
            if(isset($_POST["password"])){
                $password = htmlspecialchars($_POST["password"]);
            }

            $mysqli = new mysqli('127.0.0.1', 'root', 'password', 'sql_injection');

            if ($mysqli->connect_error) {
                echo $mysqli->connect_error;
                exit();
            }

            $mysqli->set_charset("utf8");

            $sql = "SELECT name, password FROM account WHERE name = '$name' and password = '$password'";

            echo "<table class=\"table\"><thead><tr><th>name</th><th>password</th></tr></thead><tbody>";

            if ($result = $mysqli->query($sql)) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["name"] . "</td><td>" . $row["password"] . "</td></tr>";
                }
                $result->close();
            }

            echo "</tbody></table>";

            $mysqli->close();

            ?>
        </div>
    </body>
</html>
