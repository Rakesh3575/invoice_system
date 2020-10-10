<div align="right">
	
 <?php echo  $this->session->userdata('login')['username'];
//echo $_SESSION['login']['id']; ?>
&nbsp;  <a href="<?php echo base_url('user/logout');?>">LogOut</a>    
</div>


<div class="container">
	<div class="row">
   <?php 
        $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>
        <div class="alert alert-success" >
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <b><?php print_r($msg); ?></b>
        </div>
        <?php } ?>

		<div class="col-md-6">
			<h2>User Invoice Details</h2>
			<div align="right"><a href="<?php echo base_url('user/create_invoice');?>" class="btn btn-info" >Create Invoice</a></div><br>
			<table id="example" class="display" style="width:100%">
		    <thead>
	         <tr>
	            <th>#</th>
	            <th>User</th>
	            <th>Product</th>
	            <th>Quantity</th>
	            <th>Rate</th>
	            <th>Amout</th>
	            <th>Due</th>
	            <th>Paid</th>
	            <th>Grand Total</th>
	            <th>Acion</th>
	         </tr>
	         </thead>
	         <tbody>
	         	<?php
                  $i=1;
                    if(!empty($invoice)){
                        foreach ($invoice as $val){?>
				       	<tr>
			         		<td><?php echo $i; $i++; ?></td>
			         		<td><?php echo $val->username;?></td>
			         		<td><?php echo $val->name; ?></td>
			         		<td><?php echo $val->quantity; ?></td>
			         		<td><?php echo $val->rate; ?></td>
			         		<td><?php echo $val->amount; ?></td>
			         		<td><?php echo $val->due_amt; ?></td>
			         		<td><?php echo $val->paid_amt; ?></td>
			         		<td><?php echo $val->grand_total; ?></td>
			         		<td> <a href="<?php echo base_url('user/edit_invoice/'); echo $val->id ?>">Edit</a></td>
			          	</tr>
                      <?php }
                    }else{?>
                    	<tr>
			         		<td colspan="7" align="center" style="color: black;font-family:initial; "><?php echo "No Data found"; ?></td>
			         	 </tr>
                    	 
                    <?php }
                  ?>
 	         </tbody>
		        <tfoot>
		            <tr>
		              <th>#</th>
			            <th>User</th>
			            <th>Product</th>
			            <th>Quantity</th>
			            <th>Rate</th>
			            <th>Amout</th>
			             <th>Due</th>
	            		<th>Paid</th>
	            		<th>Grand Total</th>
	            		<th>Action</th>
		            </tr>
		        </tfoot>
		    </table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
    	$('#example').DataTable();
	});
</script>