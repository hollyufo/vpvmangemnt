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
              </div>
            </div>
        </div>
        <?php 
            $payroll_id = $_GET['id'];
            $update = true;
            $sql = "SELECT * FROM payroll WHERE payrollid=$payroll_id";
            $record = mysqli_query($connection, $sql);
            $row = mysqli_fetch_array($record, MYSQLI_ASSOC);
        ?>
        <section class="no-padding-bottom">
          <div class="container-fluid">
          <p>updated payment information.</p>
          <form method="POST">
                        <div class="form-group">
                            <label>Amount</label>
                            <input <?php echo 'value='.$row['payrollamount'].''; ?> name="amount" type="number" placeholder="Enter amount" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input <?php echo 'value='.$row['payrolldate'].''; ?> name="datee" type="date" placeholder="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <input name="reason" <?php echo 'value='.$row['payrollreason'].''; ?> type="text" placeholder="reason for payment" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Refrence</label>
                            <input name="Refrence" <?php echo 'value='.$row['payrollrefrence'].''; ?> type="text" placeholder="Refrence for payment" class="form-control">
                        </div>
                        <select name="user" class="form-select bg-dark text1 aria-label">
                        <?php
                                  $sqldep = "SELECT * FROM employee";
                                  $result2 = mysqli_query($connection, $sqldep);
                                  if (mysqli_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($employee = mysqli_fetch_assoc($result2)) {
                                  echo '<option value="'.$employee['employeeid'].'">'.$employee['firstname'].'</option>';
                                  }
                                  
                                } 
                                ?>
                        </select>
                        <select name="method" class="form-select bg-dark text1 aria-label">
                        <option value="cash">Cash</option>
                        <option value="cheque">Cheque</option>
                        <option value="creditcard">Credit Card</option>
                        <option value="banktransfer">bank transfer</option>
                        <option value="other">Other</option>
                        </select>
                        <div class="form-group">       
                            <input name="updatepayment" type="submit" value="updatepayment" class="btn btn-primary">
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
                    if(isset($_POST['updatepayment'])){


                        $amount =  $_POST['amount'];
                        $date =  $_POST['datee'];
                        $reason = $_POST['reason'];
                        $methode = $_POST['method'];
                        $refrence = $_POST['Refrence'];
                        $user =  $_POST['user'];
                        mysqli_query($connection, "UPDATE payroll SET payrollamount='$amount', payrolldate='$date', payrollreason='$reason', payrollrefrence='$refrence', payrollmethod='$methode', empolyeeid='$user' WHERE payrollid=$payroll_id");
                        echo "<script>window.location.href = './payments.php';</script>";
                        
                        mysqli_close($connection);
                    }
                ?>