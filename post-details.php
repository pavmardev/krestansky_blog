<?php
    include('header_footer/header.php');
    require_once('classes/Database.php');
    require_once('classes/Article.php');
    require_once('classes/Comments.php');
    $conn = new Database();
    $article = new Article($conn);
    $comment = new Comment($conn);

    if(!isset($_GET['id'])) {
      header('Location: blog.php');
      exit;
    }

    $article_id = $_GET['id'];
    $res = $article->find_article($article_id);
    $us_name = $res['meno'];
    $us_sur = $res['priezvisko'];
    $date = $res['clanky_datum'];
    $na = $res['nazov'];
    $te = $res['text_clanku'];
    $ca = $res['kategoria'];
    

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if(isset($_POST['comment']) && isset($_SESSION['user_id'])) {
        $commentary = $_POST['comment'];
        $comment->insert_comment($_SESSION['user_id'], $commentary, $article_id);
        header('Location: post-details.php?id=' . $article_id);
        exit;
      } elseif(isset($_POST['delete_btn'])) {
          $delete_btn = $_POST['delete_btn'];
          $comment->delete_comment($delete_btn);
        } 
    }
?>

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
    <!-- Page Content -->

    <section class="blog-posts grid-system" style="margin-top: 0; padding-top:10%">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="assets/images/blog-post-02.jpg" alt="">
                    </div>
                    <div class="down-content">
                      <span><?php echo $ca ?></span>
                      <a href="post-details.php"><h4><?php echo $na ?></h4></a>
                      <ul class="post-info">
                        <li><?php echo htmlspecialchars($us_name) . ' ' . htmlspecialchars($us_sur) ?></li>
                        <li><?php echo $date ?></li>
                      </ul>
                      <p><?php echo nl2br(htmlspecialchars($te)) ?></p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">Best Templates</a>,</li>
                              <li><a href="#">TemplateMo</a></li>
                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li><a href="#">Facebook</a>,</li>
                              <li><a href="#"> Twitter</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2>Komentáre</h2>
                    </div>

                    <?php 
                    $result = $comment->load_comments($article_id);
                    foreach($result as $row) {
                        echo '<div class="content">
                                <ul>
                                  <li>
                                    <div class="right-content">
                                  <h4>' . htmlspecialchars($row['meno']) . ' ' . htmlspecialchars($row['priezvisko']) . '<span>' .  htmlspecialchars($row['komentare_datum']) . '</span></h4>
                                  <p>' . htmlspecialchars($row['komentar']) . '</p>';
                                  
                              if (isset($_SESSION['user_id']) && $row['komentar_pouzivatel'] == $_SESSION['user_id']) {
                                  echo '<form method="POST"><button type="submit" value="' . $row['komentare_id'] .'" name="delete_btn" class="btn btn-danger">Odstrániť</button>
                                  </form>';
                              }
                          
                        echo      '</div>
                              </li>
                            </ul>
                          </div>';
                    }
                    
                  ?>
                  </div>
                </div>
                <?php
                    if(isset($_SESSION['user_id'])) {
                      echo '<div class="col-lg-12">
                              <div class="sidebar-item submit-comment">
                                <div class="sidebar-heading">
                                  <h2>Váš komentár</h2>
                                </div>
                                <div class="content">
                                  <form id="comment" method="POST">
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <fieldset>
                                          <textarea name="comment" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                                        </fieldset>
                                      </div>
                                      <div class="col-lg-12">
                                        <fieldset>
                                          <button type="submit" id="form-submit" class="main-button">Pridať</button>
                                        </fieldset>
                                      </div>
                                    </div>
                                  </form>
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
