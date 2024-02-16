<div id="ordersBtn" >
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Customer</th>
        <th>email</th>
        <th>OrderDate</th>
        <th>Address</th>
        <th>Payment Method</th>
        <th>Product</th>
        <th>Amount</th>
     </tr>
    </thead>
     <?php
      include_once "../config.php";
      $sql="SELECT * from orders";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
         
          <td><?=$row["name"]?></td>
          <td><?=$row["email"]?></td>
          <td><?=$row["phone"]?></td>
          <td><?=$row["address"]?></td>
          <td><?=$row["pmode"]?></td>
          <td><?=$row["products"]?></td>
          <td><?=$row["amount_paid"]?></td>
       </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>