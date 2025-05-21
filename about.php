<?php
  include('header_footer/header.php');
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
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>O nás</h4>
                <h2>Kto sme a čo robíme?</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->


    <section class="about-us" style="text-align: center;">
        <p class="text-left" style="width: 60%; margin: 0 auto;">
                  Vitajte na našom katolíckom blogu – mieste, kde sa stretáva viera, poznanie a duchovný rast. Naším cieľom je vytvoriť priestor pre všetkých, ktorí hľadajú odpovede na otázky života, chcú prehĺbiť svoju vieru alebo sa inšpirovať príbehmi svätých a duchovnými podnetmi, ktoré pomáhajú žiť v súlade s evanjeliom.<br><br>

                  Sme komunita ľudí rôznych vekových kategórií a životných skúseností, ktorých spája spoločná túžba rásť vo viere a lepšie chápať tajomstvá Boha a Cirkvi. Veríme, že v dnešnom hektickom a často materialistickom svete je potrebné znovu objaviť krásu a pravdu katolíckej viery, ktorá prináša pokoj, nádej a zmysel.<br><br>

                  Na našom blogu nájdete články, ktoré pokrývajú široké spektrum tém: od teologických rozjímaní, cez duchovnú spiritualitu, modlitby, príbehy svätých, význam sviatostí až po históriu Cirkvi. Každý text je písaný s úctou k tradícii a zároveň otvorený dialógu so súčasným svetom a jeho výzvami.<br><br>

                  Veríme, že viera nie je len súbor pravidiel, ale živý vzťah s Bohom, ktorý nás premieňa a vedie k láske k blížnym. Preto nás motivuje túžba pomôcť vám na vašej ceste viery – či už ste skúsený veriaci, ktorý chce prehĺbiť svoje poznanie, alebo niekto, kto práve začína hľadať zmysel života v Kristovi.<br><br>

                  Sme radi, že ste sa rozhodli byť súčasťou našej duchovnej rodiny a veríme, že tu nájdete povzbudenie, poznanie a duchovnú silu, ktoré potrebujete. Ak máte otázky, podnety alebo návrhy, neváhajte nás kontaktovať – radi s vami budeme komunikovať a rásť spolu.<br><br>

                  Nech vás Pán žehná na vašej ceste a sprevádza každým dňom.
                </p>
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