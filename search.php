<?php 
    
    include('config/db.php');
    if(!$_SESSION['login']){
      header("location: index.php");
      die;
   };
   global $useradded;
   include('utilities/navbar.php');
   include('controllers/addpayemnt.php');
   include('./controllers/time.php');

   $search = $_GET['search'];
   
?>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
              <div class="myelements">
                <h2 class="h5 no-margin-bottom">search</h2>
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary mt-4">add payment</button>    
              </div>
            </div>
        </div>
        <section class="no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                  <div class="title"><strong>Payment Table</strong></div>
                  <div class="table-responsive"> 
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Note</th>
                          <th>Expense's name</th>
                          <th>Method</th>
                          <th>Refrence</th>
                          <th>Departement</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                // show data
                                $sqlp = "SELECT * FROM payroll INNER join departement on payroll.depid = departement.depid INNER JOIN expence on payroll.expenceid = expence.expenceid WHERE date LIKE '%$search%' OR note LIKE '%$search%' OR refrence LIKE '%$search%' OR method LIKE '%$search%' OR fname LIKE '%$search%' OR fname LIKE '%$search%' OR depname LIKE '%$search%' ORDER BY payrollid DESC";
                                $result1p = mysqli_query($connection, $sqlp);
                                
                                if (mysqli_num_rows($result1p) > 0) {
                                // output data of each row
                                $def = 10;
                                while($payroll = mysqli_fetch_assoc($result1p)) {
                                  
                                  ?>
                                  
                                    <tr>
                                    <td><?=$payroll['payrollid']?></td>
                                    <td><?=$payroll['amount']?></td>
                                    <td><?=$payroll['date']?></td>
                                    <td><?=$payroll['note']?></td>
                                    <td><?=$payroll['fname']?></td>
                                    <td><?=$payroll['method']?></td>
                                    <td><?=$payroll['refrence']?></td>
                                    <td><?=$payroll['depname']?></td>
                                    
                                    <?php
                                    echo'
                                    <td class="mytd">
                                        <a href="./editpayement.php?id='.$payroll['payrollid'].'"><svg class="smg1" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.3033 2.08777L16.9113 0.695801C16.4478 0.231934 15.8399 0 15.2321 0C14.6242 0 14.0164 0.231934 13.5525 0.69543L0.475916 13.772L0.00462689 18.0107C-0.0547481 18.5443 0.365701 19 0.88783 19C0.920858 19 0.953885 18.9981 0.987654 18.9944L5.22332 18.5265L18.3036 5.44617C19.231 4.51881 19.231 3.01514 18.3033 2.08777ZM4.67818 17.3924L1.2259 17.775L1.61035 14.3175L11.4031 4.52475L14.4747 7.59629L4.67818 17.3924ZM17.4639 4.60676L15.3141 6.7565L12.2426 3.68496L14.3923 1.53521C14.6164 1.31107 14.9148 1.1875 15.2321 1.1875C15.5494 1.1875 15.8474 1.31107 16.0719 1.53521L17.4639 2.92719C17.9266 3.39031 17.9266 4.14363 17.4639 4.60676Z" fill="#00C1FE"/></svg></a>                                    
                                            <a data-toggle="modal" style="cursor: pointer;" data-target="#myModal1'.$def.'"><svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M0.285713 2.25H4L5.2 0.675C5.35968 0.465419 5.56674 0.295313 5.80478 0.178154C6.04281 0.0609948 6.30529 0 6.57143 0L9.42857 0C9.69471 0 9.95718 0.0609948 10.1952 0.178154C10.4333 0.295313 10.6403 0.465419 10.8 0.675L12 2.25H15.7143C15.7901 2.25 15.8627 2.27963 15.9163 2.33238C15.9699 2.38512 16 2.45666 16 2.53125V3.09375C16 3.16834 15.9699 3.23988 15.9163 3.29262C15.8627 3.34537 15.7901 3.375 15.7143 3.375H15.0393L13.8536 16.4637C13.8152 16.8833 13.6188 17.2737 13.3029 17.558C12.987 17.8423 12.5745 17.9999 12.1464 18H3.85357C3.42554 17.9999 3.01302 17.8423 2.69711 17.558C2.38121 17.2737 2.18477 16.8833 2.14643 16.4637L0.960713 3.375H0.285713C0.209937 3.375 0.137264 3.34537 0.083683 3.29262C0.0301008 3.23988 0 3.16834 0 3.09375V2.53125C0 2.45666 0.0301008 2.38512 0.083683 2.33238C0.137264 2.27963 0.209937 2.25 0.285713 2.25ZM9.88571 1.35C9.8323 1.28034 9.76324 1.22379 9.68393 1.18475C9.60463 1.14572 9.51723 1.12527 9.42857 1.125H6.57143C6.48277 1.12527 6.39537 1.14572 6.31606 1.18475C6.23676 1.22379 6.1677 1.28034 6.11429 1.35L5.42857 2.25H10.5714L9.88571 1.35ZM3.28571 16.3617C3.29748 16.5019 3.36245 16.6325 3.46768 16.7277C3.57292 16.8228 3.7107 16.8754 3.85357 16.875H12.1464C12.2893 16.8754 12.4271 16.8228 12.5323 16.7277C12.6376 16.6325 12.7025 16.5019 12.7143 16.3617L13.8929 3.375H2.10714L3.28571 16.3617Z" fill="#00C1FE"/>
                                  </svg></a>                                         
                                    </td>
                                    ';
                                    echo '</tr>';
                                    echo '
                                    <div id="myModal1'.$def.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1'.$def.'" aria-hidden="true" class="modal fade text-left">
                                    <div role="document" class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">DELETE</strong>
                                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">??</span></button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Are you sure u want to DELETE THIS PAYMENT.</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                          <a href="./removepayment.php?id='.$payroll['payrollid'].'" type="button" class="btn btn-danger">DELETE</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                    ';
                                    $def++;
                                }
                                }
                                else {
                                    echo '<div class="alert alert-warning" role="alert">Sorry no result for this search</div>';
                                }
                                if(isset($_GET['user'])){
                                      echo '<div class="alert alert-success" role="alert">Payment was added successfully</div>';
                                  }elseif (isset($_GET['deleted'])) {
                                      echo '<div class="alert alert-danger" role="alert">Payment was deleted successfully</div>';
                                  }elseif(isset($_GET['updated'])){
                                      echo '<div class="alert alert-info" role="alert"> Changes to Payment are saved successfully</div>';
                                  }
                                ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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
    </div>





    <!--modal -->
  
    <!-- Modal-->
            <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
              <div role="document" class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add a user</strong>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">??</span></button>
                  </div>
                  <div class="modal-body">
                    <p>Enter payment information.</p>
                    <form method="POST">
                        <div class="form-group">
                            <label>Amount</label>
                            <input name="amount" type="number" placeholder="Enter amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input name="datee" type="date" placeholder="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <input name="reason" type="text" placeholder="reason for payment" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Refrence</label>
                            <input name="Refrence" type="text" placeholder="Refrence for payment" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="method">Expence</label>
                        <select name="user" class="form-select bg-dark text1 aria-label">
                            <?php
                                $sqldep = "SELECT * FROM expence";
                                $result2 = mysqli_query($connection, $sqldep);
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
                          <label for="method">Payment method</label>
                          <select name="method" class="form-select bg-dark text1 aria-label">
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                            <option value="creditcard">Credit Card</option>
                            <option value="banktransfer">bank transfer</option>
                            <option value="other">Other</option>
                          </select>
                        </div>
                        <div class="form-group">
                        <label for="method">Departement</label>
                        <select name="dep1" class="form-select bg-dark text1 aria-label">
                            <?php
                                $sql = "SELECT * FROM departement";
                                $result = mysqli_query($connection, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($dep = mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$dep['depid'].'">'.$dep['depname'].'</option>';
                                }
                                mysqli_close($connection);
                              } 
                              ?>
                          </select>
                        </div>
                        <div class="form-group">       
                            <button name=payment type="submit" value="payment" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                  </div>
                </div>
              </div>
            </div>
          
      <?php 




include('utilities/footer.php');
?>
