<style>
ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.box {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firowox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
  color: #6c757d;
  font-weight: bold;
}

.box::before {
  content: "\2610";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.check-box::before {
  content: "\2611"; 
  color: dodgerblue;
}

.nested {
  display: none;
}

.active {
  display: block;
}
.c1{
    color:#008000	;
    font-weight: bold;
}
.c2{
    color:#808080;
    font-weight: bold;
}
.c3{
    color:#000080;
    font-weight: bold;
}
.c4{
    color:#0000FF;
    font-weight: bold;
}
.c5{
    color:#008080;
    font-weight: bold;
}
.c6{
    color:#800080;
    font-weight: bold;
}
.c7{
    color:#800000;
    font-weight: bold;
}

.btngrpcss{
    background: #eee;
    padding-bottom: 6px;
    padding-top: 3px;
    border-radius: 7px;
    border: 1px solid #e0e0e0;
    margin: 6px;
}
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Chaloonline</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <!--form action="" class="form-inline" method="POST">
        <input type="text" class="form-control startdate" value="<?php echo $this->input->post('start_date'); ?>"  name="start_date" placeholder="dd-mm-yyyy" >
            <input type="text" class="form-control datepicker" value="<?php echo $this->input->post('date'); ?>"  name="date" placeholder="dd-mm-yyyy" >
            <input type="submit" class="btn btn-success" value="Find">
        </form-->
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

            <ul id="myUL">
                
                <?php 
                 
                if(!empty($treedata->child))
                {
                    
                    echo liStart($treedata);
                    foreach($treedata->child as $row1)
                    {                   
                        if(!empty($row1->child))
                        {
                            echo liStart($row1);
                            //echo '<li><span class="box">'.strtoupper($row1->first_name.' '.$row1->last_name).'</span><button type="button" class="btn btn-outline-primary btn-sm ml-2" data-toggle="modal" data-target="#exampleModal" onmouseover="AddUserID('.$user->user_id.')" > <span class="fa fa-plus"> ADD<span></button><span class="badge badge-danger m-1">DUE : 23</span><span class="badge badge-warning m-1" >RRCIEVED : 433</span><span class="badge badge-primary m-1" >TOTAL : 400</span><span class="badge badge-success m-1">incentive : 333</span><button type="button" class="btn btn-outline-primary btn-sm ml-2" data-toggle="modal" data-target="#EditDetail" onmouseover="EditDetail('.$row1->user_id.','.$row1->payment_received.','.$row1->payment_due.','.$row1->incentive.','.$row1->total.')" ><span class="fa fa-plus"> EDIT DETAIL<span></button><ul class="nested c2">';
                            foreach($row1->child as $row2)
                            {
                                if(!empty($row2->child))
                                {
                                    echo liStart($row2);
                                    foreach($row2->child as $row3)
                                    {
                                        if(!empty($row3->child))
                                        {
                                            echo liStart($row3);
                                            foreach($row3->child as $row4)
                                            { 
                                                if(!empty($row4->child))
                                                {
                                                    echo liStart($row4);
                                                    foreach($row4->child as $row5)
                                                    { 
                                                        if(!empty($row5->child))
                                                        {
                                                            echo liStart($row5);
                                                            foreach($row5->child as $row6)
                                                            { 
                                                                if(!empty($row6->child))
                                                                {
                                                                    echo liStart($row6);
                                                                    foreach($row6->child as $row7)
                                                                    {    
                                                                        if(!empty($row7->child))
                                                                        {
                                                                            echo liStart($row7);
                                                                            foreach($row7->child as $row8)
                                                                            {    
                                                                                if(!empty($row8->child))
                                                                                {
                                                                                    echo liStart($row8);
                                                                                    foreach($row8->child as $row9)
                                                                                    {    
                                                                                        if(!empty($row9->child))
                                                                                        {
                                                                                            echo liStart($row9);
                                                                                            foreach($row9->child as $row10)
                                                                                            {    
                                                                                                if(!empty($row10->child))
                                                                                                {
                                                                                                    echo liStart($row10);
                                                                                                    foreach($row10->child as $row11)
                                                                                                    {    
                                                                                                        if(!empty($row11->child))
                                                                                                        {
                                                                                                            echo liStart($row11);
                                                                                                            foreach($row11->child as $row12)
                                                                                                            {    
                                                                                                                echo liEnd($row12);
                                                                                                            }  
                                                                                                            echo '</ul></li>';
                                                
                                                                                                        }else{
                                                                                                            echo liEnd($row11);
                                                                                                        }  
                                                                                                    }  
                                                                                                    echo '</ul></li>';
                                        
                                                                                                }else{
                                                                                                    echo liEnd($row10);
                                                                                                }  
                                                                                            }  
                                                                                            echo '</ul></li>';
                                
                                                                                        }else{
                                                                                            echo liEnd($row9);
                                                                                        }  
                                                                                    }  
                                                                                    echo '</ul></li>';
                        
                                                                                }else{
                                                                                    echo liEnd($row8);
                                                                                }  
                                                                            }  
                                                                            echo '</ul></li>';
                
                                                                        }else{
                                                                            echo liEnd($row7);
                                                                        }  
                                                                    }  
                                                                    echo '</ul></li>';
        
                                                                }else{
                                                                    echo liEnd($row6);
                                                                }                                        
                                        
                                        
                                                            }  
                                                            echo '</ul></li>';

                                                        }else{
                                                            echo liEnd($row5);
                                                        }                                       
                                
                                
                                                    }  
                                                    echo '</ul></li>';
        
                                                }else{
                                                    echo liEnd($row4);
                                                }                                      
                        
                        
                                            }  
                                            echo '</ul></li>';

                                        }else{
                                            echo liEnd($row3);
                                        }                                        
                
                
                                    }  
                                    echo '</ul></li>';

                                }else{
                                    echo liEnd($row2);
                                } 
                            }
                            echo '</ul></li>';
                        }else{
                            echo liEnd($row1);
                        }
                      
                    }
                    echo '</ul></li>';
                }else{
                    
                    echo liEnd($treedata);
                }  
                
                ?>
              
                </ul>

                <script>
                var toggler = document.getElementsByClassName("box");
                var i;

                for (i = 0; i < toggler.length; i++) {
                toggler[i].addEventListener("click", function() {
                    this.parentElement.querySelector(".nested").classList.toggle("active");
                    this.classList.toggle("check-box");
                });
                }
                </script>
               
            </div>
        </div>
    </div>
</div>
<?php
function liStart($lirow){
    if(empty($lirow->user_id)){
        return '<li><span class="box">'.strtoupper($lirow->first_name.' '.$lirow->last_name).'<span class="btngrpcss"><span class="badge badge-danger m-1">DUE : '.$lirow->payment_due.'</span><span class="badge badge-warning m-1" >RRCIEVED : '.$lirow->payment_received.'</span><span class="badge badge-primary m-1" >TOTAL : '.$lirow->total.'</span><span class="badge badge-success m-1">incentive : '.$lirow->incentive.'</span></span><button type="button" class="btn btn-outline-primary btn-sm mr-1 border-0 p-0" data-toggle="modal" data-target="#exampleModal" onmouseover="AddUserID('.$lirow->child_user_id.')" >  ADD</button><ul class="nested active c2">';

    }else{
        return '<li><span class="box">'.strtoupper($lirow->first_name.' '.$lirow->last_name).'<span class="btngrpcss"><span class="badge badge-danger m-1">DUE : '.$lirow->payment_due.'</span><span class="badge badge-warning m-1" >RRCIEVED : '.$lirow->payment_received.'</span><span class="badge badge-primary m-1" >TOTAL : '.$lirow->total.'</span><span class="badge badge-success m-1">incentive : '.$lirow->incentive.'</span></span><button type="button" class="btn btn-outline-primary btn-sm mr-1 border-0 p-0" data-toggle="modal" data-target="#exampleModal" onmouseover="AddUserID('.$lirow->child_user_id.')" >  ADD</button> / <button type="button" class="btn btn-outline-secondary btn-sm mr-1 border-0 p-0" data-toggle="modal" data-target="#EditDetail" onmouseover="EditDetail('.$lirow->id.','.$lirow->user_id.','.$lirow->child_user_id.','.$lirow->payment_received.','.$lirow->payment_due.','.$lirow->incentive.','.$lirow->total.')" > EDIT</button><ul class="nested active c2">';

    }
}
function liEnd($lirow){
    if (empty($lirow->user_id)) {
        return '<li class="c2">'.strtoupper($lirow->first_name.' '.$lirow->last_name).'<span class="btngrpcss"><span class="badge badge-danger m-1">DUE : '.$lirow->payment_due.'</span><span class="badge badge-warning m-1" >RRCIEVED : '.$lirow->payment_received.'</span><span class="badge badge-primary m-1" >TOTAL : '.$lirow->total.'</span><span class="badge badge-success m-1">incentive : '.$lirow->incentive.'</span></span><button type="button" class="btn btn-outline-primary btn-sm mr-1 border-0 p-0" data-toggle="modal" data-target="#exampleModal" onmouseover="AddUserID('.$lirow->child_user_id.')" >  ADD</button> </li>';
    }else{
        return '<li class="c2">'.strtoupper($lirow->first_name.' '.$lirow->last_name).'<span class="btngrpcss"><span class="badge badge-danger m-1">DUE : '.$lirow->payment_due.'</span><span class="badge badge-warning m-1" >RRCIEVED : '.$lirow->payment_received.'</span><span class="badge badge-primary m-1" >TOTAL : '.$lirow->total.'</span><span class="badge badge-success m-1">incentive : '.$lirow->incentive.'</span></span><button type="button" class="btn btn-outline-primary btn-sm mr-1 border-0 p-0" data-toggle="modal" data-target="#exampleModal" onmouseover="AddUserID('.$lirow->child_user_id.')" >  ADD</button> / <button type="button" class="btn btn-outline-secondary btn-sm mr-1 border-0 p-0" data-toggle="modal" data-target="#EditDetail" onmouseover="EditDetail('.$lirow->id.','.$lirow->user_id.','.$lirow->child_user_id.','.$lirow->payment_received.','.$lirow->payment_due.','.$lirow->incentive.','.$lirow->total.')" > EDIT</button></li>';

    }
}


?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="number" class="form-control" id="phone" placeholder="Enter mobile number" />
                            <input type="hidden" class="form-control" id="user_id" placeholder="user_id" />
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="number" class="form-control" id="payment_received" placeholder="Payment recived" />
                           
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="number" class="form-control" id="payment_due" placeholder="Payment due" />
                            
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="number" class="form-control" id="incentive" placeholder="incentive" />
                            
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="number" class="form-control" id="total" placeholder="Total" />
                            
                        </div>
                       
                        <button type="button" class="btn btn-primary mb-2" onclick="CheckUser()">Add New</button>
                    </form>
                </div>
                <div class="row" >
                    
                    <div class="col-md-12"  id ="user-info">  </div>
                </div>
                <div class="row" >
                    
                    <div class="col-md-12"  id="sub-user-div">  </div>
                </div>
            </div>
           
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="EditDetail" tabindex="-1" role="dialog" aria-labelledby="editDetailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDetailLabel">Edit  Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="form-inline">
                         <input type="hidden" class="form-control" id="edit_map_id" placeholder="map_id" />
                         <input type="hidden" class="form-control" id="edit_user_id" placeholder="user_id" />
                         <input type="hidden" class="form-control" id="edit_child_user_id" placeholder="child user_id" />
                        <div class="form-group mx-sm-3 mb-2">
                            <label class="sr-only" for="edit_payment_received">Payment Recived</label>
                            <input type="number" class="form-control" id="edit_payment_received" placeholder="Payment recived" />
                           
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label class="sr-only" for="edit_payment_due">Payment Due</label>
                            <input type="number" class="form-control" id="edit_payment_due" placeholder="Payment due" />
                            
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label class="sr-only" for="edit_incentive">Incentive</label>
                            <input type="number" class="form-control" id="edit_incentive" placeholder="incentive" />
                            
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label class="sr-only" for="edit_total">Total</label>
                            <input type="number" class="form-control" id="edit_total" placeholder="Total" />
                            
                        </div>
                       
                        <button type="button" class="btn btn-primary mb-2" onclick="UpdateDetail()">Save </button>
                    </form>
                </div>
                <div class="row" >
                    
                    <div class="col-md-12"  id ="update_user-info">  </div>
                </div>
                
            </div>
           
        </div>
    </div>
</div>
<script>
function AddUserID(userid){
    document.getElementById("user_id").value =userid;
    SubUser(userid);
}
function EditDetail(map_id,userid,child_user_id,payment_received,payment_due,incentive,total){
    document.getElementById("edit_map_id").value =map_id;
    document.getElementById("edit_user_id").value =userid;
    document.getElementById("edit_child_user_id").value =child_user_id;    
    document.getElementById("edit_payment_received").value =payment_received;
    document.getElementById("edit_payment_due").value =payment_due;
    document.getElementById("edit_incentive").value =incentive;
    document.getElementById("edit_total").value =total;
    
}
</script>
