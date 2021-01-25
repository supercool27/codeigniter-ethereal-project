<div class="row">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url('home'); ?>">Start Bloging</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <a class="btn btn-primary" href="#" role="button">+ Add Blog</a>
        </ul>
      </div>
    </div>
  </nav>
</div>
<!-- Page Content -->
</br>
 <div class="row mt-5">
   <!--  Blog list view -->
    <div class="col-3">
        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
          <option selected>Choose...</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
    </div>
    <div class="col-6 ">

    </div>
    
    <div class="col-3">
      Search <input type="" name="search" >
    </div>
   
</div>
</br>
   <div class="row">
      <div class="col-11">
          <table class="table">
          <thead>
              <tr>
                <th scope="col">Sr.No</th>
                <th scope="col">Blogs</th>
                <th scope="col">Comment</th>
                <th scope="col"> Visibility</th>
                <th scope="col"> Date</th>
                <th scope="col"> Action</th>
              </tr>
          </thead>
          <tbody>
          <?php foreach($blogpost as $row): ?>
          <tr> 
            <th scope="row">1</th>
            <td><?php echo $row["title"]; ?></td>
            <td><button type="button" class="btn btn- outline-primary">Show Comment</button></td>
            <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> </button></td>
            <td>5</td>
            <td><button type="button" class="btn btn-outline-primary">Edit</button>
             <button type="button" class="btn btn-outline-danger">Delete</button></td>
          </tr>
          <?php endforeach; ?>
          </tbody>
          </table>

      </div>
   </div>
   <div class="row">
      <div class="col-3">l3</div>
      <div class="col-6">m3</div>
      <div class="col-3">r3</div>
    </div>
</div>

<div class="py-5"> </div>
<!-- /.container -->

