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
                <button type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-primary mt-4">ADD Employee</button>    
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
                          <th>Name</th>
                          <th>Departement</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                // displaying data
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

                        
      <div id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Expence</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                          <p>Enter Expensence information.</p>
                          <form method="POST">
                              <div class="form-group">
                                  <label>name</label>
                                  <input name="ename" type="text" placeholder="Name of Expense" class="form-control">
                              </div>
                              <select name="type" class="form-select bg-dark text1 aria-label=">
                                <option value="salary">salary</option>
                                <option value="expence">expence</option>
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
                    <?php
                          if(isset($_POST['save'])){
                            $name = $_POST['ename'];
                            $type = $_POST['type'];
                            
                          }



                    ?>