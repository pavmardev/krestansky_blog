<?php
  include('header_footer/header.php');
  require_once('classes/Database.php');
  require_once('classes/Article.php');
  $conn = new Database();
  $article = new Article($conn);

  $result = $article->load_article();
?>


    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Nedávne príspevky</h4>
                <h2>Naše nedávne záznamy článkov</h2>
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
                    foreach($result as $row) {
                        $substr = substr($row['text_clanku'], 0, 250);
                        $date_sub = substr($row["clanky_datum"], 0, 10);
                        
                                echo '<div class="col-lg-6">
                                        <div class="blog-post">
                                          <div class="blog-thumb">
                                            <img src="assets/images/blog-thumb-01.jpg" alt="">
                                              </div>
                                              <div class="down-content">
                                                <span>' . $row['kategoria'] . '</span>
                                                <a href="post-details.php?id=' . $row['clanky_id']. '"><h4>' . $row["nazov"] . '</h4></a>
                                                  <ul class="post-info">
                                                    <li>' . $row["meno"] . ' ' . $row['priezvisko'] .'</li>
                                                    <li>' . $date_sub . '</li>
                                                    <li></li>
                                                  </ul>
                                                  <p>' . $substr . '...' . '</p>
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