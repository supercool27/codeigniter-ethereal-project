<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Blog Post - Start Bootstrap Template</title>
      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/blog-post.css" rel="stylesheet">
   </head>
   <body>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
         <div class="container">
            <a class="navbar-brand" href="<?php echo base_url('home'); ?>">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="#">Home
                     <span class="sr-only">(current)</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Services</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Contact</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- Page Content -->
      <div class="container">
         <div class="row py-5">
            <!-- Post Content Column -->
            <div class="col-lg-8">
               <!-- Title -->
               <h1 class="mt-4">Post Title</h1>
               <!-- Author -->
               <p class="lead">
                  by
                  <a href="#">Start Bootstrap</a>
               </p>
               <hr>
               <!-- Date/Time -->
               <p>Posted on January 1, 2019 at 12:00 PM</p>
               <?php  ?>
               <?php ?>
               <hr>
               <!-- Preview Image -->
               <img class="img-fluid rounded" src="<?php if(!empty($blogsdata->imagepath)) { echo base_url('images/').$blogsdata->imagepath; } else{?> http://placehold.it/900x300 <?php } ?> "  alt="">
               <hr>
               <!-- Post Content -->
               <p class="lead"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
               <!-- Comments Form -->
               <div class="card my-4">
                  <h5 class="card-header">Leave a Comment:</h5>
                  <div class="card-body">
                     <form method='post' action=<?php echo base_url('insert_comment/'); ?>>
                        <div class="form-group">
                           <textarea name='comment_text' class="form-control" rows="3"> </textarea>
                           <input type='hidden' name='blog_id' value="<?php echo $blog_id; ?>" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </form>
                  </div>
               </div>
               <?php foreach($comments as $row): ?>
               <!-- Single Comment -->
               <div class="media mb-4">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                  <div class="media-body">
                     <h5 class="mt-0"> Commenter Name Not Available </h5>
                     <?php echo $row['comment'];?>
                  </div>
               </div>
               <?php endforeach; ?>
            </div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
               <!-- Search Widget -->
               <div class="card my-4">
                  <h5 class="card-header">Search</h5>
                  <div class="card-body">
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-append">
                        <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                     </div>
                  </div>
               </div>
               <!-- Categories Widget -->
               <div class="card my-4">
                  <h5 class="card-header">Categories</h5>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-lg-6">
                           <ul class="list-unstyled mb-0">
                              <li>
                                 <a href="#">Web Design</a>
                              </li>
                              <li>
                                 <a href="#">HTML</a>
                              </li>
                              <li>
                                 <a href="#">Freebies</a>
                              </li>
                           </ul>
                        </div>
                        <div class="col-lg-6">
                           <ul class="list-unstyled mb-0">
                              <li>
                                 <a href="#">JavaScript</a>
                              </li>
                              <li>
                                 <a href="#">CSS</a>
                              </li>
                              <li>
                                 <a href="#">Tutorials</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Side Widget -->
               <div class="card my-4">
                  <h5 class="card-header">Side Widget</h5>
                  <div class="card-body">
                     You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                  </div>
               </div>
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container -->
      <!-- Footer -->
      <footer class="py-5 bg-dark">
         <div class="container">
            <p class="m-0 text-center text-white">Copyright © Your Website 2020</p>
         </div>
         <!-- /.container -->
      </footer>
      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   </body>
</html>