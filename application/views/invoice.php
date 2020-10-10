<?php //echo $_SESSION['login']['id']; die; ?>
<section class="content">
  <div class="container"> 
    <div class="row">
      <div class="col-lg-12">
        <!-- general form elements -->     
        
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Invoice System</h3>
          </div><!-- /.box-header -->
          <div class="col-lg-2">
  
           <form method="post" action="<?php echo base_url('user/insert_invoice');?>" id="form">
           <input type="text" name="inv_number" class="form-control" id="inv_number" Placeholder="Enter Invoice Number">
          </div> <br><br><br>    

           <input type="hidden" name="user_id" class="form-control" value="<?php echo $this->session->userdata('login')['id']; ?>">
            <div class="box-body">  
              <table class="table">
                <tr>
                  <th>Product</th>
                  <th>Rate</th>
                  <th>Quantity</th>                   
                  <th>Amount</th>
                  <th></th>
                </tr>
                <tbody>
                  <tr>
                    <td><input type="text" name="product[]" class="form-control" id="product1" Placeholder="Enter product name">
                      <div id="product_valid1"></div>
                    </td>
                    <td><input type="text" name="rate[]" id="rate1" class="form-control" Placeholder="Enter rate ">
                      <div id="rate_valid1"></div>
                    </td>
                    <td><input type="text" name="quantity[]" id="quantity1" class="form-control" Placeholder="Enter quantity ">
                      <div id="quantity_valid1"></div>
                    </td> 
                    <td><input type="text" name="amount[]"  id="amount1" class="form-control" Placeholder="Amount" readonly>
                      <div id="amount_valid1"></div>
                    </td>
                    <td><button type="button" class="btn btn-danger remove"> Remove</button type="button">
                    </td>
                  </tr>
                </tbody>
                <tbody id="append"></tbody>
              </table> 
              <input type="hidden" value="1" id="hide">
              <div class="pull-right">
                <button type="button" class="btn btn-primary add" >+Add Row</button type="button">   
                </div>
                <br><br>
                <table>
                  <tr>
                    <th>Total</th>
                    <td><input type="text" name="sub_total" id="sub_total"class="form-control" placeholder="Sub Total" readonly></td>
                    <td></td>
                  </tr>
                  <tr>
                    <tr>
                    <th> </th>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td></td>
                  </tr>
                   <tr>
                    <th>SGST(%).&nbsp;</th>
                    <td><input type="text" name="sgst_per" id="sgst_per" class="form-control" placeholder="SGST (%)"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th> </th>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td></td>
                  </tr>
                   <tr>
                    <th>SGST Amount&nbsp;</th>
                    <td><input type="text" name="sgst_amount" id="sgst_amount" class="form-control" placeholder="SGST Amount" readonly=""></td>
                    <td></td>
                  </tr>
                      <tr>
                    <td></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th> </th>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td></td>
                  </tr>
                   <tr>
                    <th>CGST(%).&nbsp;</th>
                    <td><input type="text" name="cgst_per" id="cgst_per" class="form-control"  placeholder="CGST(%)"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th> </th>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td></td>
                  </tr>
                   <tr>
                    <th>CGST Amount&nbsp;</th>
                    <td><input type="text" name="cgst_amount" id="cgst_amount" class="form-control" placeholder="CGST Amount" readonly=""></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th> </th>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Due Amount</th>
                    <td><input type="text" name="due_amt" id="due_amt" class="form-control" placeholder="Due Amount"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th> </th>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Paid Amount</th>
                    <td><input type="text" name="paid_amt" id="paid_amt" class="form-control" placeholder="paid Amount" readonly=""></td>
                    <td></td>
                  </tr>
                    <tr>
                    <th> </th>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Grand Total</th>
                    <td><input type="text" name="grand_total" id="grand_total" class="form-control" placeholder="Grand Total"></td>
                    <td></td>
                  </tr>
                 </table>   
              </div><!-- /.box-body -->
            </form>      
          </div>
        </div>   <!-- /.row -->
      </div>   <!-- /.row -->
    </div>   <!-- /.row -->
    <div align="center">
      <button class="btn btn-primary submit">Invoice</button>
    </div>
  </section><!-- /.content -->

  <script type="text/javascript">
