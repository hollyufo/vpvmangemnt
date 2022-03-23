<?php 
    
    include('config/db.php');
    if(!$_SESSION['login']){
      header("location: index.php");
      die;
   };
   include('./controllers/time.php');
   global $useradded;
   include('utilities/navbar.php');
   include('controllers/adduser.php');
?>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
              <div class="myelements">
                <h2 class="h5 no-margin-bottom">Dashboard</h2>  
              </div>
            </div>
        </div>
        <?php 
            $employee_id = $_GET['id'];
            $update = true;
            $sql = "SELECT * FROM employee WHERE employeeid=$employee_id";
            $record = mysqli_query($connection, $sql);
            $row = mysqli_fetch_array($record, MYSQLI_ASSOC);
        ?>
        <section class="no-padding-bottom">
          <div class="container-fluid">
          <p>updated user information.</p>
                          <form method="POST">
                              <div class="form-group">
                                  <label>first name</label>
                                  <input name="firstname" type="text" placeholder="last name" class="form-control" value="<?php echo $row['firstname']; ?>">
                              </div>
                              <select name="deb" class="form-select bg-dark text1 aria-label=">
                              <?php
                                  $sqldep = "SELECT * FROM dep";
                                  $result2 = mysqli_query($connection, $sqldep);
                                  if (mysqli_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($departement = mysqli_fetch_assoc($result2)) {
                                  echo '<option value="'.$departement['depid'].'">'.$departement['depame'].'</option>';
                                  }
                                  //mysqli_close($connection);
                                } 
                                ?>
                                </select>
                              <div class="form-group">       
                                  <input type="submit" name="update" value="update" class="btn btn-primary">
                              </div>
                          </form>
          </div>
        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
            </div>
          </div>
        </footer>
      </div>

      <?php 
        include('utilities/footer.php')
      ?>
      <!-- saving edit code -->
      <?php
                    if(isset($_POST['update'])){


                        $firstname =  $_POST['firstname'];
                        $deb = $_POST['deb'];
                        mysqli_query($connection, "UPDATE employee SET firstname='$firstname', depid='$deb' WHERE employeeid=$employee_id");
                        echo "<script>window.location.href = './employee.php';</script>";
                        

                    }
                ?>