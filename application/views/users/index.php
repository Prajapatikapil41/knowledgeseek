<?php $this->load->view('users/header'); ?>
<section class="main-section" id="mainSec">
	<div class="main-div">
		<div class="center-div">
			<h1 class="text-uppercase" data-aos="zoom-out" data-aos-duration="2000">
				Welcome To <span style="color: orange">Knowledge Seek</span>
			</h1>
			<div class="card-extra-div">
				<div class="container" data-aos="fade-up" data-aos-duration="2000">
					<div class="row">
						<div class="col-lg-3 col-md-2 col-12"></div>
						<div class="extra-div col-lg-2 col-md-2 col-12" id="s1">
							<a href="<?php echo base_url() . 'notes' ?>"><i class="fa-3x fab fa-leanpub" aria-hidden="true"></i>
								<h2>NOTES</h2>
							</a>
						</div>
						<div class="extra-div col-lg-2 col-md-2 col-12" id="s2">
							<a href="<?php echo base_url() . 'books' ?>"><i class="fa-3x fas fa-book" aria-hidden="true"></i>
								<h2>BOOKS</h2>
							</a>
						</div>
						<!-- <i class="fas fa-scroll"></i> -->
						<div class="extra-div col-lg-2 col-md-2 col-12" id="s3">
							<a href="<?php echo base_url() . 'blogs' ?>"><i class="fa-3x fas fa-graduation-cap" aria-hidden="true"></i>
								<h2>BLOGS</h2>
							</a>
						</div>
						<div class="col-lg-3 col-md-2 col-12"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="wave wave1"></div>
	</div>
</section>

<!-- ------------------------------------------------------------------------------ -->
<!--                                  small discription                            -->
<!-- ------------------------------------------------------------------------------ -->

<section class="info">
	<div class="container" data-aos="flip-up">
		<h1 id="typed">Education is not the learning of facts, Rather it's the traning of the mind to think ❕❕</h1>
		<h4 class="d-flex justify-content-end" style="color:white;">BY - &nbsp; <span> ALBERT EINSTEIN</span></h4>
		<a href="#CTA_about" class="btnLink">
			<img src="<?php echo base_url() . 'public/images/arrow.png'; ?>" />
		</a>
	</div>

</section>



<!-- ------------------------------------------------------------------------------ -->
<!--                                   about us                                     -->
<!-- ------------------------------------------------------------------------------ -->

<section class="about-section" data-aos="fade-up" data-aos-anchor-placement="top-bottom" id="#CTA_about">

	<div class="container">
		<div class="aboutHeading" id="about">
			<h1 class="text-uppercase text-center"><span>About</span> us</h1>
			<h6 class="text-uppercase text-center">Who we are</h6>
			<h3 class="text-center">
				<span><i class="fas fa-user" aria-hidden="true" style="font-size: 25px"></i></span>
			</h3>
		</div>
		<div class="row aboutContain">
			<div class="col-lg-5">
				<div class="left-about">
					<center>
						<img src="<?php echo base_url() . 'public/images/ablogo.png' ?>" />
					</center>
				</div>
			</div>

			<div class="col-lg-7 ">
				<div class="right-about">
					<h3 class="text-uppercase">
						<span>we are</span> Knowledge Seek...
					</h3>
					<hr />
					<p>
						Knowledge Seek is an educational pulpit. Our main aim is to help the students to become
						exclusive in their respective field
						We provide filtered and fruitfull learning materials to the students of SVVV(Indore).
						Our motive is to Help SVVV's Students by providing effective,well
						organized and fathomable educational resourses
						You will get Filtered Notes,Previous Year Question Papers,e-Books and interesting blogs
						regarding to your respective Fieds or subjects. <a href="<?php echo base_url("about") ?>" class="about_btn">More...</a>
					</p>
				</div>
			</div>
		</div>
	</div>

</section>

<!-- ------------------------------------------------------------------------------ -->
<!--                                   services                                     -->
<!-- ------------------------------------------------------------------------------ -->

