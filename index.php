<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="theme-color" content="#BC8887" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Undangan Pernikahan Candra & Andhini</title>

    <meta property="og:title" content="Undangan Pernikahan Candra & Andhini - Minggu, 09 Juli 2023">
    <meta property="og:description" content="Undangan Pernikahan Candra & Andhini - Minggu, 09 Juli 2023 di Masjid Nurani Kranji, Jl. I Gusti Ngurah Rai No.RT.1, Kranji, Bekasi Bar., Kota Bekasi">
    <meta property="og:locale" content="id_ID" />
    <meta property='og:image:width' content='1200' />
    <meta property='og:image:height' content='627' />
    <meta property="og:url" content="https://andhinb.niobesad.com">
    <meta name="twitter:card" content="summary_large_image">
    <!-- Bulma Version 0.8.x-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.8.0/css/bulma.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/bulma-tooltip@0.1.5/dist/bulma-tooltip.min.css" />
    <link rel="stylesheet" type="text/css" href="css/menikah.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.countdown.css" />
    <script
      src="https://kit.fontawesome.com/2828f7885a.js"
      integrity="sha384-WAsFbnLEQcpCk8lM1UTWesAf5rGTCvb2Y+8LvyjAAcxK1c3s5c0L+SYOgxvc6PWG"
      crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.coundown.js"></script>
    <link rel="icon" type="image/png" href="image/favicon.png" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23064379-20"></script>
    <!-- Begin Script for Countdown -->
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23064379-20');
    </script>
    <!-- Begin Script for Countdown -->

    <!-- Github Button -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>

  <body>
    <!-- Begin Preloader -->
    <!-- <div class="preloader-wrapper">
      <div class="preloader">
        <img src="image/favicon.png" alt="Flower" />
      </div>
    </div> -->
    <!-- End Preloader-->
    <!-- Begin Header -->
    <div class="header-wrapper" id="home">
      <!-- Begin Hero -->
      <section class="hero is-large">
        <!-- Begin Mobile Nav -->
        <nav class="navbar is-transparent is-hidden-desktop">
          <!-- Begin Burger Menu -->
          <div class="navbar-brand is-fixed-top">
            <div class="navbar-burger burger" data-target="mobile-nav">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <!-- End Burger Menu -->
          <div id="mobile-nav" class="navbar-menu">
            <div class="navbar-end">
              <div class="navbar-item">
                <a class="navbar-item" href="#Waktu">
                  Waktu
                </a>
              </div>
              <div class="navbar-item">
                <a class="navbar-item" href="#lokasi">
                  Lokasi
                </a>
              </div>
              
              <div class="navbar-item">
                <a class="navbar-item" href="#galery-candra-andhini">
                  Galeri Candra & Andhini
                </a>
              </div>
              <div class="navbar-item">
                <a class="navbar-item" href="#rsvp">
                  RSVP
                </a>
              </div>
            </div>
          </div>
        </nav>
        <!-- End Mobile Nav -->
        <!-- Begin Hero Content-->
        <div class="hero-body">
          <div class="container has-text-centered">
            <h1 class="subtitle">Undangan Pernikahan</h1>
            <h2 class="title"></br>Candra & Andhini</br></br></h2>
          </div>
          <!-- Start Countdown -->       
          <div>
            <ul id="hitungmundur" >
              <li><span class="days">00</span><p class="days_text">Hari</p></li>
              <li class="separator">:</li>
              <li><span class="hours">00</span><p class="hours_text">Jam</p></li>
              <li class="separator">:</li>
              <li><span class="minutes">00</span><p class="minutes_text">Menit</p></li>
              <li class="separator">:</li>
              <li><span class="seconds">00</span><p class="seconds_text">Detik</p></li>
            </ul>
            <div class="spasi">
            </div>
            <script type="text/javascript">
              var now = new Date();
              var day = now.getDate();
              var month = now.getMonth() + 1;
              var year = now.getFullYear() + 1;
          
              var nextyear = month + '/' + day + '/' + year + ' 07:07:07';
              var harih = '07/09/2023 09:00:00';

              $('#hitungmundur').countdown({
                date: harih, // TODO Date format: 07/27/2017 17:00:00
                offset: +7, // TODO Your Timezone Offset
                day: 'Hari',
                days: 'Hari'
              }, function () {
                alert('Acara pernikahan kami sudah selesai. Terima kasih banyak buat yang sudah hadir! :)');
              });
            </script>  
          </div>
          <!-- End Countdown -->
        </div>
        <!-- End Hero Content-->
        <!-- Begin Hero Menu -->
        <div class="hero-foot ">
          <div class="hero-foot--wrapper">
            <div class="columns">
              <div class="column is-12 hero-menu-desktop has-text-centered">
                <ul>
                  <li class="is-active">
                    <a href="#home">Home</a>
                  </li>
                  <li>
                    <a href="#Waktu">Waktu</a>
                  </li>
                  <li>
                    <a href="#lokasi">Lokasi</a>
                  </li>
                  <li>
                    <a href="#galery-candra-andhini">Galeri Candra & Andhini</a>
                  </li>

                  <li>
                    <a href="#rsvp">RSVP</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- End Hero Menu -->
      </section>
      <!-- End Hero -->
    </div>
    <!-- End Header -->

    <!-- Begin Main Content -->
    <div class="main-content">
    <!-- Begin regular-section-->
    <section class="section-dark" style="padding-bottom: 0%;">
      <!--<img src="./image/galeri/11.jpg" style="margin-bottom: 5%;" data-aos="fade-up" data-aos-easing="linear" >-->
      <div data-aos="fade-up" data-aos-easing="linear" class="has-text-centered has-vertically-aligned-content">
        <img src="./image/galeri/11.jpg" style="margin-bottom: 5%;">
        <h1 style="margin-bottom: 20px; font-size: 0.8rem;">
          “Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir.“
        </h1>
        <strong style="font-size: 0.8rem;">( QS. Ar-Rum ayat 21 )</strong>
      </div>
    </section>
    <div class="curved"></div>
    
     <section class="section-light regular-section has-text-centered has-vertically-aligned-content" id="regular-section" style="padding-top: 10%;">
        
        <div data-aos="fade-up" data-aos-easing="linear">
          <img src="image/bismillah.png" class="bismillah has-text-centered" alt="Bismillahirrahmaanirrahiim">
        </div>

        <p class="bodytext" data-aos="fade-up" data-aos-easing="linear">
          Assalamu'alaikum Warahmatullahi Wabarakatuh.
          <br />
          Dengan memohon rahmat dan ridha Allah swt, 
          <br />
          kami bermaksud mengundang Bapak/Ibu/Saudara/Saudari pada acara pernikahan kami
        </p>

        <span class="space40px"></span>
        <!-- <span class="space40px"></span> -->
        <!-- ukuran foto disamain -->
        <div data-aos="fade-up" data-aos-easing="linear">
          <div style="display: flex; flex-direction: row;">
            <img src="./image/galeri/andhini.jpg" width="100px" height="100px" style="border-radius: 11px;" >
            <div style="text-align: left;" >
              <h1 class="nama-andhini">Andhini Budiati</h1>
              <h1 style="font-size: x-small; margin-left: 20px;">Putri dari Bapak Alm. Damris Intan & Ibu Runawati Rustam</h1>
            </div>
          </div>
          <div class="ampersand">&</div>
          <div style="display: flex; flex-direction: row; justify-content: flex-end;">
            <div style="text-align: right;" >
              <h1 class="nama-candra">Candra</h1>
              <h1 style="font-size: x-small; margin-right: 20px;">Putra dari Bapak Hendra Fia & Ibu Saiti</h1>
            </div>
            <img src="./image/galeri/candra.jpg" width="100px" height="100px" style="border-radius: 11px;" >
          </div>
        
        <span class="space40px"></span>
        <div data-aos="fade-up" data-aos-easing="linear">
          <img src="image/divider-leaves.png" class="divider has-text-centered" alt="~~~">
        </div>
        <span class="space40px"></span>
      </section>
      <!-- End regular-section-->    
      
      <!-- Begin Waktu Section -->
      <section class="section-dark" id="Waktu">
        <div class="container">

          <div class="column is-12 regular-section" data-aos="fade-up" data-aos-easing="linear">
            <h1 class="title has-text-centered section-title">Waktu</h1>
          </div>
          <div class="columns is-multiline" data-aos="fade-up" data-aos-easing="linear">
            <div
              class="column is-4 has-vertically-aligned-content">
            
              <p class="is-larger has-text-centered">
                  <div class="waktu tanggal-hari has-text-centered">Minggu</div> 
                  <div class="waktu tanggal-angka has-text-centered">09</div>
                  <div class="waktu tanggal-bulan has-text-centered">Juli 2023</div>
              </p>
            </div>
            <div class="column is-4 has-vertically-aligned-content">
              <p class="waktu is-larger has-text-centered">
                Akad Nikah:
                <br>
                <strong>08.00 WIB</strong>
              </p>
            </div>
            <div class="column is-4 has-vertically-aligned-content">
              <h1 class="waktu is-larger has-text-centered">
                Resepsi:
                <br>
                <strong>11.00  - 13.15 WIB</strong>
              </h1>
            </div>
          </div>
        </div>
        <div class="space40px"></div>
        <div class="main-content has-text-centered" data-aos="fade-up" data-aos-easing="linear">
            <a href="https://calendar.google.com/calendar/event?action=TEMPLATE&tmeid=MTVwc3MyODMyOHZtbWx0OW1kM2NmdGhic2ogNTdmM2U2Y2Q0YWU1MTgxNzBkZDYwMGFhODlmNjllOTE5NzI1OWQxYWMyNzkzZmI5NTdkOWYzMDcwYzJhYmIzOUBn&tmsrc=57f3e6cd4ae518170dd600aa89f69e9197259d1ac2793fb957d9f3070c2abb39%40group.calendar.google.com" class="button btn-cta" target="_blank" data-aos="zoom-in">
              <i class="far fa-calendar-plus"></i>
              &nbsp;&nbsp;Save The Date
            </a>
        </div>


      </section>
      <!-- End Waktu Content -->

      <!-- Begin Lokasi Section -->
      <section class="section-darker" id="lokasi" >
        <div class="container">
          <div class="column is-12 regular-section" data-aos="fade-up" data-aos-easing="linear">
            <h1 class="title has-text-centered section-title">Lokasi</h1>
            <p class="tempat is-larger has-text-centered">
              <strong>Mesjid Raya Nurani</strong>
              <br>
              Jl. I Gusti Ngurah Rai No.1,
              <br>
              Kranji, Bekasi Barat., Kota Bekasi
              <br>
            </p>
          </div>
          <div class="section-map" data-aos="fade-up" data-aos-easing="linear">
            <iframe src="https://maps.google.com/maps?q=Mesjid%20Raya%20Nurani&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="space40px"></div>
          <div class="has-text-centered" data-aos="fade-up" data-aos-easing="linear">
            <a href="https://www.google.com/maps/place/Masjid+Raya+Nurani/@-6.2218716,106.9735425,19z/data=!4m5!3m4!1s0x2e698dbf928277dd:0xec97a69e9ad58e09!8m2!3d-6.2223463!4d106.9734291" class="button btn-cta" target="_blank" data-aos="zoom-in">
              <i class="far fa-directions"></i>
              &nbsp;&nbsp;Google Maps
            </a>
          </div>
        </div>
      </section>
      <!-- End Lokasi Content -->

      <!-- Begin Galeri  -->
      <section class="section-light regular-section is-fullheight" id="galery-candra-andhini" style="padding-left: 0%; padding-right: 0%;">
        <div id="containerGallery" class="container">
          <div class="has-text-centered is-12 prolog">
            <h1 class="title has-text-centered section-title" data-aos="fade-up" data-aos-easing="linear">Our Memories</h1>
            
          <!-- IMAGES SLIDESHOW -->  
          <div data-aos="fade-up" data-aos-easing="linear">
            <div class="imageSlide fade">
              <article class="foto7"  >
            </div>
            <div class="imageSlide fade">
              <article class="foto8"  >
            </div>
            <div class="imageSlide fade">
              <article class="foto9" >
            </div>
            <div class="imageSlide fade">
              <article class="foto6"  >
            </div>
            <div class="imageSlide fade">
              <article class="foto4"  >
            </div>
            <div class="imageSlide fade">
              <article class="foto5" >
            </div>
            <div class="imageSlide fade">
              <article class="foto1"  >
            </div>
            <div class="imageSlide fade">
              <article class="foto2"  >
            </div>
            <div class="imageSlide fade">
              <article class="foto3" >
            </div>
          </div>
      </section>
      <!-- End Galeri -->

      <!-- Begin RSVP Content -->
