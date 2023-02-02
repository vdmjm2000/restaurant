<!-- ======= Footer ======= -->
<br>
<br>
<footer id="footer" class="footer">

  <div class="container">
    <div class="row gy-3">
      <div class="col-lg-3 col-md-6 d-flex">
        <i class="bi bi-geo-alt icon"></i>
        <div>
          <h4>Address</h4>
          <p>
            A108 Adam Street <br>
            New York, NY 535022 - US<br>
          </p>
        </div>

      </div>

      <div class="col-lg-3 col-md-6 footer-links d-flex">
        <i class="bi bi-telephone icon"></i>
        <div>
          <h4>Reservations</h4>
          <p>
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 footer-links d-flex">
        <i class="bi bi-clock icon"></i>
        <div>
          <h4>Affichage des horaires</h4>
          <p>
            <?php
            $resultat2 = executeRequete("SELECT day, open_timeLunch, close_timeLunch, open_timeDinner, close_timeDinner FROM time_table");


           // $contenu .= '<table p id="profile" border="1"><tr>';

           // while ($colonne = $resultat2->fetch_field()) {
             // $contenu .= '<th>' . $colonne->name . '</th>';
           // }

            //$contenu .= '<th>Modification</th>';
            //$contenu .= '<th>Supression</th>';
           // $contenu .= '</tr>';

            while ($ligne = $resultat2->fetch_assoc()) {
             // $contenu .= '<tr>';
              foreach ($ligne as $indice => $information) { {
                 $contenu_footer .= '' . $information . '-';
                }
              }
              // $contenu .= '<td><a href="?action=modification&id_produit=' . $ligne['id_booking'] .'"><img src="../photo/icone/edit.png"></a></td>';
             // $contenu .= '<td><a href="?action=suppression&id_hours=' . $ligne['id_timeTable'] . '");"><img src="../photo/icone/delete.png"></a></td>';
            //  $contenu .= '</tr>';
            }

            echo $contenu_footer;
            ?>
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Follow Us</h4>
        <div class="social-links d-flex">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>

</footer><!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<script src="../assets/vendor/purecounter//purecounter_vanilla.js"></script>


<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>

</body>

</html>