<section class="service-section">
	<div class=" serviceHeading" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
		<h1 class="text-uppercase text-center"><span>Our</span> Services</h1>
		<h6 class="text-uppercase text-center">what we Provide</h6>
		<h3 class="text-center">
			<span><i class="fas fa-user" aria-hidden="true" style="font-size: 25px; color:#fff;"></i></span>
		</h3>
	</div>
	<div class="container cardConatiner" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
		<div class="card-div">
			<div class="row text-center">
				<div class="col-lg-4 col-sm-6">
					<div class="card mb-4">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img class="img" src="public/images/note.png" />
							</div>
							<div class="flip-card-back">
								<i class="fas fa-clipboard  fa-5x" style="margin-top: 30px; color: orange"></i><br />

								<div class="card-body">
									<div class="card-btn">
										<a href="<?php echo base_url() . 'notes' ?>">Notes</a>
									</div>
								</div>
								<div class="wave"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6">
					<div class="card mb-4">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img class="img" src="public/images/book.png" />
							</div>
							<div class="flip-card-back">
								<i class="fas fa-books fa-5x" style="margin-top: 30px; color: orange"></i><br />

								<div class="card-body">
									<div class="card-btn">
										<a href="<?php echo base_url() . 'books' ?>">Books</a>
									</div>
								</div>
								<div class="wave"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6">
					<div class="card mb-4">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img class="img" src="public/images/blog.png" />
							</div>
							<div class="flip-card-back">
								<i class="fas fa-blog  fa-5x" style="margin-top: 30px; color: orange"></i><br />

								<div class="card-body">
									<div class="card-btn">
										<a href="<?php echo base_url() . 'blogs'; ?>">Blogs</a>
									</div>
								</div>
								<div class="wave"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- <center> -->
				<!-- <div class="col-lg-4 col-sm-6">
					<div class="card mb-4">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img class="img" src="public/images/main.png" />
							</div>
							<div class="flip-card-back">
								<i class="fas fa-books fa-5x" style="margin-top: 30px; color: orange"></i><br />

								<div class="card-body">
									<div class="card-btn">
										<a href="#">Check It</a>
									</div>
								</div>
								<div class="wave"></div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- </center> -->
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-6 col-sm-6 col-md-4 col-lg-4">
				<div class="cards">
					<img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg">
					<div class="card-texts">
						<h5> hello</h5>
					</div>
				</div>
			</div>

			<div class="col-6 col-sm-6 col-md-4 col-lg-4">
				<div class="cards">
					<img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg">
					<div class="card-texts">
						<h5> hello</h5>
					</div>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-4 col-lg-4">
				<div class="cards">
					<img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg">
					<div class="card-texts">
						<h5> hello</h5>
					</div>
				</div>
			</div>
		</div> -->
</section>

<!-- ------------------------------------------------------------------------------ -->
<!--                                blogs Section                                   -->
<!-- ------------------------------------------------------------------------------ -->

<section class="blog-section mt-5">
	<div class="container blog-container" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
		<div class="blogHeading">
			<h1 class="text-uppercase text-center"><span>Our</span> Blogs</h1>
			<h6 class="text-uppercase text-center">our popular blogs</h6>
			<h3 class="text-center">
				<span><i class="fas fa-user" aria-hidden="true" style="font-size: 25px"></i>
				</span>
			</h3>
		</div>

		<div class="blogs-div">
			<div class="owl-carousel">
				<?php if (!empty($homearticle)) {
					foreach ($homearticle as $article) {
						if ($article['status'] == 1) {
				?>
							<div class="card3">
								<div class="row">
									<div class="col-12 col-sm-8 col-md-6 col-lg-4 indexlogCard">
										<div class="card">
											<img class="card-img" src="<?php echo base_url() . 'public/uploads/articles/' . $article['image'] ?>" alt="<?php echo word_limiter(strip_tags($article['title']), 4) ?> image">
											<div class="card-img-overlay">
												<a href="<?php echo base_url() . 'blogpost/' . $article['id'] ?>" class="btn btn-light btn-sm"><?php echo $article['category_name'] ?></a>
											</div>
											<div class="card-body">
												<h4 class="card-title"> <?php echo word_limiter(strip_tags($article['title']), 4) ?></h4>
												<!-- <small class="text-muted cat">
													<i class="far fa-clock text-info"></i> 30 minutes
													<i class="fas fa-users text-info"></i> 4 portions
												</small> -->
												<p class="card-text"><?php echo word_limiter(strip_tags($article['discription']), 10) ?></p>
												<a href="<?php echo base_url() . 'blogpost/' . $article['id'] ?>" class="btn btn-light" style="background-color: #ff4e00;background-image: linear-gradient(315deg, #ff4e00 0%, #ec9f05 74%); color: #fff; cursor: pointer;">Read Blog</a>
											</div>
											<div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
												<div class="views"><i class="far fa-clock text-danger"></i>&nbsp<?php echo date("y-M-d", strtotime($article['created_at'])); ?>
												</div>
												<div class="stats">
													<i class="fas fa-users text-danger"></i>&nbsp<?php echo $article['author']; ?>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="card3 ">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="card bg-dark text-white cards">
								<img src="<?php echo base_url() . 'public/uploads/articles/' . $article['image'] ?>"
									class="card-img blogImg" alt="...">
								<div class="card-img-overlay">
									<h5 class="card-title">
										<?php echo $article['category_name'] ?>
									</h5>
									<p class="card-text">
										<?php echo word_limiter(strip_tags($article['title']), 4) ?>
									</p>
									<p>
										<?php echo word_limiter(strip_tags($article['discription']), 10) ?>
									</p>
									<h4 class="auth">Author <span>
											<?php echo $article['author']; ?>
										</span></h4>
									<a href="<?php echo base_url() . 'blogpost/' . $article['id'] ?>"
										class="btn btn-primary blogBtn">Read Article <i
											class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<?php }
					}
				} ?>
			</div>
		</div>
	</div>
</section>


<?php $this->load->view('users/footer'); ?>