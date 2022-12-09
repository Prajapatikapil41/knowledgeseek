<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo base_url() . 'public/css/bootstrap.min.css'; ?>" rel="stylesheet">
  <link href="<?php echo base_url() . 'public/css/style.css'; ?>" rel="stylesheet">
  <link rel="icon" href="<?php echo base_url() . "/public/images/fav1.png" ?>" sizes="16x16" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lexend&family=Recursive:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
  <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->

  <title>Knowledge Seek</title>
</head>

<body>
  <!-- ------------------------------------Header section------------------------------------- -->

  <div class="header-div" id="topHeader">
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container navbar-container">
        <a class="navbar-brand" href="<?php echo base_url() ?>">
          <img src="<?php echo base_url() . 'public/images/logo2.png' ?>">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-blinds-open"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-uppercase" aria-current="page" href="<?php echo base_url(); ?>" style="color: <?php echo ($act == 'home') ? 'red' : 'black' ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" id="about" onlick="activateNav('about')" href="<?php echo base_url() . 'about' ?>" style="color: <?php echo ($act == 'about') ? 'red' : 'black' ?>">About Us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link text-uppercase dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: <?php echo ($subAct == 'service') ? 'red' : 'black' ?>">
                Services
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" id="notes" onlick="activateNav('notes')" href="<?php echo base_url() . 'notes' ?>" style="color: <?php echo ($act == 'note') ? 'red' : 'black' ?>">Notes</a></li>
                <li><a class="dropdown-item" id="papers" onlick="activateNav('papers')" href="<?php echo base_url() . 'papers' ?>" style="color: <?php echo ($act == 'paper') ? 'red' : 'black' ?>">Papers</a></li>
                <li><a class="dropdown-item" id="books" onlick="activateNav('books')" href="<?php echo base_url() . 'books' ?>" style="color: <?php echo ($act == 'book') ? 'red' : 'black' ?>">Books</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" id="contact" onlick="activateNav('contact')" href="<?php echo base_url() . 'contact' ?>" style="color: <?php echo ($act == 'contact') ? 'red' : 'black' ?>">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" id="blogs" onlick="activateNav('blogs')" href="<?php echo base_url() . 'blogs' ?>" style="color: <?php echo ($act == 'blog') ? 'red' : 'black' ?>">Blogs</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>