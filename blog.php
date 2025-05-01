<?php
  include('classes/Database.php');
  $conn = new Database;

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>Stand Blog Posts</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<!--

TemplateMo 551 Stand Blog

https://templatemo.com/tm-551-stand-blog

-->
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <?php 
      include('header_footer/header.php');
    ?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Recent Posts</h4>
                <h2>Our Recent Blog Entries</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->


    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
                <div class="row">
              <?php 
                    $stmt = "SELECT * FROM clanky";
                    $exe = $conn->getConnection()->query($stmt);
                    $result = $exe->fetchAll(PDO::FETCH_ASSOC);

                    foreach($result as $row) {
                        $substr = substr($row['text_clanku'], 0, 250);
                        $date_sub = substr($row["datum"], 0, 10);
                        
                                echo '<div class="col-lg-6">
                                        <div class="blog-post">
                                          <div class="blog-thumb">
                                            <img src="assets/images/blog-thumb-01.jpg" alt="">
                                              </div>
                                              <div class="down-content">
                                                <span>Lifestyle</span>
                                                <a href="post-details.php"><h4>' . $row["nazov"] . '</h4></a>
                                                  <ul class="post-info">
                                                    <li>' . $row["pouzivatelia_id"] . '</li>
                                                    <li>' . $date_sub . '</li>
                                                    <li><a href="#">12 Comments</a></li>
                                                  </ul>
                                                  <p>' . $substr . '</p>
                                                  </div>
                                              </div>
                                          </div>';  
                    }
                ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>

    
    <?php
      include('header_footer/footer.php');
    ?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>