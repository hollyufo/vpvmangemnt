<?php 
    
    include('config/db.php');
    if(!$_SESSION['login']){
      header("location: index.php");
      die;
   };
   global $useradded;
   include('utilities/navbar.php');
   include('./controllers/time.php');
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
            $dep_id = $_GET['id'];
            $update = true;
            $sql = "SELECT * FROM dep WHERE depid=$dep_id";
            $record = mysqli_query($connection, $sql);
            $row = mysqli_fetch_array($record, MYSQLI_ASSOC);
        ?>
        <section class="no-padding-bottom">
          <div class="container-fluid">
          <p>updated Departement information.</p>
          <form method="POST">
                        <div class="form-group">
                            <label>Departement Name</label>
                            <input <?php echo 'value='.$row['depame'].''; ?> name="name" type="text" placeholder="Enter amount" class="form-control" >
                        </div>
                        <div class="form-group">       
                            <input name="updatedepartement" type="submit" value="updatedepartement" class="btn btn-primary">
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
                    if(isset($_POST['updatedepartement'])){


                        $name =  $_POST['name'];
                        mysqli_query($connection, "UPDATE dep SET depame='$name' WHERE depid=$dep_id");
                        echo "<script>window.location.href = './departement.php';</script>";
                        
                        mysqli_close($connection);
                    }
                ?>