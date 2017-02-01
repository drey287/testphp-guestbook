<?php
    include "config/DB.php";
    include "libraries/Database.php";
    include "helpers/formatedate.php";

    // create DB object
    $db = new Database();
        // create Query
        $query = "SELECT * FROM `guestboox`";
        // run Query
        $posts = $db->select($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> test-php </title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>
  <div class="container">
      <div id="requirements">
          <h3>Problem: </h3>
          <p>
              You need to write a guestbook application (one page).<br>
              On the Guest Book page we will have 3 fields:<br>
              Name<br>
              Email<br>
              Message<br>
              Under the form, we must see the messages from guests.<br>
              You must do a client check (JS) and a server check (PHP) so that<br>
              1. the name must be bigger than 3 letters;<br>
              2.the email must be valid;<br>
              3. the message must be bigger than 5 characters;<br>
              Aside from a working application,
              we are checking the following:<br>
              1. the application must be production ready (think security)<br>
              2. the code must be OOP;<br>
              Technologies:<br>
              1. OOP PHP<br>
              2. MySql<br>
              3. JS<br>
              4. HTML/CSS<br>
              Do not mix business logic with presentation - VERY IMPORTANT!<br>
          </p>
      </div>

      <div id="guestbook">
          <form id="guestbookForm"  action="proces.php" method="POSt">
              <h2 class="guestbook-heading">Guestbook</h2>

              <label for="inputName" class="sr-only">Name</label>
              <input name="name"minlength="3" type="text" id="inputName" class="form-control" placeholder="Name" required>
              <label for="inputEmail" class="sr-only">Email address</label>
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <label for="inputMessage" class="sr-only">Message</label>
              <input name="message" minlength="5" type="text" id="inputMessage" class="text-info" placeholder="Message" required autofocus>
              <button name="submit" class="btn-lg btn-primary btn-block" type="submit">Submit</button>
          </form>

      </div>
      <?php if ($posts) { ?>
          <?php while ($row = $posts->fetch_assoc()) { ?>
              <div class="col-lg-5  col-sm-12 guestbook-main">
                  <div class="guestbook-post ">
                      <h4 class="guestbook-post-meta"><?= formateDate($row['time']); ?> by <strong><?= $row['user']; ?></strong></h4>
                      <button type="button" class="btn  btn-info collapsed open-post-btn" data-toggle="collapse" data-target="#post_<?= ($row['id']);?>"> Open</button>
                      <div id="post_<?= ($row['id']);?>" class="collapse post-content">
                          <p><?= $row['message']; ?></p>
                      </div>
                  </div>
              </div>
          <?php } ?>
      <?php }
            else {
                echo "<p>There are no posts yet </p>";
            }
      ?>



  </div>
  <footer class="footer">
      <div class="container">
          <h4 class="text-muted">Andrei Ciubotariu G.</h4>
      </div>
  </footer>




  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/client.min.js"></script>
  <script src="js/jquery.validate.js"></script>
  <script src="js/additional-methods.js"></script>
  <script src="js/script.js"></script>

</body>
</html>


