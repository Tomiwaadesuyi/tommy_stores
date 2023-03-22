<?php 
include("frontheader.php");
?>
  <!-- Page Content -->
  
  <div class="container" style='min-height:500px'>

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Admin
      <small>All Customers</small>
    </h1>

     
    <!-- Content Row -->
    <div class="row">
     
      <!-- Content Column -->
      <div class="col-lg-12 mb-4">
      <div style='text-align:right'>
    
    </div>
    <?php 
    if(isset($_REQUEST['msg'])){
      echo "<div class='alert alert-success'>".$_REQUEST['msg']."</div>";
    }
    ?>
     <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S/N</th>
       <th scope="col">Photo</th>
      <th scope="col">Fullname</th>
      <th scope="col">Gender</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email Address</th>
      <th scope="col">Date Joined</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    // create object of user class
    $objuser = new Users;

    $users = $objuser->getusers();

     if(!empty($users)){
    $counter = 0;
      foreach($users as $key => $value){
        $counter++;
      ?>
    <tr>
      <th scope="row"><?php echo $counter; ?></th>
      <td><?php echo $value['profilephoto']?></td>
      <td><?php echo $value['cust_name']?></td>
      <td><?php echo $value['cust_gender']?></td>
      <td><?php echo $value['cust_phone']?></td>
      <td><?php echo $value['cust_email']?></td>
      <td><?php echo date('jS M, Y',strtotime($value['createdat'])); ?></td>
      <td>
        <a href="edit.php?userid=<?php echo $value['user_id']?>" class='btn btn-sm btn-link'><i class='fa fa-trash'></i>&nbsp;Edit</a><br>
        <a href='delete.php' class='btn btn-sm btn-link'><i class='fa fa-trash'></i>&nbsp; Delete</a><br>
        <a href='details.html' class='btn btn-sm btn-link'><i class='fa fa-list'></i>&nbsp; Details</a>
      </td>
    </tr>
    <?php
     }
}  
  ?>
 
  
  </tbody>
</table>

      </div>
    </div>
    <!-- /.row -->
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">1</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">2</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">3</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>

  </div>
  <!-- /.container -->

  <?php 
include("frontfooter.php");
  ?>