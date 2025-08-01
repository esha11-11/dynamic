@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
 <div class="container-fluid">
   <div class="row">
<div class="col-12"> 
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Add Invoice page</h4><br><br>
             
             
<div class="row">
                <div class="col-md-1">
                    <div class="md-3">
                        
                        <label for="example-text-input" class=" form-label">Inv No </label>
                        <input class="form-control  example-date-input" type="text" value="{{ $invoice_no }}" name="invoice_no" id="invoice_no" readonly style="background-color:#ddd">
                    </div>
                 </div>

                 <div class="col-md-2">
                    <div class="md-3">
                        
                        <label for="example-text-input" class="form-label"  >Date 
                        </label>
                        <input class="form-control  example-date-input" type="date" 
                        name="date" id="date" value="{{ $date }}"  >
                    </div>
                 </div>


                 

                 
            <div class="col-md-3">
                    <div class="md-3">                        
                        <label for="example-text-input" class="form-label">Category name </label>
                    <select  id="category_id" aria-label="Default select example" name="category_id" class="form-select select2" >
                        <option selected="">Open this select menu</option>
                  @foreach($category as $cat)
                  <option value="{{ $cat->id }}">{{$cat->name }}</option>
                       @endforeach
                    </select>                 
                   </div>
                 </div>

                 <div class="col-md-3">
                    <div class="md-3">                        
                        <label for="example-text-input" class="form-label">product name </label>
                    <select  aria-label="Default select example" name="product_id" id="product_id" class="form-select select2">
                        <option selected="">Open this select menu</option>
                     
                       
                    </select>                 
                   </div>
                 </div>

                 <div class="col-md-1">
                    <div class="md-3">
                        
                        <label for="example-text-input" class=" form-label">Stock(pic/Kg) </label>
                        <input class="form-control  example-date-input" type="text" name="current_stock_qty" id="current_stock_qty" readonly style="background-color:#ddd">
                    </div>
                 </div>

                <div class="col-md-2">
                    <div class="md-3">                        
                        <label for="example-text-input" class="form-label" style="margin-top:43px;"></label>
                         
                         <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore">  Add More</i>          
                   </div>
                 </div>
             </div>
              
        </div>
        <!-- //cardbody// -->
<!-- ---------------------------------------------------- -->
        <div class="card-body">
            <form  method="post" action="{{route('invoice.store') }}">
                @csrf
                <table class="table-sm table-bordered" width="100%" 
                style="border-color: #ddd;">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th width="7%">PSC/KG</th>
                        <th width="10%">Unite Price</th>
                        <th width="15%">Total Price</th>
                        <th width="7%">Action</th>
                       
                    </tr>
                </thead>
                    <tbody id="addRow" class="addRow">
                       
                    </tbody>
                    <tbody>
                        <tr>
                             <td colspan="4">Discount</td>
                            <td>
                                <input type="text" name="discount_amount" 
                                 id="discount_amount"
                                class="form-control discount_amount" 
                                placeholder="Discount amount">
                            </td>                            

                        </tr>

                         <tr>
                            <td colspan="4">Grand Total</td>
                            <td>
                                <input type="text" name="estimated_amount" value="0" id="estimated_amount"
                                class="form-control estimated_amount" readonly style="background-color:#ddd; ">
                            </td>
                           
                        </tr>
                    </tbody>

                </table>
                <br>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <textarea name="description" class="form-control" id="description" placeholder="write description"></textarea>
                    </div>
                </div>
                <br>
                

                <div class="row">
                    <div class="form-group col-md-3">
                        <label > Paid Status</label>
                        <select name="paid_status" id="paid_status" class="form-select">
                            <option value="">Select Status</option>
                            <option value="full_paid">Full Paid </option>
                            <option value="full_due">Full Due </option>
                            <option value="partial_paid">Partial paid </option>
                        </select>
                        <input type="text" name="payed_amount" class="form-control payed_amount" placeholder="Enter Paid Amount" style="display: none;">
                    </div>


                <div class="form-group col-md-9">
                      <label > Customer Name</label>
                        <select name="customer_id" id="customer_id" class="form-select">
                            <option value="">Select Customer</option>
                            @foreach($customer as $cust)
                            <option value="{{$cust->id}}">{{$cust->name}} - {{$cust->mobile_no}}  </option>
                           @endforeach
                   <option value="0" >New Customer</option>

                        </select>
                </div>
                </div>
                <br>
               <!--  Hide add customer form -->
                <div class="row new_customer" style="display: none">
                    <div class="form-group col-md-4">
                      <input type="text" name="name" id="name" class="form-control" placeholder="write customer name">  
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="write customer mobile_no">  
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="email" id="email" class="form-control" placeholder="write customer email">  
                    </div>
                </div>
                <br>
               <!-- end Hide add customer form -->


                <div class="form-group">
                    <button type="sumbit" class="btn btn-info" id="storeButton"> Invoice Store</button>
                </div>
            </form>



            
        </div>
 <!-- //cardbody// -->
    </div>
