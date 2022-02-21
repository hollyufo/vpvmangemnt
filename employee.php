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
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary mt-4">ADD Employee</button>    
              </div>
            </div>
        </div>
        <section class="no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                  <?php 
                  ?>
                  <div class="title"><strong>Employee Table</strong></div>
                  <div class="table-responsive"> 
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Departement</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                // show data
                                $sql = "SELECT * FROM employee INNER join dep on employee.depid = dep.depid";
                                $result1 = mysqli_query($connection, $sql);
                                
                                if (mysqli_num_rows($result1) > 0) {
                                // output data of each row
                                while($employee = mysqli_fetch_assoc($result1)) {
                                    echo '<tr>';
                                    echo '<td class="mytd">'.$employee['employeeid'].'</td>';
                                    echo '<td class="mytd">'.$employee['lastname'].'</td>';
                                    echo '<td class="mytd">'.$employee['firstname'].'</td>';
                                    echo '<td class="mytd">'.$employee['email'].'</td>';
                                    echo '<td class="mytd">'.$employee['phonenumber'].'</td>';
                                    echo '<td class="mytd">'.$employee['depame'].'</td>';
                                    
                                    echo '
                                    <td class="mytd">
                                        <a href="./editemployee.php?id='.$employee['employeeid'].'"><svg class="smg1" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.3033 2.08777L16.9113 0.695801C16.4478 0.231934 15.8399 0 15.2321 0C14.6242 0 14.0164 0.231934 13.5525 0.69543L0.475916 13.772L0.00462689 18.0107C-0.0547481 18.5443 0.365701 19 0.88783 19C0.920858 19 0.953885 18.9981 0.987654 18.9944L5.22332 18.5265L18.3036 5.44617C19.231 4.51881 19.231 3.01514 18.3033 2.08777ZM4.67818 17.3924L1.2259 17.775L1.61035 14.3175L11.4031 4.52475L14.4747 7.59629L4.67818 17.3924ZM17.4639 4.60676L15.3141 6.7565L12.2426 3.68496L14.3923 1.53521C14.6164 1.31107 14.9148 1.1875 15.2321 1.1875C15.5494 1.1875 15.8474 1.31107 16.0719 1.53521L17.4639 2.92719C17.9266 3.39031 17.9266 4.14363 17.4639 4.60676Z" fill="#00C1FE"/></svg></a>                                    
                                        <a href="./removeemployee.php?id='.$employee['employeeid'].'"><svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.285713 2.25H4L5.2 0.675C5.35968 0.465419 5.56674 0.295313 5.80478 0.178154C6.04281 0.0609948 6.30529 0 6.57143 0L9.42857 0C9.69471 0 9.95718 0.0609948 10.1952 0.178154C10.4333 0.295313 10.6403 0.465419 10.8 0.675L12 2.25H15.7143C15.7901 2.25 15.8627 2.27963 15.9163 2.33238C15.9699 2.38512 16 2.45666 16 2.53125V3.09375C16 3.16834 15.9699 3.23988 15.9163 3.29262C15.8627 3.34537 15.7901 3.375 15.7143 3.375H15.0393L13.8536 16.4637C13.8152 16.8833 13.6188 17.2737 13.3029 17.558C12.987 17.8423 12.5745 17.9999 12.1464 18H3.85357C3.42554 17.9999 3.01302 17.8423 2.69711 17.558C2.38121 17.2737 2.18477 16.8833 2.14643 16.4637L0.960713 3.375H0.285713C0.209937 3.375 0.137264 3.34537 0.083683 3.29262C0.0301008 3.23988 0 3.16834 0 3.09375V2.53125C0 2.45666 0.0301008 2.38512 0.083683 2.33238C0.137264 2.27963 0.209937 2.25 0.285713 2.25ZM9.88571 1.35C9.8323 1.28034 9.76324 1.22379 9.68393 1.18475C9.60463 1.14572 9.51723 1.12527 9.42857 1.125H6.57143C6.48277 1.12527 6.39537 1.14572 6.31606 1.18475C6.23676 1.22379 6.1677 1.28034 6.11429 1.35L5.42857 2.25H10.5714L9.88571 1.35ZM3.28571 16.3617C3.29748 16.5019 3.36245 16.6325 3.46768 16.7277C3.57292 16.8228 3.7107 16.8754 3.85357 16.875H12.1464C12.2893 16.8754 12.4271 16.8228 12.5323 16.7277C12.6376 16.6325 12.7025 16.5019 12.7143 16.3617L13.8929 3.375H2.10714L3.28571 16.3617Z" fill="#00C1FE"/>
                                            </svg></a>                                        
                                    </td>
                                    ';
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

      <?php 
        include('utilities/footer.php')
      ?>
      <!-- modal body -->

                        
      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Signin Modal</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                          <p>Enter user information.</p>
                          <form method="POST">
                              <div class="form-group">
                                  <label>Last name</label>
                                  <input name="lastname" type="text" placeholder="first name" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>first name</label>
                                  <input name="firstname" type="text" placeholder="last name" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>Email</label>
                                  <input name="Email" type="email" placeholder="first name" class="form-control">
                              </div>
                              <div class="form-group">       
                                  <label>Phone number</label>
                                  <input name="phone" type="tel" placeholder="phone number" class="form-control">
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
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                    
                          </div>
                        </div>
                      </div>
                    </div>