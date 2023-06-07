<?php 
include "config.php";
?>
<!doctype html>
<html>
<head>
     <title>Dynamically load content in Bootstrap Modal with AJAX</title>
     <!-- CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
     
     <!-- Script -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
 </head>
 <body >
     <div class="container" >
          <!-- Modal -->
          <div class="modal fade" id="empModal" >
                <div class="modal-dialog">
 
                      <!-- Modal content-->
                      <div class="modal-content">
                           <div class="modal-header">
                                <h4 class="modal-title">User Info</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                           </div>
                           <div class="modal-body">
 
                           </div>
                           <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                           </div>
                      </div>
                </div>
          </div>
          <br/>

          <!-- Employees List -->
          <table class='table' border='1' style='border-collapse: collapse;'>
               <tr>
                   <th>Name</th>
                   <th>Email</th>
                   <th>&nbsp;</th>
               </tr>
               <?php 
               $query = "select * from employee";
               $result = mysqli_query($con,$query);
               while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $name = $row['emp_name'];
                    $email = $row['email'];

                    echo "<tr>";
                    echo "<td>".$name."</td>";
                    echo "<td>".$email."</td>";
                    echo "<td><button data-id='".$id."' class='userinfo'>Info</button></td>";
                    echo "</tr>";
               }
               ?>
          </table>
 
     </div>
</body>
</html>