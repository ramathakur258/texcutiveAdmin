<style>
#fileInput{
  display: none;
}
#icon{
  width: 100px;
  cursor: pointer;
}
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Ticket Information</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('ticket') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<?php echo validation_errors(); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <?php echo $ticket->cat1_title." > ".$ticket->cat2_title." > ".$ticket->cat3_title." > ".$ticket->cat4_title; ?>
              </div>
            <div class="card-body">
              
                    <div class="container">
                        
                        <div class="d-flex  row bg-light">
                            <div class="col-md-8">
                                <div class="d-flex flex-column comment-section">
                                    
                                    <div class="bg-white p-2 m-1">
                                        <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://static.thenounproject.com/png/138376-200.png" width="40">
                                            <div class="d-flex flex-column justify-content-start ml-2">
                                                <span class="d-block font-weight-bold name">SUBJECT OF TICKET</span><span class="date text-black-50">Created at <?php  echo date("d-M-Y H:i A",strtotime($ticket->created_at)); ?>
                                            
                                               </span>
                                                <a class="btn btn-outline-success btn-sm" href="<?php echo site_url("ticket/ticketReassign/".$ticket->id); ?>">Re-assign</a>
                                            </div>
                                           
                                        </div>
                                        <div class="mt-2">
                                            <p class="comment-text"><?php  echo $ticket->description; ?></p>
                                        </div>
                                    </div>

                                    <form action="" method="post" enctype='multipart/form-data' >
                                    <center><div id="result"></div></center>
                                    <div class="bg-light p-2 m-1">
                                        <div class="d-flex flex-row align-items-start"><textarea class="form-control ml-1 shadow-none textarea" id="comment" name="comment"></textarea>
                                        </div>
                                        
                                        <div class="mt-2 text-right">
                                        
                                            <button type="submit" id="loginbtn" class="btn btn-primary btn-sm shadow-none"  >Add comment</button>
                                        </div>
                                    </div>
                                    </form>
                                  
                                   
                                    <h5>Activity</h5>
                                    <?php 
                                     foreach($activities as $comment) {?>
                                    <div class="bg-white p-2 m-1">
                                        <div class="d-flex flex-row user-info"><img class="rounded-circle" src="<?php echo UPLOADS_URL."avatar/".$comment->avatar; ?>" width="40" height="40">
                                            <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo ucfirst($comment->first_name)." ". ucfirst($comment->last_name); ?> <small>added a <?php echo $comment->actions; ?></small></small></span><span class="date text-black-50"><?php echo date("d-M-Y H:i A",strtotime($comment->created_at)); ?></span></div>
                                        </div>
                                        <div class="mt-2 d-flex">
                                        <?php if($comment->actions=="comment"){ 
                                            ?>
                                            <p class="comment-text"><?php if(isset($comment->comment)){  echo $comment->comment; }?></p>
                                            <?php }elseif($comment->actions=="attachment"){
                                                
                                                $ext = pathinfo($comment->comment, PATHINFO_EXTENSION);
                                                if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
                                                    
                                                ?><img src="https://admin.texcutive.com/assets/images/image.jpg" width="70" height="70">
                                                <div class="col-sm-12 controls mt-3">
                                                    
                                                      <a id="btn-login" href="<?php echo UPLOADS_URL."ticket/".$comment->comment; ?>" class="btn btn-success btn-sm">VIEW  </a>
                                                      <a id="btn-fblogin" href="<?php echo UPLOADS_URL."ticket/".$comment->comment; ?>" download="attachment.png" class="btn btn-primary btn-sm">Download</a>
                                                    </div>
                                                <?php
                                                }elseif($ext=="pdf"){
                                                    ?>
                                                    <img src="https://admin.texcutive.com/assets/images/pdf.jpg" width="70" height="70">
                                                    <div class="col-sm-12 controls mt-3">
                                                      <a id="btn-login" href="<?php echo UPLOADS_URL."ticket/".$comment->comment; ?>" class="btn btn-success btn-sm">VIEW  </a>
                                                      <a id="btn-fblogin" href="<?php echo UPLOADS_URL."ticket/".$comment->comment; ?>" download="attachment.pdf" class="btn btn-primary btn-sm">Download</a>
                                                    </div>
                                                    <?php
                                                }elseif($ext=="docx" || $ext=="doc"){
                                                    ?>
                                                    <img src="https://admin.texcutive.com/assets/images/word.jpg" width="70" height="70">
                                                    <div class="col-sm-12 controls mt-3">
                                                      <a id="btn-login" href="<?php echo UPLOADS_URL."ticket/".$comment->comment; ?>" class="btn btn-success btn-sm">VIEW  </a>
                                                      <a id="btn-fblogin" href="<?php echo UPLOADS_URL."ticket/".$comment->comment; ?>" download="attachment.doc" class="btn btn-primary btn-sm">Download</a>
                                                    </div>
                                                    <?php
                                                }elseif($ext=="xls" || $ext=="xlsx" ){
                                                    ?>
                                                    <img src="https://admin.texcutive.com/assets/images/excel.jpg" width="70" height="70">
                                                    <div class="col-sm-12 controls mt-3">
                                                      <a id="btn-login" href="<?php echo UPLOADS_URL."ticket/".$comment->comment; ?>" class="btn btn-success btn-sm">VIEW  </a>
                                                      <a id="btn-fblogin" href="<?php echo UPLOADS_URL."ticket/".$comment->comment; ?>" download="attachment.xls" class="btn btn-primary btn-sm">Download</a>
                                                    </div>
                                                    <?php
                                                }
                                            
                                            
                                            ?>
                                                
                                                
                                                <?php }elseif($comment->actions=="status"){

                                                    echo '<p class="comment-text">'.$comment->comment.' </p>';
                                                    }elseif($comment->actions=="assign"){

                                                    echo '<p class="comment-text">Assigned to '.$comment->other_fname." ".$comment->other_lname.'</p>';
                                                    }?>
                                        </div>
                                    </div>
                                    
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex flex-column comment-section">
                                    <div class="bg-white p-2 m-2">
                                        <h5>STATUS</h5>
                                        <select name="status" class="form-control form-control-sm ml-1" onchange="statusChange(this)">
                                              
                                                <?php 
                                             
                                                    foreach($tic_status as $sta){
                                                        ?>
                                                        <option value="<?php echo $sta->title;  ?>" <?php if($ticket->status==$sta->title) echo 'selected="selected"'; ?>> <?php echo $sta->title;  ?> </option>
                                                        <?php
                                                    }
                                                    ?>
                
                                            </select>
                                        <h5>PRIORITY</h5>
                                        <select name="priority" class="form-control form-control-sm ml-1" onchange="priorityChange(this)">
                                              
                                                <?php 
                                             
                                                    foreach($tic_priority as $sta){
                                                        ?>
                                                        <option value="<?php echo $sta->title;  ?>" <?php if($ticket->priority==$sta->title) echo 'selected="selected"'; ?>> <?php echo $sta->title;  ?> </option>
                                                        <?php
                                                    }
                                                    ?>
                
                                            </select>
                                            <h5>FOLLOWUP DATE</h5>
                                             <input placeholder="Select date" type="text"  class="form-control datepicker" name="followup_date" value="<?php echo $date->followup_date; ?>"  onchange="followUpChange(this)">
                                            
                                </div>
                                <div class="d-flex flex-column comment-section">
                                    <div class="bg-white p-2 m-1">
                                        <h5>ATTACHMENTS</h5>
                                        <form action="" method="post" enctype='multipart/form-data'    id="myForm">
                                            <div class="clip-upload mt-2 "  >
                                                <label for="fileInput"> <i class="fa fa-paperclip btn btn-primary btn-sm" > Upload Files</i></label>
                                                <input id="fileInput" type="file" name="attachment" >
                                            </div>
                                        </form>
                                        <div class="container">
                                     <div class="row">
                                        <?php 
                                     foreach($activities as $comment) {?>
                                   
                                    <div class="bg-white p-2 m-1">
                                       
                                        <div class="mt-2 d-flex">
                                        <?php if($comment->actions=="attachment"){
                                                
                                                $ext = pathinfo($comment->comment, PATHINFO_EXTENSION);
                                                if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
                                                    
                                                ?><a href="<?php echo UPLOADS_URL."ticket/".$comment->comment; ?>" download="attachment.png"> <img src="https://admin.texcutive.com/assets/images/image.jpg" width="40" height="40"></a>
                                                
                                                <?php
                                                }elseif($ext=="pdf"){
                                                    ?>
                                                   <a href="<?php echo UPLOADS_URL."ticket/".$comment->comment; ?>" download="attachment.pdf"> <img src="https://admin.texcutive.com/assets/images/pdf.jpg" width="40" height="40"></a>
                                                   
                                                    <?php
                                                }elseif($ext=="docx" || $ext=="doc"){
                                                    ?>
                                                   <a href="<?php echo $comment->comment; ?>" download="attachment.doc"> <img src="https://admin.texcutive.com/assets/images/word.jpg" width="40" height="40"></a>
                                                   
                                                    <?php
                                                }elseif($ext=="xls" || $ext=="xlsx" ){
                                                    ?>
                                                   <a href="<?php echo $comment->comment; ?>" download="attachment.xls"> <img src="https://admin.texcutive.com/assets/images/excel.jpg" width="40" height="40"></a>
                                                    
                                                    <?php
                                                }
                                            
                                            
                                            ?>
                                                
                                                
                                                <?php }?>
                                        </div>
                                    </div>
                                    
                                    <?php }?>
                                    </div>
                                    </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </form>

            </div>
        </div>
    </div>
