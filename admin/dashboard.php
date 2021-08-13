<?php 
include 'inc/Functions.php';
include 'parts/header.php';
?>
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">User Transaction</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary text-center">User Transaction</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>SN</th>
                        <th>User Id</th>
                        <th>From No</th>
                        <th>To No</th>
                        <th>Amount</th>
                        <th>Transaction ID</th>
                        <th>Time</th>
                        <th>Status</th>
                        <!-- <span class="badge badge-danger">Pending</span> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $assignmentor = new Assignmentor();
                    $sql = "SELECT * FROM user_account";
                    if($excute = $assignmentor->con->query($sql)){
           $i = 1;
        while($row = $excute->fetch_assoc()){ ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['sender']; ?></td>
        <td><?php echo $row['fromno']; ?></td>
        <td><?php echo $row['tono']; ?></td>
        <td><?php echo $row['amount']; ?></td>
        <td><?php echo $row['trxid']; ?></td>
        <td><?php echo $row['time']; ?></td>
        <td>
            <?php 
            if($row['status']=="pending"){ ?>
                <div class="flex_column icon_d red">
                    <a href="trans_verification.php?id=<?php echo $row['id']; ?>">
                       <span class="badge badge-danger">Pending</span>
                    </a>
                </div>
           <?php }else{ ?>
            <div class="flex_column icon_d green">
                    <span class="badge badge-success">Verified</span>
                </div>
           <?php }
            ?>
        </td>
        </tr>
       </tr>
       <?php
       $i++;
    }
    }
       ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
    <?php include 'parts/footer.php'; ?>