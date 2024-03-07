<?php $this->load->view('users/header'); ?>

<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url().'public/images/back.jpg'?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1><a class="navbar-brand" href="#">
            <img src="<?php echo base_url().'public/images/logo2.png' ?>">
          </a></h1>
        <h2>Welcome to Knowledge Seek's Blog <i class="fas fa-blog" style="color:#191970;"></i> Section</h2>
        <p>Technology,Development , and Trends</p>
        <a href="#"><i class="fab fa-facebook-square mx-4" style="font-size:50px;color:orange"></i></a>
        <a href="#"><i class="fab fa-instagram-square mx-4" style="font-size:50px;color:orange"></i></i></a>
        <a href="#"><i class="fab fa-linkedin mx-4" style="font-size:50px;color:orange"></i></a>

      </div>
    </div>
    <div class="carousel-item ">
      <img src="<?php echo base_url().'public/images/back.jpg'?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1><a class="navbar-brand" href="#">
            <img src="<?php echo base_url().'public/images/logo2.png' ?>">
          </a></h1>
        <h2>Welcome to Knowledge Seek's Blog <i class="fas fa-blog" style="color:#191970;"></i> Section</h2>
        <p>Technology,Development , and Trends</p>
        <a><i class="fab fa-facebook-square mx-4" style="font-size:40px;color:blue;"></i></a>
        <a><i class="fab fa-instagram-square mx-4" style="font-size:40px;color:orange"></i></i></a>
        <a><i class="fab fa-linkedin mx-4" style="font-size:40px;color:orange"></i></a>

      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url().'public/images/back.jpg'?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1><a class="navbar-brand" href="#">
            <img src="<?php echo base_url().'public/images/logo2.png' ?>">
          </a></h1>
        <h2>Welcome to Knowledge Seek's Blog <i class="fas fa-blog" style="color:#191970;"></i> Section</h2>
        <p>Technology,Development , and Trends</p>
        <a><i class="fab fa-facebook-square mx-4" style="font-size:50px;color:orange"></i></a>
        <a><i class="fab fa-instagram-square mx-4" style="font-size:50px;color:orange"></i></i></a>
        <a><i class="fab fa-linkedin mx-4" style="font-size:50px;color:orange"></i></a>
      </div>
    </div>
  </div>
</div>


<!-- bottom nav -->
<nav class="navbar navbar-expand-lg navbar-light " style="background-color:orange;margin:0">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContents"
      aria-controls="navbarSupportedContents" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContents">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" onclick="ShowMainCard()" aria-current="page" href="#">Home</a>
        </li>
        <?php if(!empty($category)){
        foreach($category as $cat){?>
        <li class="nav-item" onclick="getCatArticles(<?php echo $cat['id'] ?>)">
          <a href="javascript:void(0);" class="nav-link text-uppercase" id="categoryBtn">
            <?php echo $cat['name'] ?>
          </a>
        </li>

        <?php  }  }else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="#">...</a>
        </li>
        <?php  } ?>


        <li class="nav-item">
          <div id="custom-search-input">
            <div class="input-group ">
              <input type="text" id="search" class="search-query form-control search_bar" placeholder="Search"
                style="border: 5px solid black;border-radius:20px;width:300px" />
            </div>
          </div>
        </li>

      </ul>

    </div>
  </div>
</nav>


