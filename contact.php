<?php 
$title = "Contact-TGC";
include "header.php";
?>
<section class="bgimage">
</section>
<nav class="breadcrumb-container py-3" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <i class="fa-solid fa-house"></i>
      <a href="#" class="breadcrumb-link">Home</a>
    </li>
    <li class="breadcrumb-item breadcrumb-active" aria-current="page">Contact</li>
  </ol>
</nav>
<section class="contact redbox">
    <div class="container py-3">
        <div class="row">
            <div class="col-lg-6 col-md-12 mt-4 animate__animated animate__fadeInLeft">
                <h2 class="headingtwo text-center" style="color:#fff;">Contact Us</h2>
                    <div class="col">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.5499808913623!2d75.80646287508648!3d26.854262176681967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a27af00c0062751%3A0xd4aca4916c0f8dda!2sTgc%20Animation%20And%20Multimedia%20%7C%20Graphic%20design%20Course%20%7C%20Web%20Design%20Course%20%7C%20Video%20Editing!5e0!3m2!1sen!2sin!4v1721644937501!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
            </div>
            <div class="col-lg-6 col-md-12 mt-4 animate__animated animate__fadeInRight">
                <div class="row">        
                    <div class="col mt-2 text-center">
                        <i class="fa-solid fa-map-location icon"></i>
                        <h4 class="headingfour" style="color:#fff;">Locate Us</h4>
                        <p style="color:#fff;">Jaipur | Delhi</p>
                    </div>
                    <div class="col mt-2 text-center">
                        <i class="fa-solid fa-envelope icon"></i>
                        <h4 class="headingfour" style="color:#fff;">Mail Us</h4>
                        <p style="color:#fff;"><a class="text-decoration-none text-white" href="mailto:contact@tgcjpr.com">contact@tgcjpr.com</a></p>
                    </div>
                    <div class="col mt-2 text-center">
                        <i class="fa-solid fa-phone icon"></i>
                        <h4 class="headingfour" style="color:#fff;">Call Us</h4>
                        <p style="color:#fff;"><a class="text-decoration-none text-white" href="tel:+7568872928">+7568872928</a></p>
                
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="formsubmit.php" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Your email address" required>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-2" name="phone" placeholder="Your phone number" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-2" name="subject" placeholder="Your Subject" required>
                                </div>
                            </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="message" rows="4" placeholder="Write your message..." required></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="whitebutton">Send Message</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="script.js"></script>
<?php include "footer.php"; ?>