
<!DOCTYPE html>
<html>
    <head>
        <title>
            People
        </title>
        <script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="admin.css">
    </head>
    <body class="row">
        <div class="col-sm-6">
            <button onclick="back()"style="width:87%">Back</button>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Section</th>
                        <th>Action</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody id="users" style="background-color: grey;">
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <form>
                <h1>Message Form</h1>
                Email: <input type="text" id="name_input"> <input type="submit" value=" Send ">
                <textarea id="textbox" name="textbox" rows="10" cols="50%" style="background: url(images/white_bg.jpg);" placeholder="Insert your message... here"></textarea>
                
            </form>
        </div>
    </body>
    <script>
        function Load(){
            $.ajax({
                url: "http://localhost/final_project/list.php",
                type: "GET",
                success: function(response){
                    response.forEach(function (lms_users, index) {
                        $('#users').append('<tr>');
                            $('#users').append('<td>' + lms_users.first_name+' '+lms_users.last_name + '</td>');
                            $('#users').append('<td>' + lms_users.lms_section + '</td>');
                            $('#users').append('<td><button type = "submit" class="message_Btn" data-id="'+lms_users.email+'" > MESSAGE </button><button type = "submit" class="profile_Btn" data-id2="'+lms_users.email+'" > PROFILE </button></td>');
                            $('#users').append('<td>' + lms_users.email + '</td>');
                        $('#users').append('/<tr>');
                    });
                    
                }
            });
        }
        $(document).on('click', '.message_Btn', function(){ 
            let id = $(this).data('id');
            document.getElementById("name_input").setAttribute("value", id); 
	    });
        $(document).on('click', '.profile_Btn', function(){ 
            let id2 = $(this).data('id2');
            document.getElementById("insertemailsubjects").setAttribute("value", id2); 
	    });
        function Send(){

        }

        function back(){
            location.replace("http://localhost/final_project/teacher.php");
        }
        Load();

    </script>
</html>