<?php 
  
  include('config/db.php');
  if(!$_SESSION['login']){
    header("location: index.php");
    die;
 };
 include('utilities/navbar.php');
  include('./controllers/time.php');
 
?>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">VPV Dashboard</h2>
            <form class="d-flex" style="width: 100%; max-width: 329PX; margin-top: 20px;" action="./search.php">
              <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
              <button style="margin-left: 10px;" class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong>Expenses</strong>
                    </div>
                    <?php
                      $sqlz = "SELECT COUNT(expenceid) AS emp_count FROM expence";
                      $resultz = mysqli_query($connection, $sqlz);
                      $user = mysqli_fetch_assoc($resultz);
                    ?>
                    <div class="number dashtext-1"><?php echo $user['emp_count']?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-contract"></i></div><strong>departement</strong>
                    </div>
                    <?php
                      $sqlq = "SELECT COUNT(depid) AS dep_count FROM departement";
                      $resultq = mysqli_query($connection, $sqlq);
                      $dep = mysqli_fetch_assoc($resultq);
                    ?>
                    <div class="number dashtext-2"><?php echo $dep['dep_count']?></div>
                  </div>

                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>total spent</strong>
                    </div>
                    <?php
                      $month = date('Y')."-".date("m");
                      $sqle = "SELECT SUM(amount) AS pay_count FROM payroll WHERE date like '".$month."-%'";
                      $resulte = mysqli_query($connection, $sqle);
                      $pay = mysqli_fetch_assoc($resulte);
                    ?>
                    <div class="number dashtext-3"><?php if(isset($pay['pay_count'])) { echo $pay['pay_count'];}else { echo "0";}?></div>
                  </div>

                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>users</strong>
                    </div>
                    <?php
                      $sqld = "SELECT COUNT(id) AS user_count FROM users";
                      $resultd = mysqli_query($connection, $sqld);
                      $use = mysqli_fetch_assoc($resultd);
                    ?>
                    <div class="number dashtext-4"><?php echo $use['user_count']?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                <div class="block margin-bottom-sm">
                  <div class="title"><strong>Payment</strong></div>
                  <div class="table-responsive"> 
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Expenses</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                // show data
                                $sqlp = "SELECT * FROM payroll INNER join departement on payroll.depid = departement.depid INNER JOIN expence on payroll.expenceid = expence.expenceid ORDER BY payrollid DESC LIMIT 10";
                                $result1p = mysqli_query($connection, $sqlp);
                                
                                if (mysqli_num_rows($result1p) > 0) {
                                // output data of each row
                                while($payroll = mysqli_fetch_assoc($result1p)) {
                                  ?>
                                  
                                    <tr>
                                    <td><?=$payroll['payrollid']?></td>
                                    <td><?=$payroll['amount']?></td>
                                    <td><?=$payroll['date']?></td>
                                    <td><?=$payroll['fname']?></td>
                                    <?php
                                    echo '</tr>';
                                }
                                }
                                else {
                                    echo '<div class="alert alert-warning" role="alert">Sorry no data available</div>';
                                }
                                ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="block margin-bottom-sm">
                  <div class="title"><strong>Departement</strong></div>
                  <div class="table-responsive"> 
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Expenses</th>
                          <th>Budget</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                // show data for tot spent
                                global $departement;
                                // show data for departement name
                                $sql = "SELECT *, COUNT(expence.expenceid) AS emp_count, SUM(amount) as sum FROM payroll INNER join departement on payroll.depid = departement.depid INNER JOIN expence on payroll.expenceid = expence.expenceid group by departement.depname LIMIT 10;";
                                $result1 = mysqli_query($connection, $sql);
                                
                                if (mysqli_num_rows($result1) > 0) {
                                // output data of each row
                                while($departement = mysqli_fetch_assoc($result1)) {
                                    echo '<tr>';
                                    echo '<td>'.$departement['depid'].'</td>';
                                    echo '<td>'.$departement['depname'].'</td>';
                                    echo '<td>'.$departement['emp_count'].'</td>';
                                    echo '<td>'.$departement['sum'].'</td>';
                                    echo '</tr>';
                                }
                                }
                                else {
                                    echo '<div class="alert alert-warning" role="alert">Sorry no data available</div>';
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
    <?php 
      include('utilities/footer.php')
    ?>