<html> 
    <title> </title>
    <head> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
</head>
    <body> 
          <div class="container"> 
            <div class="row"> 
                <div class="col-md-6"> 
                    <a href="#addUserModal" class="btn btn-primary" data-toggle="modal"> ADD NEW USERS </a>
                </div>
            </div>
            <div class="row"> 
                <form id="add-userForm">
                <div id="addUserModal" class="modal fade"> 
                    <div class="modal-dialog"> 
                        <div class="modal-content"> 
                            <div class="modal-header"> 
                                <h4 class="modal-title"> ADD USERS </h4>
                                <button type="button" class="close" data-dismiss="modal" arial-hidden="true">&times; </button>
                            </div>
                            <div class="modal-body add-users"> 
                                <div class="form-group"> 
                                    <label> First Name </label>
                                    <input type="text" id="firstName" required="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Last Name </label>
                                    <input type="text" id="lastName" required="" class="form-control">    
                                </div>
                                <div class="form-group"> 
                                    <label> Email </label>
                                    <input type="email" id="email" required="" class="form-control">
                                </div>
                                <div class="form-group"> 
                                    <label> Password </label>
                                    <input type="password" id="password"  required="" class="form-control">
                                </div><br>
                                <div class="form-group"> 
                                    <label> Role </label>
                                    <select class="from-control" id="role"> 
                                         <option user_role="1"> Admin </option>
                                         <option user_role="0"> Normal User </option>
                                    </select>
                                </div><br>
                                <div class="from-group"> 
                                    <label> Gender </label>
                                    <input type="radio" class="gender" value="male" required="">Male
                                    <input type="radio" class="gender" value="female">Female  
                                </div><br>
                                <div class="from-group"> 
                                    <label> Language </label>
                                    <input type="checkbox" class="language" value="hindi" required=""> Hindi
                                    <input type="checkbox" class="language" value="english"> English
                                    <input type="checkbox" class="language" value="marathi"> Marathi
                                </div>
                            </div>
                            <div class="modal-footer"> 
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-primary add_user" value="add">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
          </div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<script> 
    $(document).ready(function(){
       $('.add_user').click(function(){
            var fname = $('.add-users #firstName').val();
            var lname = $('.add-users #lastName').val();
            var email = $('.add-users #email').val();
            var password = $('.add-users #password').val();
            var role = $('.add-users #role').val();
            //alert(role);
            var gender = $('input[type="radio"]:checked').val();
            var language = [];  
            $('.language').each(function(){  
                    if($(this).is(":checked"))  
                    {  
                        language.push($(this).val());  
                    }  
            });  
            language = language.toString();  
          $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                fname: fname,
                lname: lname,
                email: email,
                password: password,
                role: role,
                gender: gender,
                language: language
            },
            url: "add_users",
            success: function(response){
               // console.log(response);
            },error: function(response){
                        
                alert(response.responseText);
            }
          });  
       });
    });
</script>
</body>
<html>