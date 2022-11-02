<?php
$id = "";
$name = "";
$sub = "";
$des = "";
$dead = "";


$error = "";
$success = "";

$db = mysqli_connect('localhost', 'root', '', 'login1');

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location:home.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = "select * from tasks where id=$id";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    while (!$row) {
        header("location:home.php");
        exit;
    }
    $name = $row["task_name"];
    $sub = $row["subject"];
    $des = $row["description"];
    $dead = $row["deadline"];

} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $sub = $_POST["subject"];
    $des = $_POST["description"];
    $dead = $_POST["deadline"];


    $sql = "update tasks set task_name='$name', subject='$sub', description='$des' , deadline='$dead' where id='$id'";
    $result = $db->query($sql);
    header("location:home.php");

}

?>
<!DOCTYPE html>
<html>

<head>
    <title>ToDo | Edit Task</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="home.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://use.fontawesome.com/releases/v5.0.8/js/all.js'></script>
</head>

<body class="sidebar-is-reduced">
    <header class="l-header">
        <div class="l-header__inner clearfix">
            <div class="c-header-icon js-hamburger">
                <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span
                        class="bar-bot"></span></div>
            </div>
            <div class="c-header-icon has-dropdown"><span
                    class="c-badge c-badge--red c-badge--header-icon animated swing">2</span><i class="fa fa-bell"></i>
                <div class="c-dropdown c-dropdown--notifications">
                    <div class="c-dropdown__header"></div>
                    <div class="c-dropdown__content"></div>
                </div>
            </div>
            <div class="c-search">
                <input class="c-search__input u-input" placeholder="Search..." type="text" />
            </div>
            <div class="header-icons-group">
                <div class="c-header-icon basket">
                <div class="c-header-icon logout"><a href="logout.php"><i class="fa fa-power-off"></i></a></div>
            </div>
        </div>
    </header>
    <div class="l-sidebar">
        <div class="logo">
            <div class="logo__txt">ToDo</div>
        </div>
        <div class="l-sidebar__content">
            <nav class="c-menu js-menu">
                <ul class="u-list">
                    <li class="c-menu__item is-active" data-toggle="tooltip" title="Flights">
                        <div class="c-menu__item__inner"><i class="fa">&#xf0ae;</i>
                            <div class="c-menu-item__title"><span>My Task</span></div>
                        </div>
                    </li>

                    <!-- <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Statistics">
                        <div class="c-menu__item__inner"><i class="fa">&#xf0c0;</i>
                            <div class="c-menu-item__title"><span>Users</span></div>
                        </div>
                    </li>
                    <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Gifts">
                        <div class="c-menu__item__inner"><i class="fa fa-gift"></i>
                            <div class="c-menu-item__title"><span>Gifts</span></div>
                        </div>
                    </li>
                    <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Settings">
                        <div class="c-menu__item__inner"><i class="fa fa-cogs"></i>
                            <div class="c-menu-item__title"><span>Settings</span></div>
                        </div>
                    </li> -->
                </ul>
            </nav>
        </div>
    </div>
</body>

<main class="l-main">


    <div class="content-wrapper content-wrapper--with-bg">
        <h1 class="page-title">Edit Task</h1>

        <div class="col-lg-6 m-auto">

            <form method="post" >

                <div class="card">

                    <div class="card-header bg-primary">
                        <h1 class="text-white text-center"> Update Task Details</h1>
                    </div><br>

                    <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>

                    <label> Task name: </label>
                    <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" required> <br>

                    <label> Subject: </label>
                    <input type="text" name="subject" value="<?php echo $sub; ?>" class="form-control" required> <br>

                    <label> Description: </label>
                    <input type="text" name="description" value="<?php echo $des; ?>" class="form-control" required>
                    <br>

                    <label> Deadline: </label>
                    <input type="date" name="deadline" value="<?php echo $dead; ?>" class="form-control" required> <br>

                    <button class="btn btn-success" type="submit" name="submit"> Update </button><br>
        
                    <a class="btn btn-info" type="submit" name="cancel" href="home.php"> Cancel </a><br>


                </div>
            </form>
        </div>


    </div>


</main>


</html> 