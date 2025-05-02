<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dance Institute</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Swiper Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/st-index.css">
    
</head>

<body>

  </head>

  <body>

    <?php
    include('nav.php');
    ?>


<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="">Find Us</h2>
                <div class="map">
    <figure>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.9943136348083!2d72.78406277526216!3d21.232074080468706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04bc4acaf1add%3A0x9dfb0d115ca9c815!2sPNP%20Dance%20Studio!5e0!3m2!1sen!2sin!4v1701115840011!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" 
              style="border:0; width: 100%; height: 400px;" ></iframe>
    </figure>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h4 class="">Contact Info</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet dolor vel justo bibendum sodales.
                    Curabitur mollis eros et risus vehicula, sit amet ultricies nisi scelerisque.</p>
                <p>24/7 support is available for all <a class="color1" href="http://www.templatemonster.com/"
                                                      rel="nofollow">premium templates</a>.</p>
                <p><a class="color1" href="http://www.templatetuning.com/" rel="nofollow">TemplateTuning</a> will assist
                    with customization of the chosen templates.</p>
                The Company Name Inc. <br>
                9870 St Vincent Place, <br>
                Glasgow, DC 45 Fr 45. <br>
                Telephone: +1 800 603 6035 <br>
                FAX: +1 800 889 9898 <br>
                E-mail: <a href="mailto:mail@demolink.org">mail@demolink.org</a>
            </div>

            <div class="col-md-6">
                <div class="">
                    <h4 class="">Contact Form</h4>
                    <form id="contact-form">
                        <div class="contact-form-loader"></div>
                        <fieldset>
                            <label class="name">
                                <input type="text" name="name" placeholder="Name:" value=""
                                       data-constraints="@Required @JustLetters"/>
                            </label>
                            <label class="email">
                                <input type="text" name="email" placeholder="E-mail:" value=""
                                       data-constraints="@Required @Email"/>
                            </label>
                            <label class="phone">
                                <input type="text" name="phone" placeholder="Phone:" value=""
                                       data-constraints="@Required @JustNumbers"/>
                            </label>
                            <label class="message">
                                <textarea name="message" placeholder="Message:"
                                          data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                            </label>
                            <div class="ta__right">
                                <a href="#" class="link-1" data-type="reset">clear</a>
                                <a href="#" class="link-1" data-type="submit">send</a>
                            </div>
                        </fieldset>
                        <div class="modal fade response-message">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;</button>
                                        <h4 class="modal-title">Modal title</h4>
                                    </div>
                                    <div class="modal-body">
                                        You message has been sent! We will be in touch soon.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


  </body>

  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js'></script>


  <script src="js/js-navbar.js"></script>
  <script src="js/js-modelbox.js"></script>
  <script src="js/js-slider.js"></script>


</html>