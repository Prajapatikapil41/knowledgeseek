<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo base_url().'public/css/bootstrap.min.css'; ?>" rel="stylesheet">
  <link href="<?php echo base_url().'public/css/style.css'; ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" /> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lexend&family=Recursive:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
  <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Knowledge Seek</title>
</head>

<body>
  <!-- ------------------------------------Header section------------------------------------- -->

  <div class="header-div" id="topHeader">
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container navbar-container">
        <a class="navbar-brand" href="#">
          <img src="<?php echo base_url().'public/images/logo2.png' ?>">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-blinds-open"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-uppercase" aria-current="page" href="<?php echo base_url(); ?>" style="color: orange;">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="<?php echo base_url().'users/Pages/aboutUs' ?>">About Us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link text-uppercase dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Services
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?php echo base_url().'users/notes' ?>">Notes</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url().'users/papers' ?>">Papers</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url().'users/books' ?>">Books</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="<?php echo base_url().'users/Pages/contactUs' ?>">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="<?php echo base_url().'users/Blogs' ?>">Blogs</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