$(document).ready(function(){
    //Append new rows
    $('.add').click(function(){
      var start=$('#hide').val();
      var total=Number(start)+1;
      var hide = $('#hide').val(total);
      var tbody=$('#append');
      $('<tr><td><input type="text" name="product[]" class="form-control" id="product'+total+'" Placeholder="Enter product name here "><div id="product_valid'+total+'"></td><td><input type="text" name="rate[]" id="rate'+total+'" class="form-control" Placeholder="Enter rate here "><div id="rate_valid'+total+'"></div></td><td><input type="text" name="quantity[]" id="quantity'+total+'" class="form-control" Placeholder="Enter quantity here "><div id="quantity_valid'+total+'"></div></td><td><input type="text" name="amount[]" id="amount'+total+'" class="form-control" Placeholder="Amount" readonly><div id="amount_valid'+total+'"></div></td><td><button type="button" class="btn btn-danger remove">Remove</button type="button"></td></tr>').appendTo(tbody);
       //remove row   
      $('.remove').click(function(){     
       $(this).parents('tr').remove(); 
         var sub_tot=0;
              $('input[name^="amount"]').each(function(){
              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#sub_total').val(fina);
           
            $('#sgst_per,#cgst_per').keyup(function(){
              var sgst_per =$('#sgst_per').val();
              var cgst_per =$('#cgst_per').val();
            
              var sgst_amount=(parseFloat(fina)*sgst_per/100);
              var cgst_amount=(parseFloat(fina)*cgst_per/100);
             var tot_tax_amt=sgst_amount+cgst_amount
           //  console.log(tot_tax_amt); 
              var gtax=sgst_amount.toFixed(2);
              $('#sgst_amount').val(gtax);
              var cgtax=cgst_amount.toFixed(2);
              $('#cgst_amount').val(cgtax);
              
              var tax_amt=tot_tax_amt.toFixed(2);
              var grand=parseFloat(tax_amt)+parseFloat(fina);
              var gt=grand.toFixed(2);
              $('#grand_total').val(gt);
            });
         });
     });

  /*quantity and price present dynamic*/

      $('#quantity'+total+'').keyup(function(){
        var qty =$(this).val();
        var price =$('#rate'+total+'').val();
        if(qty && price)
        {
          var amount=parseFloat(qty)*parseFloat(price);
          var result=amount.toFixed(2);
          $('#amount'+total+'').val(result);
          var tot=0;
      $('input[name^="amount"]').each(function(){
        tot +=Number($(this).val());         
         var fin=tot.toFixed(2);       
          $('#sub_total').val(fin);

                $('#sgst_per,#cgst_per').keyup(function(){
          var sgst_per =$('#sgst_per').val();
          var cgst_per =$('#cgst_per').val();
        
          var sgst_amount=(parseFloat(fin)*sgst_per/100);
          var cgst_amount=(parseFloat(fin)*cgst_per/100);
         var tot_tax_amt=sgst_amount+cgst_amount
       //  console.log(tot_tax_amt); 
          var gtax=sgst_amount.toFixed(2);
          $('#sgst_amount').val(gtax);
          var cgtax=cgst_amount.toFixed(2);
          $('#cgst_amount').val(cgtax);
          
          var tax_amt=tot_tax_amt.toFixed(2);
          var grand=parseFloat(tax_amt)+parseFloat(fin);
          var gt=grand.toFixed(2);
          $('#grand_total').val(gt);

          //get paid amount
          $('#due_amt').keyup(function(){
              var grnd1 =$('#grand_total').val();
              var due_amt =$(this).val();
              var paid = parseFloat(grnd1)-parseFloat(due_amt)
              $('#paid_amt').val(paid);
           }); 
        });
 
        });
        }
      });
    });
    /*Submit ther form */
    $('.submit').click(function(){
      for(var i=1;i<=$('#hide').val();i++)
      {
        var product=$('#product'+i+'').val();
         var rate=$('#rate'+i+'').val();
        var quantity=$('#quantity'+i+'').val();
        var amount=$('#amount'+i+'').val();
        if(product=='')
        {
          $('#product'+i+'').focus();       
          $('#product_valid'+i+'').html('<div><font color="red">Enter The product name</font><div>');
          $('#product'+i+'').css("border-color", "red");  
          $('#product'+i+'').focus();
          $('#product'+i+'').keyup(function(){      
          $(this).css("border-color", "green");
          });
          return false;
        }
        else
        {
          $('#product_valid'+i+'').hide();
        }
        if(rate=='')
        {
          $('#rate'+i+'').focus();       
          $('#rate_valid'+i+'').html('<div><font color="red">Enter the Rate</font><div>');
          $('#rate'+i+'').css("border-color", "red");  
          $('#rate'+i+'').focus();
          $('#rate'+i+'').keyup(function(){      
            $(this).css("border-color", "green");
          });
          return false;
        }
        else
        {
          $('#rate_valid'+i+'').hide();
        }
        if(rate=='')
        {
          $('#rate'+i+'').focus();       
          $('#rate_valid'+i+'').html('<div><font color="red">Enter the Rate</font><div>');
          $('#rate'+i+'').css("border-color", "red");  
          $('#rate'+i+'').focus();
          $('#rate'+i+'').keyup(function(){      
            $(this).css("border-color", "green");
          });
          return false;
        }
        else
        {
          $('#rate_valid'+i+'').hide();
        }
        if(quantity=='')
        {
          $('#quantity'+i+'').focus();       
          $('#quantity_valid'+i+'').html('<div><font color="red">Enter The Quantity</font><div>');
          $('#quantity'+i+'').css("border-color", "red");  
          $('#quantity'+i+'').focus();
          $('#quantity'+i+'').keyup(function(){      
          $(this).css("border-color", "green");
          });
          return false;
        }
        else
        {
         $('#quantity_valid'+i+'').hide();
       }
       if(amount=='')
       {
        $('#amount'+i+'').focus();       
        $('#amount_valid'+i+'').html('<div><font color="red">Enter The Amount</font><div>');
        $('#amount'+i+'').css("border-color", "red");  
        $('#amount'+i+'').focus();
        $('#amount'+i+'').keyup(function(){      
          $(this).css("border-color", "green");
        });
        return false;
      }
      else
      {
        $('#amount_valid'+i+'').hide();
      }
    }
     $('#form').submit();
  });

//product name for first row

   //on enter the quantity 
  $('#quantity1').keyup(function(){
    var qty =$(this).val();
    var price =$('#rate1').val();
       /*quantity and price present*/
     
    if(qty && price)
    {
       var amount=parseFloat(qty)*parseFloat(price);
      var result=amount.toFixed(2);
      $('#amount1').val(result);
      var tot=0;
    
    $('input[name^="amount"]').each(function(){
      tot +=Number($(this).val());
      var fin=tot.toFixed(2);       
       $('#sub_total').val(fin);
 
        $('#sgst_per,#cgst_per').keyup(function(){
          var sgst_per =$('#sgst_per').val();
          var cgst_per =$('#cgst_per').val();
        
          var sgst_amount=(parseFloat(fin)*sgst_per/100);
          var cgst_amount=(parseFloat(fin)*cgst_per/100);
         var tot_tax_amt=sgst_amount+cgst_amount
       //  console.log(tot_tax_amt); 
          var gtax=sgst_amount.toFixed(2);
          $('#sgst_amount').val(gtax);
          var cgtax=cgst_amount.toFixed(2);
          $('#cgst_amount').val(cgtax);
          
          var tax_amt=tot_tax_amt.toFixed(2);
          var grand=parseFloat(tax_amt)+parseFloat(fin);
          var gt=grand.toFixed(2);
          $('#grand_total').val(gt);
          //get paid amount
          $('#due_amt').keyup(function(){
              var grnd1 =$('#grand_total').val();
              var due_amt =$(this).val();
              var paid = parseFloat(grnd1)-parseFloat(due_amt)
              $('#paid_amt').val(paid);
           }); 


        }); 

    });
      
     }
  });
});
 </script>