<?php

session_start();

// to checked if user is logged in
if (!isset($_SESSION['loggedin'])) {
  echo ('You need to login first!');
  header('refresh:1;url=index.php');
  exit();
}

// include('handling.php');

// if(!isset($_SESSION['email'])){
//   header('Location: register.php');
// }

// if (isset($_GET['logout'])){
//   session_destroy();
//   unset($_SESSION['email']);
//   header('Location: index.php');
// }

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Home | Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="home.css" rel="stylesheet" type="text/css">
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
          <li class="c-menu__item is-active" data-toggle="tooltip" title="Tasks">
            <div class="c-menu__item__inner" onclick="openTab(event, 'todo')"><i class="fa">&#xf0ae;</i>
              <div class="c-menu-item__title"><span>My Task</span></div>
            </div>
          </li>

          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Users">
            <div class="c-menu__item__inner" onclick="openTab(event, 'user')"><i class="fa">&#xf0c0;</i>
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
          </li>
        </ul>
      </nav>
    </div>
  </div>
</body>
<main class="l-main" id="todo">


  <div class="content-wrapper content-wrapper--with-bg" >
    <h1 class="page-title">Dashboard</h1>
    <div class="page-content">Welcome <em>&nbsp;<?= $_SESSION['name'] ?>!</em></div>

    <!-- dashboard todo list -->
    <div class="container my-4">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Task Name</th>
            <th>Subject</th>
            <th>Description</th>
            <th>Deadline</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $db = mysqli_connect('localhost', 'root', '', 'login1');
          $Cname =$_SESSION['name'];
          
          $sql = "select * from tasks where user ='$Cname' ";
          $result = $db->query($sql);
          if (!$result) {
            die("Invalid query!");
          }
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <th>$row[id]</th>
                <td>$row[task_name]</td>
                <td>$row[subject]</td>
                <td>$row[description]</td>
                <td>$row[deadline]</td>

              <td>
                        <a class='btn btn-success' href='edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger'id='del' onclick='delete();' href='delete.php?id=$row[id]'>Delete</a>
                      </td>
            </tr>
            ";
          }
          ?>
        </tbody>
      </table>
    </div>

    <a class='btn btn-primary' id='del' href='Newtask.php'>Add</a>
  </div>


</main>

<main class="l-main" id="user">
<div class="content-wrapper content-wrapper--with-bg" >
    <h1 class="page-title">Registered Users</h1>
    <div class="page-content">Welcome <em>&nbsp;<?= $_SESSION['name'] ?>!</em></div>

    <!-- dashboard todo list -->
    <div class="container my-4">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Address</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $db1 = mysqli_connect('localhost', 'root', '', 'login1');
        
          $sql1 = "select * from users ";
          $result = $db1->query($sql1);
          if (!$result) {
            die("Invalid query!");
          }
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <th>$row[id]</th>
                <td>$row[firstname]</td>
                <td>$row[lastname]</td>
                <td>$row[address]</td>
                <td>$row[email]</td>
              </tr>
            ";
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- <a class='btn btn-primary' id='del' href='Newtask.php'>Add</a> -->
  </div>

</main>


<script>
  //for switching tabs
  function openTab(evt, tabName) {
  
  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("l-main");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }


  tablinks = document.getElementsByClassName("c-menu__item has-submenu");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

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

      // if (hasSubmenu) {
      // 	$(el).find("ul").slideDown();
      // }
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

</body>

</html>