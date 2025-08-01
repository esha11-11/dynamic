 @extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Supplier and Product Wise Report</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
<!--                     <a href="{{route('stock.report.pdf')}}" target="_blank" class="btn btn-dark btn-rounded waves-effect waves-effect waves-light" style="float:right;"><i class="fas fa-print">Stock Report Print</i></a>
 -->             

                    
<div class="row">
    <div class="col-md-12 text-center">
        <strong> Supplier Wise Report </strong>
        <input type="radio" name="supplier_product_wise" value="supplier_wise" class="search_value">&nbsp;&nbsp;
       
        <strong> Product Wise Report </strong>
        <input type="radio" name="supplier_product_wise" value="product_wise" class="search_value">
 

    </div>
</div><!-- //endrow -->
       
                    <div class="show_supplier" style="display:none">
                         <form method="GET"  action="{{route('supplier.wise.pdf')}}"  id="myForm" target="_blank">
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label> Supplier Name </label>
                                        <select class="form-select select2" aria-label="Default select example" name="supplier_id" >
                                        <option selected="">Open this select menu</option>
                                   @foreach($suppliers as $supp)
                                        <option value="{{$supp->id}}">{{$supp->name}}</option>
                                    @endforeach
                                       
                                        </select>
                                </div>
                                <div class="col-sm-4" style="padding-top: 28px; ">
                                    <button type="sumbit" class="btn btn-primary">search</button>
                                </div>
                            </div>
                        </form>
                    </div>

<!-- end supplier wise -->
<!-- product wise -->


                    <div class="show_product" style="display:none">
                        <form method="GET" action="{{route('product.wise.pdf')}}" id="myForm" target="_blank">

                            <div class="row">
                                <div class="col-md-4">
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

                 <div class="col-md-4">
                    <div class="md-3">                        
                        <label for="example-text-input" class="form-label">product name </label>
                    <select  aria-label="Default select example" name="product_id" id="product_id" class="form-select select2">
                        <option selected="">Open this select menu</option>
                     
                       
                    </select>                 
                   </div>
                 </div>
                                <div class="col-sm-4" style="padding-top: 28px; ">
                                    <button type="sumbit" class="btn btn-primary">search</button>
                                </div>
                            </div>
                        </form>
                    </div>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                     
                        
                    </div> <!-- container-fluid -->
                </div>
 




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
    $(document).on('change', '.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'supplier_wise') {
            $('.show_supplier').show();

        }
        else{
            $('.show_supplier').hide();

        }
    });
</script>

<script type="text/javascript">
    $(document).on('change', '.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'product_wise') {
            $('.show_product').show();

        }
        else{
            $('.show_product').hide();

        }
    });
</script>






<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                supplier_id: {
                    required : true,
                },             
                category_id: {
                    required : true,
                },
            },
            messages :{
                 supplier_id: {
                    required : 'Please Enter Your supplier no',
                },
                  category_id: {
                    required : 'Please Enter Your category id',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>







@endsection