<!-- bolgs cards -->
<div class="crads-div mt-5" id="hideCard">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-md-9 col-lg-9 col-12">

        <div class="card mb-3">
          <?php if(!empty($latestArticle)){?>

          <img src="<?php echo base_url().'public/uploads/articles/'.$latestArticle['image'] ?>"
            style="width: 100%; height: 250px;" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $latestArticle['category_name'] ?>
            </h5>
            <p class="card-text px-3">
              <?php echo word_limiter(strip_tags($latestArticle['discription']), 50); ?>
              <a href="<?php echo base_url().'blogs/blogs/' ?>" class="text-primary">
                Read More
              </a>
            </p>

            <div class="d-flex justify-content-between">
              <p class="card-text"><small class="text-muted">Author - <span>
                    <?php echo $latestArticle['author'] ?>
                  </span></small></p>
              <p class="card-text"><small class="text-muted">
                  <?php echo date("y-M-d",strtotime($latestArticle['created_at'])); ?>
                </small></p>
            </div>
          </div>
          <?php }else{ ?>

          <img src="<?php echo base_url().'public/uploads/articles/No-Image.jpg' ?>" style="width: 100%; height: 250px;"
            class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title text-center" style="font-size: 50px; ">
              DATA NOT FOUND
            </h5>
          </div>
          <?php } ?>
        </div>

        <div class="row">
          <?php  if(!empty($allArticles)){ 
                    foreach($allArticles as $article){ ?>
          <div class="col-sm-12 col-md-6 col-lg-6 col-12">
            <div class="card">
              <img src="<?php echo base_url().'public/uploads/articles/'.$article['image'] ?>" class="card-img-top"
                alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $article['category_name'] ?>
                </h5>
                <p class="card-text text-justify">
                  <?php echo word_limiter(strip_tags($article['discription']), 50); ?><a
                    href="<?php echo base_url().'blogs/blogs/' ?>" class="text-primary">
                    read more
                  </a>.
                </p>

                <div class="d-flex justify-content-between">
                  <p class="card-text"><small class="text-muted">Author - <span>
                        <?php echo $article['author'] ?>
                      </span></small></p>
                  <p class="card-text"><small class="text-muted">
                      <?php echo date("y-M-d",strtotime($article['created_at'])); ?>
                    </small></p>
                </div>
                <a href="<?php echo base_url().'index.php/Pages/blogs2' ?>">Click Me</a>
              </div>
            </div>
          </div>
          <?php } } ?>
        </div>

      </div>

      <div class="col-sm-4  col-md-3 col-lg-3 col-12">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
            The current link item
          </a>
          <a href="#" class="list-group-item list-group-item-action">A second link item</a>
          <a href="#" class="list-group-item list-group-item-action">A third link item</a>
          <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
          <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A
            disabled link item</a>
        </div>


        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;margin-top:10px;">
          <div class="card-header">Header</div>
          <div class="card-body">
            <h5 class="card-title">Primary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
          </div>
        </div>

        <div class="card border-light mb-3" style="max-width: 18rem;margin-top:10px;">
          <div class="card-header">Header</div>
          <div class="card-body">
            <h5 class="card-title">Light card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>


<div class="crads-div mt-5" id="showCard">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-md-9 col-lg-9 col-12" id="result">
      </div>

      <div class="col-sm-4  col-md-3 col-lg-3 col-12">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
            The current link item
          </a>
          <a href="#" class="list-group-item list-group-item-action">A second link item</a>
          <a href="#" class="list-group-item list-group-item-action">A third link item</a>
          <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
          <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A
            disabled link item</a>
        </div>


        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;margin-top:10px;">
          <div class="card-header">Header</div>
          <div class="card-body">
            <h5 class="card-title">Primary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
          </div>
        </div>

        <div class="card border-light mb-3" style="max-width: 18rem;margin-top:10px;">
          <div class="card-header">Header</div>
          <div class="card-body">
            <h5 class="card-title">Light card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<!-- blogs end -->


<?php $this->load->view('users/footer'); ?>

<script>
  const getCatArticles = (id) => {
    let html = '';
    $('#hideCard').hide();
    $('#showCard').show();

    $.ajax({
      url: "<?php echo base_url().'users/blogs/getCategoryArticle' ?>",
      data: { cat_id: id },
      method: "get",
      dataType: "json",
      success: function (res) {
        if (res != "") {
          $('#result').html(res);
        } else {

        }
      }
    });
  }

  const ShowMainCard = () => {
    $('#hideCard').show()
    $('#showCard').hide();
  }
  ShowMainCard();

  var search = document.getElementById("search")
  setInterval(function () {
    var color = "rgb(" + Math.floor(Math.random() * 255) + "," + Math.floor(Math.random() * 255) + "," + Math.floor(Math.random() * 255) + ")";
    search.style.borderColor = color;
  }, 1000)

</script>