<section class="section-dark contact" id="rsvp">
  <div id="containerClosing" class="container">
    <div class="columns is-multiline">          
      <div class="column is-12 prolog">
        <h1 class="title has-text-centered section-title" data-aos="fade-up" data-aos-easing="linear">Konfirmasi Kehadiran</h1>
      </div>
      <div class="column is-12 prolog has-text-centered" data-aos="fade-up" data-aos-easing="linear">
        <p>
          Merupakan suatu kehormatan dan kebahagiaan bagi kami
          <br>
          apabila Bapak/Ibu/Saudara/Saudari berkenan hadir
          memberikan doa restu.
          <br>
          <br>
          Jika bisa hadir kami tunggu konfirmasinya, 
          <br>
          <br>
          Jika tidak memungkinkan untuk hadir di pernikahan kami, tidak mengapa,
          <br> 
          sekali lagi kami mohon doa restunya dan semoga kita bisa berjumpa di lain kesempatan.
          <br>
          <br>
          Stay safe & jaga kesehatan ya :)
        </p>

        <div data-aos="fade-up" data-aos-easing="linear">
          <img src="image/divider-leaves.png" class="divider has-text-centered" alt="~~~">
        </div>

        <p class="" data-aos="fade-up" data-aos-easing="linear">
          Kami yang berbahagia,
          <br>
          <a class="instagram" href="https://instagram.com/niobesad" target="_blank" alt="Instagram Candra">
            <i class="fab fa-instagram"></i> @niobesad
          </a>
          &nbsp
          <a class="instagram" href="https://instagram.com/andhinb" target="_blank" alt="Instagram Andhini">
            <i class="fab fa-instagram"></i> @andhinb
          </a>
        </p>
      </div>
    </section>
  </div>
