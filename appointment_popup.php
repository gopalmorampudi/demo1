<?php
session_start();
include "dbconnection.php";
$id=$_REQUEST['id'];
$date=$_REQUEST['date'];
$time=$_REQUEST['time'];
$student=$_REQUEST['student'];
$tutor=$_REQUEST['tutor'];
$subject=$_REQUEST['subject'];
 $query="select t.tutor_name from tutor t where t.tutor_id=$tutor";
$result=mysql_query($query);
$tutorName='';
if($res=mysql_fetch_row($result)){
$tutorName.=$res[0];
}

$query="select s.subject_name from subject s where s.subject_id=$subject";
$result=mysql_query($query);
$subName='';
if($res=mysql_fetch_row($result)){
$subName.=$res[0];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
         
         .modal-content{
                  width:60%;
                  margin: 0 auto;
                  margin-top: 5%;
         }
         
         </style>
</head>
<body>

<div class="container">
         
         <div class="modal show fade" id="myModal">
                   <div class="modal-content model-lg">
                            
  <div class="modal-header">
 
  <a class="close" href="view_subject.php">×</a>
    <h3></h3>
  </div>
  <div class="modal-body">
    <form role="form" action="send-appointment-req.php" method="post">
             <div class="row">
  <div class="form-group">
    <div class="col-md-4"><label for="username">Tutor Name :</label></div>
           <div class="col-md-8">
		   <input type="hidden" name="id" value="<?=$id?>"/>
		   <input type="hidden" name="tid" value="<?=$tutor?>"/>
		   <input type="text" class="form-control" id="username" name="tName" value="<?=$tutorName?>">
		   </div>
  </div>
           </div>
             <br>
              <div class="row">
  <div class="form-group">
   <div class="col-md-4"><label for="cid">Course Id :</label></div>
           <div class="col-md-8"> <input type="text" class="form-control" name="sid" value="<?=$subject?>" id="cid"></div>
  </div>
             </div>
             <br>
 <div class="row">
  <div class="form-group">
    <div class="col-md-4"><label for="cname">Course Name :</label></div>
           <div class="col-md-8"> 
		   <input type="text" class="form-control" id="cname" name="sName" value="<?=$subName?>"></div>
  </div>
           </div>
             <br>
              <div class="row">
  <div class="form-group">
   <div class="col-md-4"><label for="date">Date :</label></div>
           <div class="col-md-8">
		   <input type="date" class="form-control" id="date" name="dateSelected" value="<?=$date?>"></div>
  </div>
             </div>
             <br>
               <div class="row">
  <div class="form-group">
   <div class="col-md-4"><label for="time">Time :</label></div>
           <div class="col-md-8"> 
		   <input type="text" class="form-control" id="time" name="time" value="<?=$time?>"></div>
  </div>
             </div>
             <br>
              <div class="row">
  <div class="form-group">
   <div class="col-md-4"><label for="purpose">Purpose of Appointment :</label></div>
           <div class="col-md-8"> 
		   <textarea rows="4" cols="65" id="purpose" name="purpose"></textarea>
		   </div>
  </div>
             </div>
             <br>
  <button type="submit" class="btn btn-default">Fix Appointment</button>
</form>
  </div>
  
                          
                  </div>
</div>
         
         
</div>
  

<script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
    });
</script>
</body>
</html>
 