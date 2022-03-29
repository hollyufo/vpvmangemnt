<?php 
    
    include('config/db.php');
    if(!$_SESSION['login']){
      header("location: index.php");
      die;
   };
   global $useradded;
   include('utilities/navbar.php');
   include('controllers/adduser.php');
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
            $payroll_id = $_GET['id'];
            $update = true;
            $sql = "SELECT * FROM payroll INNER join departement on payroll.depid = departement.depid INNER JOIN expence on payroll.expenceid = expence.expenceid WHERE payrollid=$payroll_id";
            $record = mysqli_query($connection, $sql);
            $row = mysqli_fetch_array($record, MYSQLI_ASSOC);
        ?>
        <section class="no-padding-bottom">
          <div class="container-fluid">
          <p>updated payment information.</p>
          <form method="POST">
                        <div class="form-group">
                            <label>Amount</label>
                            <input <?php echo 'value='.$row['amount'].''; ?> name="amount" type="number" placeholder="Enter amount" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input <?php echo 'value='.$row['date'].''; ?> name="date" type="date" placeholder="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <input name="note" <?php echo 'value='.$row['note'].''; ?> type="text" placeholder="reason for payment" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Refrence</label>
                            <input name="Refrence" <?php if(!empty($row['refrence'])){ echo 'value='.$row['refrence'].'';} ?> type="text" placeholder="Refrence for payment" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="test">Expence</label>
                          <select name="expence" class="form-select bg-dark text1 aria-label">
                        <?php
                                  $sqldep = "SELECT * FROM expence";
                                  $result2 = mysqli_query($connection, $sqldep);
                                  echo '<option selected value="'.$row['expenceid'].'">'.$row['fname'].'</option>';
                                  if (mysqli_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($employee = mysqli_fetch_assoc($result2)) {
                                  echo '<option value="'.$employee['expenceid'].'">'.$employee['fname'].'</option>';
                                  }
                                  
                                } 
                                ?>
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="test2">Departement</label>
                          <select name="departement" class="form-select bg-dark text1 aria-label">
                            <?php
                                      $sqlde = "SELECT * FROM departement";
                                      $resulta = mysqli_query($connection, $sqlde);
                                      echo '<option selected value="'.$row['depid'].'">'.$row['depname'].'</option>';
                                      if (mysqli_num_rows($resulta) > 0) {
                                      // output data of each row
                                      while($dep = mysqli_fetch_assoc($resulta)) {
                                      echo '<option value="'.$dep['depid'].'">'.$dep['depname'].'</option>';
                                      }
                                      
                                      } 
                                    ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="test">Payment method</label>
                          <select name="method" class="form-select bg-dark text1 aria-label">
                          <?php echo '<option selected value="'.$row['method'].'">'.$row['method'].'</option>'; ?> 
                          <option value="cash">Cash</option>
                          <option value="cheque">Cheque</option>
                          <option value="creditcard">Credit Card</option>
                          <option value="banktransfer">bank transfer</option>
                          <option value="other">Other</option>
                                    </select>
                        </div>

                          
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
                        $date =  $_POST['date'];
                        $reason = $_POST['note'];
                        $methode = $_POST['method'];
                        $refrence = $_POST['Refrence'];
                        $user =  $_POST['expence'];
                        $category = $_POST['departement'];
                        mysqli_query($connection, "UPDATE payroll SET amount='$amount', date='$date', note='$reason', refrence='$refrence', method='$methode', expenceid='$user', depid ='$category' WHERE payrollid=$payroll_id");
                        header('location: payments.php?updated=true');
                        
                        mysqli_close($connection);
                    }
                ?>