<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url('home'); ?>">Start Bloging</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <button type="button" class="btn btn-secondary btn-lg">Large button</button>
        </ul>
      </div>
    </div>
  </nav>
<!-- Page Content -->
  <div class="container mt-5" >
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8 mt-5">
<div>
<?php  validation_errors(); ?>
</div>
 <form enctype="multipart/form-data" method='post' action="/create" >

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Blog title</label>
      <input type="text" value='<?php echo set_value('blog_title');?>' name="blog_title" class="form-control" id="validationCustom03"  >
    </div>
    <div class="col-md-6 mt-5">
    <small class='p_validate' style="color:red;"><?php echo form_error('blog_title'); ?> </small> </div>
  </div>
  <div class="form-group"> 
  <?php     
      // $options = array(
      // 'name' => 'blogtextarea',
      // 'class'=>'form-control',
      // 'rows' => '4',
      // 'cols' => '50',
      // 'value'=>  set_value('blogtextarea')
      // );
      // form_textarea($options); 
  ?>
    <label for="inputAddress">Blog Description</label>
          <textarea name="blogtextarea">  </textarea>
                  <script>
                          CKEDITOR.replace('blogtextarea');
                  </script>

    <small style="color:red;"> <?php  echo form_error('blogtextarea');
    ?> </small>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="exampleFormControlFile1">Image for Uploading</label>
      <small style="color:red;"><?php echo form_error('profile_image');
    ?> </small>

      <input id="imgInp" type="file" name='profile_image' onchange="readURL(this)" class="form-control-file" >
    </div>
    <div class="form-group col-md-6">
    <div class="form-group">
      <label for="exampleFormControlFile1"></label>

      <img class="float-left " id="blah" src=""   />
    </div>

    </div>
  </div>

  <div class="form-group col-md-6">
      <label class="form-check-label" for="flexRadioDefault1">
        Visibility
      </label>
  </div>
  <div class="form-group col-md-6">
      <label class="form-check-label" for="flexRadioDefault1">
        
      </label>
  </div>


<div class="form-group col-md-6">
    <div class="form-check">
    <input value=1 class="form-check-input" type="radio" name="status" id="flexRadioDefault1">
    <label class="form-check-label" for="flexRadioDefault1">
      Show
    </label>
    </div>
</div>

<div class="form-group col-md-6">  
  <div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
      Hide
  </label>
</div>
</div>
  <button  type="submit" class="btn btn-primary">Create Post</button>
</form>

<script>        
      function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result).width(80).height(80);
      }
         reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
      }

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </div>
  <!-- /.container -->
