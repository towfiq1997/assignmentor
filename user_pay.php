<?php require 'template/header.php'; ?>
    <div class="payment_section flex my-2 p-2">
             <form action="POST" class="pay_tbl" style="padding-bottom: 40px;">
                <h2 class="text-center" style="width: 100%; background-color: black; color: white;">Payment</h2>
                 <table class="user_pay">
                     <tr>
                         <td>User Name</td>
                         <td>Tahsin Doeee</td>
                     </tr>
                     <tr>
                        <td>User Email</td>
                        <td>nishan@gmail.com</td>
                     </tr>
                     <tr>
                        <td>Solver Name</td>
                        <td>Nishan Doeee</td>
                     </tr>
                     <tr>
                        <td>Solver Email</td>
                        <td>nishan@gmail.com</td>
                     </tr>
                     <tr>
                        <td>Assignment Id</td>
                        <td>Nishan</td>
                     </tr>
                     <tr>
                         <td colspan="2" class="no_padding">
                             <div class="my-2">
                                <input type="number" name="pay_amt" placeholder="Enter Amount to pay">
                             </div>
                         </td>
                     </tr>
                     <tr>
                         <td colspan="2" class="no_padding">
                             <input type="submit" class="btn" name="pay" value="Pay">
                         </td>
                     </tr>
                 </table>
             </form>
    </div>
    <?php require 'template/footer.php'; ?>