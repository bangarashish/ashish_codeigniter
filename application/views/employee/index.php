<html> 
    <head> 
        <title> </title>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body> 
        <div class="container"> 
            <div class="row">
                <div class="form-group"> 
                    <label><h5>  Searching  </h5></label>
                    <input type="text" name="search_input"  id="search_input" class="form-control">
                    <input type="submit" id="search" class="btn btn-primary"> 
                </div>     
                <div class="col-sm-6"> 
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"> Add New Employee</a>
                </div>
            </div>
            <div class="row"> 
                <div class="col"> 
                <table class="table table-striped" id="employeeListing">
                    <thead>
                        <tr>
                            <th><a href="#" class="sorting" name="id" order="desc"> EMP ID </a></th>
                            <th><a href="#" class="sorting" data-Column="name" data-order="desc"> Name</a></th>
                            <th>Email</th>
                            <th>phone</th>
                        </tr>
                    </thead>
                    <tbody id="listRecords">                    
                    </tbody>
                </table>
                <div id='pagination'></div>
               
                </div>
            </div>

            <!----------- add employee model ------------>
          
            <div id="addEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body add_employee">
                            <div class="form-group">
                                <div id="success"> </div>
                                <label>Name</label>
                                <input type="text" id="name_input" class="form-control">
                                <span id="name_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email_input" class="form-control">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" id="phone_input" class="form-control">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success add-employee" value="add">
                        </div>
                    </div>
                </div>
            </div>


            <!----------- add employee model ------------>

              <!----------- View employee model ------------>

            <div id="viewEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">View Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body edit_employee">
                            <div class="form-group">
                                <input type="hidden" id="emp_id" name="id" value="">
                                <label>Name</label>
                                <input type="text" id="name_input" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email_input" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" id="phone_input" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success update-employee" value="Update">
                        </div>
                    </div>
                </div>
            </div>
               <!----------- View employee model ------------>
        </div>
