
<!DOCTYPE html>
<html>
    <head>
        <title>
            Administrator
        </title>
        <script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="admin.css">
    </head>
    <body>
        <div class="row">
            <div class="col-sm-8">
                <button onclick="back()" style="width:100%;">Logout</button>
                <table>
                    <thead>
                        <tr>
                            <th style="width:6rem">Email</th>
                            <th style="width:6rem">Role</th>
                            <th style="width:6rem">Section</th>
                            <th style="width:6rem">Action</th>
                            <th style="width:6rem">Math</th>
                            <th style="width:6rem">ICT</th>
                            <th style="width:6rem">History</th>
                            <th style="width:6rem">Science</th>
                            <th style="width:6rem">Literature</th>
                            <th style="width:6rem">Ethics</th>
                            <th style="width:6rem">Action</th>
                        </tr>
                    </thead>
                    <tbody id="users" style="background-color: grey;"></tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th style="width:15rem">Event Title</th>
                            <th style="width:29rem">Event Contents</th>
                            <th style="width:22rem">Action</th>
                        </tr>
                    </thead>
                    <tbody id="events" style="background-color: grey;"></tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th style="width:12rem">Appointment Title</th>
                            <th style="width:32rem">Appointment Contents</th>
                            <th style="width:11rem">Email</th>
                            <th style="width:11rem">Action</th>
                        </tr>
                    </thead>
                    <tbody id="appointment" style="background-color: grey;"></tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <form method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Update Section</h1>
                            <input type="text" id="insertemailsection" name="insertemailsection" placeholder="Insert Email here..."></input>
                            <select id="Section_first_or_Second">
                                <option value="lms_section1">1st Section</option>
                                <option value="lms_section2">2nd Section</option>
                            </select>
                        <select id="insertnewsection">
                            <option value="CS31S1">CS31S1</option>
                            <option value="CS31S2">CS31S2</option>
                            <option value="IS31S1">IS31S1</option>
                        </select>
                        <button type="submit" id="newsection" name="newsection">Submit</button><br>
                        </div>
                    </div>
                </form><br>
                <form method="post" action="updatesubjects.php">
                    <h1>Update Subjects</h1>
                    <input type="text" id="insertemailsubjects" name="insertemailsubjects" placeholder="Insert Email here..."></input><br>
                    <input type="checkbox" id="checkbox1" name="checkbox1">Math</input>
                    <input type="checkbox" id="checkbox2" name="checkbox2">ICT</input>
                    <input type="checkbox" id="checkbox3" name="checkbox3">History</input>
                    <input type="checkbox" id="checkbox4" name="checkbox4">Science</input>
                    <input type="checkbox" id="checkbox5" name="checkbox5">Literature</input>
                    <input type="checkbox" id="checkbox6" name="checkbox6">Ethics</input>
                    <button type="submit" id="newsubjects" name="newsubjects">Submit</button>
                </form><br>
                <form>
                    <h1>Post Announcement</h1>
                    <input type="text" id="insert_title_event" name="insert_title_event" placeholder="Insert Title here..."></input><br>
                    <textarea name="textarea_event" id="textarea_event" cols="50" rows="10" placeholder="Insert Text here..."></textarea>
                    <br>
                    <button type="submit" id="newevent" name="newevent">Submit</button>
                </form><br>
                <form>
                    <h1>Post Teacher Appointment</h1>
                    <input type="text" id="insert_title_appointment" name="insert_title_event" placeholder="Insert Title here..."></input><br>
                    <input type="text" id="insert_email_appointment" placeholder="Type Email here..."></input><br>
                    <textarea name="textarea_event" id="textarea_appointment" cols="50" rows="10" placeholder="Insert Text here..."></textarea>
                    <br>
                    <button type="submit" id="newappointment" name="newappointment">Submit</button>
                </form>
            </div>
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
                            $('#users').append('<td>' + lms_users.email + '</td>');
                            $('#users').append('<td>' + lms_users.lms_role + '</td>');
                            $('#users').append('<td>' + lms_users.lms_section1 +' & '+ lms_users.lms_section2 + '</td>');
                            $('#users').append('<td> <button type = "submit" class="update_section_Btn" data-id1="'+lms_users.email+'" >UPDATE SECTION</button></td>');
                            $('#users').append('<td>' +lms_users.subject1 + '</td>');
                            $('#users').append('<td>' +lms_users.subject2 + '</td>');
                            $('#users').append('<td>' +lms_users.subject3 + '</td>');
                            $('#users').append('<td>' +lms_users.subject4 + '</td>');
                            $('#users').append('<td>' +lms_users.subject5 + '</td>');
                            $('#users').append('<td>' +lms_users.subject6 + '</td>');
                            $('#users').append('<td> <button type = "submit" class="update_subjects_Btn" data-id2="'+lms_users.email+'" >UPDATE SUBJECTS</button></td>');
                        $('#users').append('/<tr>');
                    });
                    
                }
            });
            $.ajax({
                url: "http://localhost/final_project/admin_event_fetch2.php",
                type: "GET",
                success: function(response){
                    response.forEach(function (lms_events, index) {
                        $('#events').append('<tr>');
                            $('#events').append('<td>' + lms_events.event_title + '</td>');
                            $('#events').append('<td>' + lms_events.event_text + '</td>');
                            $('#events').append('<td><button type = "submit" class="delete_event_Btn" data-id4="'+lms_events.event_id+'" >Delete</button></td>');
                        $('#events').append('/<tr>');
                    });
                    
                }
            });
            $.ajax({
                url: "http://localhost/final_project/admin_sched_fetch2.php",
                type: "GET",
                success: function(response){
                    response.forEach(function (lms_sched, index) {
                        $('#appointment').append('<tr>');
                            $('#appointment').append('<td>' + lms_sched.appointment_title + '</td>');
                            $('#appointment').append('<td>' + lms_sched.appointment_text + '</td>');
                            $('#appointment').append('<td>' + lms_sched.email + '</td>');
                            $('#appointment').append('<td> <button type = "submit" class="update_event_Btn" data-id5="'+lms_sched.sched_id+'" >Update</button><button type = "submit" class="delete_event_Btn" data-id6="'+lms_sched.sched_id+'" >Delete</button></td>');
                        $('#appointment').append('/<tr>');
                    });
                    
                }
            });
            
        }
        $(document).on('click', '.update_section_Btn', function(){ 
            let id = $(this).data('id1');
            document.getElementById("insertemailsection").setAttribute("value", id); 
	    });
        $(document).on('click', '.update_subjects_Btn', function(){ 
            let id2 = $(this).data('id2');
            document.getElementById("insertemailsubjects").setAttribute("value", id2); 
	    });
        Load();
        $("#newsection").click(function(){
            $.post("updatesection.php",
            {
                email: $('#insertemailsection').val(),
                lms_section_num: $('#Section_first_or_Second').val(),
                lms_section: $('#insertnewsection').val()
            },
            function(data, status){
                
            });
        });
        $("#newevent").click(function(){
            $.post("admin_event_fetch1.php",
            {
                event_title: $('#insert_title_event').val(),
                event_text: $('#textarea_event').val()
            },
            function(data, status){
                
            });
        });
        $("#newappointment").click(function(){
            $.post("admin_sched_fetch1.php",
            {
                appointment_title: $('#insert_title_appointment').val(),
                appointment_text: $('#textarea_appointment').val(),
                email: $('#insert_email_appointment').val()
            },
            function(data, status){
                
            });
        });
        
        function back(){
            location.replace('http://localhost/final_project/login.php');
        }
    </script>
</html>