</div>

<script>
$('#fileInput').change(function() {
    alert("ok");
  $('#myForm').submit();
});

function statusChange(status){
    
    $.ajax({
        type: "POST",
       // dataType:'json',
        url: "https://admin.texcutive.com/ticket/statusChange/",
        data: {
            'status' : status.value,
            'id' : <?php echo $ticket->id; ?>,
        },
        success: function(response) {
            
            console.log(response);
           toastr.success("Status update Successful");
           
            
            
        }
    });
}

function priorityChange(priority){
    
    $.ajax({
        type: "POST",
       // dataType:'json',
        url: "https://admin.texcutive.com/ticket/priorityChange/",
        data: {
            'priority' : priority.value,
            'id' : <?php echo $ticket->id; ?>,
        },
        success: function(response) {
            
            console.log(response);
           toastr.success("Priority update Successful");
           
            
            
        }
    });
}


function followUpChange(followup_date){
    
    $.ajax({
        type: "POST",
       // dataType:'json',
        url: "https://admin.texcutive.com/ticket/followUpChange/",
        data: {
            'followup_date' : followup_date.value,
            'id' : <?php echo $ticket->id; ?>,
        },
        success: function(response) {
            
            console.log(response);
          toastr.success("Date update Successful");
           
            
            
        }
    });
}
</script>


 
<script type="text/javascript">
   
    $('.datepicker').datepicker({ 
        startDate: new Date()
    });
  
</script>
<script>
        function notifyme(){

           Push.create('Hello world');
        }
    </script>
  