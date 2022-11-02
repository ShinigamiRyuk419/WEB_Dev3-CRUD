<?php

// include ('home.php');
session_start();

$db = mysqli_connect('localhost', 'root', '', 'login1');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $sub = $_POST['subject'];
    $des = $_POST['description'];
    $dead = $_POST['deadline'];

    $getEmail= $_SESSION['name'];

    $q = " INSERT INTO `tasks`(`task_name`, `subject`, `description`, `deadline`, `user`) VALUES ( '$name', '$sub' , '$des', '$dead', '$getEmail')";

    $query = mysqli_query($db, $q);
    header("location:home.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>ToDo | New task</title>

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
        <h1 class="page-title">New Task</h1>

        <div class="col-lg-6 m-auto">

            <form method="post">

                <div class="card">

                    <div class="card-header bg-primary">
                        <h1 class="text-white text-center"> Create Task</h1>
                    </div><br>

                    <label> Task name: </label>
                    <input type="text" name="name" class="form-control" required> <br>

                    <label> Subject: </label>
                    <input type="text" name="subject" class="form-control" required> <br>

                    <label> Description: </label>
                    <input type="text" name="description" class="form-control" required> <br>

                    <label> Deadline: </label>
                    <input type="date" name="deadline" class="form-control" required> <br>

                    <button class="btn btn-success" type="submit" name="submit"> Submit </button><br> 
                    <!-- <a href="home.php" style="text-decoration: none;color:black;"></a> -->
                    <a class="btn btn-info" type="submit" name="cancel" href="home.php"> Cancel </a><br>

                </div>
            </form>
        </div>


    </div>


</main>

<script>
    let Dashboard = (() => {
        let global = {
            tooltipOptions: {
                placement: "right"
            },

            menuClass: ".c-menu"
        };


        let menuChangeActive = el => {
            let hasSubmenu = $(el).hasClass("has-submenu");
            $(global.menuClass + " .is-active").removeClass("is-active");
            $(el).addClass("is-active");
        };

        let sidebarChangeWidth = () => {
            let $menuItemsTitle = $("li .menu-item__title");

            $("body").toggleClass("sidebar-is-reduced sidebar-is-expanded");
            $(".hamburger-toggle").toggleClass("is-opened");

            if ($("body").hasClass("sidebar-is-expanded")) {
                $('[data-toggle="tooltip"]').tooltip("destroy");
            } else {
                $('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
            }

        };

        return {
            init: () => {
                $(".js-hamburger").on("click", sidebarChangeWidth);

                $(".js-menu li").on("click", e => {
                    menuChangeActive(e.currentTarget);
                });

                $('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
            }
        };

    })();

    Dashboard.init();
</script>

</html>