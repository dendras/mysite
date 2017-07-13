<?php include('inc_header.php');?>
      <div class="row">
      </div>
      <div class="row">
    <?php include('inc_left.php');?>
        <div class="col-md-9">

        
    
         
        <div class="row">

        <div class="col-md-12">
        <table class="table table-striped table-hover">
        <thead>
          <tr>
           <th>UID</th>
           <th>User Name</th>
           <th>Email</th>
           <th>Functions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $user->get_alluser();?>
        </tbody>
        <tfoot>
          <tr>
           <th>UID</th>
           <th>User Name</th>
           <th>Email</th>
           <th>Functions</th>
          </tr>
        </tfoot>
        </table>
        
        </div>
        </div>

        </div>
      </div>
      <?php include('inc_footer.php');?>
      