</section>
<div class="float-container">
  <input type="checkbox" class="playpause-chk-icon"  id="chkbx2" onchange="toggleAudio(this)">
  <label for="chkbx2"></label>
</div>
<div class="container">
  <div class="column is-12 prolog">
    <h1 class="title has-text-centered section-title" data-aos="fade-up" data-aos-easing="linear">Tinggalkan Ucapan</h1>
  </div>
  <?php
    include 'rspv.php';
  ?>
  <h1 class="subtitle"></br></h1>
</div>

<!-- End RSVP Content -->
    </div>
    <!-- End Main Content -->

    <!-- Begin Footer -->
    <div class="footer">
      <div  class="container">
        <a href="#" class="has-vertically-align">
          <p class="has-vertically-align">2023 &copy Candra</p>
        </a>
        <a href="https://bulma.io" class="has-vertically-align">
          <img src="https://bulma.io/images/made-with-bulma.png" alt="Made with Bulma">
        </a>
        <a href="https://www.netlify.com">
          <img src="https://www.netlify.com/img/global/badges/netlify-color-bg.svg" alt="Deploy with Netlify"/>
        </a>
      </div>
    </div>
    <!-- End Footer -->

    <div id="welcomeModal" class="modal has-text-centered" >
      <div class="hero" style="height: 100%;">
        <div class="container has-text-centered">
          <h1 class="subtitle"></br></br></h1>
          <h1 class="subtitle">The Wedding of</br></h1>
          <h2 class="title">Candra & Andhini</h2>
          <h1 id="yth" style="font-size: small;">Yth. kepada Bapak/Ibu/Saudara/i</h1>
          <h1 id="to" style="font-weight: bold; font-size: medium;"></h1>
          <h1 id="invite" style="font-size: x-small; padding-left: 20px; padding-right: 20px;">Tanpa mengurangi rasa hormat, Kami turut mengundang Anda untuk hadir pada acara pernikahan Kami.</h1>
          <button style="margin-top: 10%; padding: 8px; background-color: #bf7877; border: 0ch; border-radius: 5px; color: white;" onclick="closeWelcomeModal()"><i class="far fa-envelope-open"></i> Buka Undangan</button>
        </div>
      </div>
    </div>

    <audio autoplay id="my_audio" loop="loop">
      <source src="./audio/my_love_foryou.mp3" type="audio/mpeg">
    </audio> 

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="js/menikah.js"></script>
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script>
      var slideIndex = 0;
      showSlides();

      function showSlides() {
        var i;
        var slides = document.getElementsByClassName("imageSlide");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 2500); // Change image every 2 seconds
      }
    </script>
    <script>
      AOS.init({
        easing: "ease-out",
        duration: 800,
      });
    </script>
  </body>
</html>
