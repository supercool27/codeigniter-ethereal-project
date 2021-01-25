
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
          <a class="btn btn-primary" href="<?php echo base_url()."create" ?>" role="button">+ Create Blog</a>
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
      <div class="col-12">
          <table class="table" id="mytable">
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

    <div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="customSwitch1">
    <label class="custom-control-label" for="customSwitch1">Visibility</label>
    </div>
          <?php $i =1; foreach($blogpost as $row):   ?>
          <tr> 
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $row["title"]; ?></td>
            <td>
            <form id="my_form" method="post" action="admincomment">
              <input type="hidden" name="comment_id" value="<?php echo $row['id']; ?>" />
              <a class="btn btn-primary" href="javascript:{}" onclick="document.getElementById('my_form').submit();">Show Comment</a> 
             </form>
            </td>
            <td> <div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="customSwitch1">
    <label class="custom-control-label" for="customSwitch1">Visibility</label>
</div>
</td>
            <td> <?php echo $row['created']; ?></td>
            <td><a class="btn btn-primary" href="<?php echo base_url()."edittable/"
              .$row['id']; ?>" role="button">Edit</a>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>">
 Delete
</button>
 </tr>
          <?php  $i++; endforeach;  ?>
          </tbody>
          </table>
      </div>
   </div>
   <div class="row">
      <div class="col-3"> <?php echo $link;  ?> </div>
      <div class="col-6">m3</div>
      <div class="col-3">r3</div>
    </div>
</div>

<?php  
// $i =1; 
//  foreach($blogpost_post_page_limit as $row):  
?>
<!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>">
  Launch demo modal
</button> -->


<?php // $i++; endforeach; ?>
<div class="py-5"> </div>
<!-- /.container -->
<!-- Modal -->
<?php  $i =1; 
  foreach($blogpost as $row):  
?>
<div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel<?php echo $i; ?>">Confirmation messages</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you Sure want to delete;
      </div>
      <div class="modal-footer"> 
        <form id="delete" action="delete" method="post">
          <input type="hidden" name="del_id" value="<?php echo $row['id']; ?>" /> 
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php  $i++; endforeach; ?>