</div> <!-- end col -->
                </div>         
   </div><!-- end col -->
</div>





<script id="document-tamplate" type="text/x-handlebars-template">
      <tr class="delete_add_more_item" id="delete_add_more_item">
    <input type="hidden" name="date" value="@{{date}}">
    <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
    
    <td>
  <input type="hidden" name="category_id[]" value="@{{category_id}}">
 @{{ category_name }}
</td>

   <td>
  <input type="hidden" name="product_id[]" value="@{{product_id}}">
 @{{ product_name }}
</td>

<td>
      <input type="number" min="1" class="form-control selling_qty text-right" name="selling_qty[]" >
</td>

<td>
      <input type="number"  class="form-control unit_price text-right" name="unit_price[]" value="" >
</td>

<td>
      <input type="number" class="form-control selling_price text-right" name="selling_price[]" value="0" readonly>
</td>

 <td>
     <i class="btn btn-danger btn-sm fas fa-window-close removeevent"></i>
 </td>
</tr>
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click",".addeventmore", function(){
            var date = $('#date').val();
            var invoice_no = $('#invoice_no').val();
           
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
           
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();
             if (date == '') {
                $.notify("Date is required" , {globalposition:'top right', className:'error'});
                return false;
            }

             if (category_id == '') {
                $.notify("category is required" , {globalposition:'top right', className:'error'});
                return false;
            }


             if (category_id == '') {
                $.notify("category_id field is required" , {globalposition:'top right', className:'error'});
                return false;
            }
            var source = $("#document-tamplate").html();
            var tamplate = Handlebars.compile(source);
            var data = {
                date:date,
                invoice_no:invoice_no,
                category_id:category_id,
                category_name:category_name,
                product_id:product_id,
                product_name:product_name

            };
            var html = tamplate(data);
            $("#addRow").append(html);
        });
        $(document).on("click",".removeevent",function(event){
            $(this).closest(".delete_add_more_item").remove();
            totalAmountPrice();

        });

        $(document).on('keyup click', '.unit_price,.selling_qty', function(){
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.selling_qty").val();
            var total = unit_price* qty;
            $(this).closest("tr").find("input.selling_price").val(total);
           // to subtract dis count amount
            $('#discount_amount').trigger('keyup');
        });
        $(document).on('keyup','#discount_amount',function(){
            totalAmountPrice();
        });

        // calculate sum of amount in involve
        function totalAmountPrice(){
            var sum = 0;
            $(".selling_price").each(function(){
            var value = $(this).val();
            if(!isNaN(value) && value.length != 0){
                sum += parseFloat(value);

            }
            });
            var discount_amount =  parseFloat($('#discount_amount').val());
            if(!isNaN(discount_amount) && discount_amount.length != 0){
                sum -= parseFloat(discount_amount);

            }
            $('#estimated_amount').val(sum);

        }

    });
</script>





<script type="text/javascript">
    $(function(){
        $(document).on('change', '#category_id', function(){
            var category_id = $(this).val();
            $.ajax({
                url:"{{route('get-product')}}",
                type:"GET",
                data:{category_id:category_id},
                success:function(data){
                    var html = '<option value="">select product</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.id+' "> '+v.name+'</option>';

                    });
                    $('#product_id').html(html);
                }

            })
        });
    });
</script>


<script type="text/javascript">
    $(function(){
        $(document).on('change', '#product_id', function(){
            var product_id = $(this).val();
            $.ajax({
                url:"{{route('check-product-stock')}}",
                type:"GET",
                data:{product_id:product_id},
                success:function(data){
                    $('#current_stock_qty').val(data);
                }

            })
        });
    });
</script>

<script type="text/javascript">
    $(document).on('change', '#paid_status', function(){
        var paid_status = $(this).val();
        if (paid_status == 'partial_paid') {
            $('.payed_amount').show();

        }
        else{
            $('.payed_amount').hide();

        }
    });
</script>

<script type="text/javascript">
    $(document).on('change', '#customer_id', function(){
        var customer_id = $(this).val();
        if (customer_id == '0') {
            $('.new_customer').show();

        }
        else{
            $('.new_customer').hide();

        }
    });
</script>


@endsection 


