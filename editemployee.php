<?php 
    
    include('config/db.php');
    if(!$_SESSION['login']){
      header("location: index.php");
      die;
   };
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
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary mt-4">Form in simple modal </button>    
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
                                  <label>Last name</label>
                                  <input name="lastname" type="text" placeholder="first name" class="form-control" value="<?php echo $row['lastname']; ?>"> 
                              </div>
                              <div class="form-group">
                                  <label>first name</label>
                                  <input name="firstname" type="text" placeholder="last name" class="form-control" value="<?php echo $row['firstname']; ?>">
                              </div>
                              <div class="form-group">
                                  <label>Email</label>
                                  <input name="Email" type="email" placeholder="first name" class="form-control" value="<?php echo $row['email']; ?>">
                              </div>
                              <div class="form-group">       
                                  <label>Phone number</label>
                                  <input name="phone" type="tel" placeholder="phone number" class="form-control" value="<?php echo $row['phonenumber']; ?>">
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
                                  mysqli_close($connection);
                                } 
                                ?>
                                </select>
                              <div class="form-group">       
                                  <input type="submit" name="save" value="save" class="btn btn-primary">
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
                    if(isset($_POST['save'])){


                        $firstname =  $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $Email = $_POST['Email'];
                        $Phone =  $_POST['phone'];
                        $deb = $_POST['deb'];
                        mysqli_query($connection, "UPDATE employee SET lastname='$lastname', firstname='$firstname', email='$Email', deb='$deb' WHERE employeeid=$employee_id");
                        echo "<script>window.location.href = './employee.php';</script>";
                        

                    }
                ?>