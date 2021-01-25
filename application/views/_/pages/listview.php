<!-- Page Content -->
</br>
   <div class="row">
      <div class="col-11">
          <table class="table" id="myTable">
            <thead>
                <tr>
                  <th scope="col">Sr.No</th>
                  <th scope="col">Blogs</th>
                  <th scope="col">Comment</th>
                  <th scope="col">Visibility</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
              <tbody>
                <?php foreach($blogpost as $row): ?>
                <tr> 
                  <th scope="row">1</th>
                  <td><?php echo $row["title"]; ?></td>
                  <td><button type="button" class="btn btn-outline-primary">Show Comment</button></td>
                  <td><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> </button></td>
                  <td>5</td>
                  <td><button type="button" class="btn btn-outline-primary">Edit</button>
                  <button type="button" class="btn btn-outline-danger">Delete</button></td>
                </tr>
                <?php   endforeach;  ?>
            </tbody>
          </table>
      </div>
   </div>
   <div class="row">
      <div class="col-3"> <?php  ?> </div>
      <div class="col-6">m3</div>
      <div class="col-3">r3</div>
    </div>
</div>

<div class="py-5"> </div>
<!-- /.container -->

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js" > </script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>