<script>

    //     $(document).ready(function(){
    //      $(document).on('click', '.sorting', function(event){
    //         event.preventDefault();
          
    //         var order = $(this).attr('order');
    //         var name = $(this).attr('name');
    //         console.log(name);
    //        var reverse_order = '';
    //         if(order == 'asc'){
    //             $(this).attr('order', 'desc');
    //             reverse_order = 'desc';
    //         }
    //         if(order == 'desc'){
    //             $(this).attr('order', 'asc');
    //             reverse_order = 'asc';
    //         }
    //         listEmployee(name, order);
    //      }); 
    //   });
      

    //   $(document).ready(function(){
    //     $('#search').click(function(){
    //         var search_input = $('#search_input').val();
    //        // console.log(search_input);
    //         listEmployee(search_input);
    //         // $.ajax({
    //         //     type: "GET",
    //         //     dataType: "json",
    //         //     url: "search",
    //         //     data: {
    //         //         search_input: search_input,
    //         //     },
    //         //     success: function(data){
    //         //         console.log(data);
    //         //     }
    //         // });
    //     });
    // });


    //   $(document).ready(function(){
    //         listEmployee();
    //     });    
    //     function listEmployee(name,order,search_input){
    // 	$.ajax({
    // 		type  : 'GET',
    // 		url   : 'employeelist',
    //         //url: "employeelist/?order="+order+"&name="+name+"&search_input="+search_input,
    //         data: {
    //             search_input: search_input,
    //             name : name,
    //             order: order
    //         },
    // 		async : false,
    // 		dataType : 'json',
    // 		success : function(result){
    //             console.log(result);
    //             // $(data).each(function(key, value){
    //             //     console.log(value);
    //             // });
    //             var tr = '';
    //             $.each(result.data, function(key, value){

    //                 var id    = value.id;
    //                 var name  = value.name;
    //                 var email = value.email;
    //                 var phone = value.phone;

    //                 tr += '<tr>';
    //                 tr += '<td>'+ id +'</td>';
    //                 tr += '<td>'+ name +'</td>';
    //                 tr += '<td>'+ email +'</td>';
    //                 tr += '<td>'+ phone + '</td>';
    //                 tr += '<td><a href="#viewEmployeeModal" data-toggle="modal" onclick=viewEmployeeModal("'+id+'")><button class="btn btn-success">Edit</button></a></td>';
    //                 tr += '<td><a href="#deleteEmployeeModel" data-toggle="modal" onclick=deleteEmployeeModel("'+id+'")><button class="btn btn-success">Delete</button></a></td>';
    //                 //tr += '<td><a href="javascript:void(0);" id="delete_employee" data-id="'+ id +'"> DELETE</a></td>'
    //                 tr += '<tr>';
                
    //             });
    //                $('#listRecords').html(tr);
    //         }
    // 	});
    // }


























      // --------------  Sorting --------------

      $(document).ready(function(){
         $(document).on('click', '.sorting', function(event){
            event.preventDefault();
          
            var order = $(this).attr('order');
            var name  = $(this).attr('name');
            //console.log(name);
            if(order == 'asc'){
                $(this).attr('order', 'desc');
            }
            if(order == 'desc'){
                $(this).attr('order', 'asc');
            }
            employeeSorting(name, order);
         }); 
      });

      function employeeSorting(name, order){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "sorting",
                data:{
                    name: name,
                    order: order
                },
                success : function(result){
                    console.log(result);
                    // $(data).each(function(key, value){
                         
                    // });
                    var tr = '';
                    $.each(result, function(key, value){

                        var id    = value.id;
                        var name  = value.name;
                        var email = value.email;
                        var phone = value.phone;

                        tr += '<tr>';
                        tr += '<td>'+ id +'</td>';
                        tr += '<td>'+ name +'</td>';
                        tr += '<td>'+ email +'</td>';
                        tr += '<td>'+ phone + '</td>';
                        tr += '<td><a href="#viewEmployeeModal" data-toggle="modal" onclick=viewEmployeeModal("'+id+'")><button class="btn btn-success">Edit</button></a></td>';
                        tr += '<td><a href="#deleteEmployeeModel" data-toggle="modal" onclick=deleteEmployeeModel("'+id+'")><button class="btn btn-success">Delete</button></a></td>';
                        //tr += '<td><a href="javascript:void(0);" id="delete_employee" data-id="'+ id +'"> DELETE</a></td>'
                        tr += '<tr>';

                    });
                    $('#listRecords').html(tr);
                }
            });


      }


    // --------------  searching --------------

    $(document).ready(function(){
        $('#search').click(function(){
            var search_input = $('#search_input').val();
          
           // console.log(search_input);
            listEmployee(search_input);
            // $.ajax({
            //     type: "GET",
            //     dataType: "json",
            //     url: "search",
            //     data: {
            //         search_input: search_input,
            //     },
            //     success: function(data){
            //         console.log(data);
            //     }
            // });
        });
    });

    // --------------  Pagination  --------------
    $(document).ready(function(){
        $('#pagination').on('click','a',function(e){  
        e.preventDefault();   
        var pageno = $(this).data('ci-pagination-page');  
      // console.log(pageno);
        loadPagination(pageno);  
        });  
    });

    loadPagination(0); 

    function loadPagination(pageno){  
    $.ajax({  
        url: 'pagination',  
        type: 'GET',  
        dataType: 'json',  
        data: {
        pageno: pageno,
        },
        success: function(response){  
        console.log(response);
        var page = response.pagination;
        //console.log(page);
        var data = response.result;
        var tr = '';
            $.each(data, function(key, value){

                var id    = value.id;
                var name  = value.name;
                var email = value.email;
                var phone = value.phone;

                tr += '<tr>';
                tr += '<td>'+ id +'</td>';
                tr += '<td>'+ name +'</td>';
                tr += '<td>'+ email +'</td>';
                tr += '<td>'+ phone + '</td>';
                tr += '<td><a href="#viewEmployeeModal" data-toggle="modal" onclick=viewEmployeeModal("'+id+'")><button class="btn btn-success">Edit</button></a></td>';
                tr += '<td><a href="#deleteEmployeeModel" data-toggle="modal" onclick=deleteEmployeeModel("'+id+'")><button class="btn btn-success">Delete</button></a></td>';
                //tr += '<td><a href="javascript:void(0);" id="delete_employee" data-id="'+ id +'"> DELETE</a></td>'
                tr += '<tr>';
               
            });
               $('#listRecords').html(tr);
            //var data = response.result;
            $('#pagination').html(response.pagination);  
        }  
    });  
    }  

        $(document).ready(function(){
            listEmployee();
        });    
        function listEmployee(search_input){
    	$.ajax({
    		type  : 'GET',
    		url   : 'employeelist',
            data: {
                search_input: search_input,
            },
    		async : false,
    		dataType : 'json',
    		success : function(result){

                // $(data).each(function(key, value){
                //     console.log(value);
                // });
                var tr = '';
                $.each(result.data, function(key, value){

                    var id    = value.id;
                    var name  = value.name;
                    var email = value.email;
                    var phone = value.phone;

                    tr += '<tr>';
                    tr += '<td>'+ id +'</td>';
                    tr += '<td>'+ name +'</td>';
                    tr += '<td>'+ email +'</td>';
                    tr += '<td>'+ phone + '</td>';
                    tr += '<td><a href="#viewEmployeeModal" data-toggle="modal" onclick=viewEmployeeModal("'+id+'")><button class="btn btn-success">Edit</button></a></td>';
                    tr += '<td><a href="#deleteEmployeeModel" data-toggle="modal" onclick=deleteEmployeeModel("'+id+'")><button class="btn btn-success">Delete</button></a></td>';
                    //tr += '<td><a href="javascript:void(0);" id="delete_employee" data-id="'+ id +'"> DELETE</a></td>'
                    tr += '<tr>';
                
                });
                   $('#listRecords').html(tr);
            }
    	});
    }

    // ------------------Add Employees-----------------

    $(document).ready(function(){
        $('.add-employee').click(function(){

            var name  = $('.add_employee #name_input').val();
            var email = $('.add_employee #email_input').val();
            var phone = $('.add_employee #phone_input').val();

            $.ajax({
                    type: "post",
                    url: "add-employee",
                    dataType: "json",
                    data:{
                        name: name,
                        email: email,
                        phone: phone
                    },
                    success: function(data){
                    
                      //  console.log(data.success);
                        $('#name_error').html(data.name_error);
                        $('#email_error').html(data.email_error);
                        $('#phone_error').html(data.phone_error);
                        $('#success').html(data.success);
                        //  $('#addEmployeeModal').modal('hide');
                        listEmployee();
                    }
            });
            
        });
    });
    
    // ------------------Add Employees-----------------

   
  // ------------------view Employees-----------------
    function viewEmployeeModal(id){
        var id = id;
        $.ajax({
            type: "GET",
            dataType: "json",
            data: {
                id: id,
            },
            url: "view-employee",
            success: function(result){
            
               var res = result.data;
               $('.edit_employee #name_input').val(res.name);
               $('.edit_employee #email_input').val(res.email);
               $('.edit_employee #phone_input').val(res.phone); 
               $('.edit_employee #emp_id').val(res.id);

                // $.each(JSON.parse(result), function(key, value){    
                // }); 
            }
        });
    }
    // ------------------view Employees-----------------
    
// ------------------update employee-----------------
    $(document).ready(function(){
        $('.update-employee').click(function(){
            var name  = $('.edit_employee #name_input').val();
            var email = $('.edit_employee #email_input').val();
            var phone = $('.edit_employee #phone_input').val();
            var id    = $('.edit_employee #emp_id').val();

           // console.log(name, email, phone, id);
          $.ajax({
            type: "POST",
            dataType: "json",
            url: "update-employee",
            data: {
                id: id,
                name: name,
                email: email,
                phone: phone
            },
            success: function(result){
                $('#viewEmployeeModal').modal('hide');
                listEmployee();
            }
          });
        });
    });

// ------------------update employee-----------------

    function deleteEmployeeModel(id){
        var id = id;
        $.ajax({
            type: "GET",
            dataType: "json",
            data: { id: id },
            url: "delete-employee",
            success: function(result){
                listEmployee();
            }
        });
    }




</script>    
    </body>
</html>