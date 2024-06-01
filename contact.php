<?php
session_start();
include('layouts/header.php');
?>

<!-- Map Begin -->
<div class="map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.920991484129!2d107.60242681550891!3d-6.923110494999689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e626a8b63bc7%3A0xe1a4033ecffcba2b!2sKings%20Shopping%20Center!5e0!3m2!1sen!2sid!4v1685022959726!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- Map End -->

<section class="contact-details py-5">
  <div class="container">
    <div class="row">
      <!-- Contact Details -->
      <div class="col-lg-6">
        <div class="card mb-3" style="max-width: 500px;">
          <div class="row g-0">
            <div class="col-md-6">
              <img src="img/logo/1.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <h5 class="card-title">Our Store</h5>
                <p class="card-text">
                  Welcome to Createlier! We are open during the following hours:
                </p>
                <ul class="list-unstyled">
                  <li><strong>Monday - Friday:</strong> 9:00 AM - 6:00 PM</li>
                  <li><strong>Saturday:</strong> 10:00 AM - 5:00 PM</li>
                  <li><strong>Sunday:</strong> Closed</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Contact Form -->
      <div class="col-lg-6">
        <div class="contact__form">
          <form action="#">
            <div class="row">
              <div class="col-lg-6 mb-3">
                <input type="text" class="form-control" placeholder="Name">
              </div>
              <div class="col-lg-6 mb-3">
                <input type="text" class="form-control" placeholder="Email">
              </div>
              <div class="col-lg-12 mb-3">
                <textarea class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="col-lg-12">
              <a href="https://mail.google.com/mail/u/0/#inbox"
                 type="submit" class="btn btn-primary" style="background-color: #850e35;"> Send Message
              </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
include('layouts/footer.php');
?>