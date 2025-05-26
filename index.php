
<?php 
      include('header_footer/header.php');
      include('classes/Database.php');
      include('classes/Article.php');
      $conn = new Database();
      $article = new Article($conn);
      $res = $article->load_article();

?>

    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   
    <section class="blog-posts" style="margin-top: 0; padding-top:10%">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <?php
                  $i = 1;
                  foreach($res as $row) {
                    if ($i <= 3) {
                        $substr = substr($row['text_clanku'], 0, 200);
                        $date_sub = substr($row["clanky_datum"], 0, 10);
                        echo '<div class="col-lg-12">
                                <div class="blog-post">
                                  <div class="blog-thumb">
                                    <img src="assets/images/blog-post-0' . $i . '.jpg">
                                  </div>
                                  <div class="down-content">
                                    <span>' . $row['kategoria'] . '</span>
                                    <a href="post-details.php?id=' . $row['clanky_id']. '"><h4>' . $row['nazov'] . '</h4></a>
                                    <ul class="post-info">
                                      <li>' . $row['meno'] . ' ' . $row['priezvisko'] . '</li>
                                      <li>' . $date_sub .'</li>
                                    </ul>
                                    <p>' . $substr . '...' . '</p>
                                    
                                    </div>
                                  </div>
                                </div>';
                        $i = $i + 1;
                  }
                  }
                  
                ?>
                <div class="col-lg-12">
                  <div class="main-button">
                    <a href="blog.php">View All Posts</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Hlavné pravdy katolíckej viery</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li>
                          <p>Boh je len jeden</p>
                        </li>
                        <li>
                          <p>V Bohu sú tri osoby: Otec, Syn a Duch Svätý.</h5>
                        </li>
                        <li>
                          <p>Boží Syn sa stal človekom, aby nás vykúpil.</p>
                        </li>
                        <li>
                          <p>Boh je spravodlivý sudca: dobrých odmieňa a zlých tresce.</p>
                        </li>
                        <li>
                          <p>Duša človeka je nesmrteľná.</p>
                        </li>
                        <li>
                          <p>Božia milost je na spásu potrebná.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Seden hlavných hriechov</h2>
                    </div>
                    <div class="content">
                      <ol>
                        <li>Pýcha</li>
                        <li>Lakomstvo</a></li>
                        <li>Smilstvo</li>
                        <li>Závisť</li>
                        <li>Obžerstvo</li>
                        <li>Hnev</li>
                        <li>Lenivosť</li>
                      </ol>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>Sedem hlavných čností</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li>Pokora</li>
                        <li>Štedrosť</li>
                        <li>Dobroprajnosť</li>
                        <li>Trpezlivosť</li>
                        <li>Cudnosť</li>
                        <li>Striedmosť</li>
                        <li>Činorodosť</li>
                      </ul>
                    </div>
                  </div>
                </div>
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