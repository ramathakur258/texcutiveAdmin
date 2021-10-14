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
}
.c2{
    color:#808080;
}
.c3{
    color:#000080;
}
.c4{
    color:#0000FF;
}
.c5{
    color:#008080;
}
.c6{
    color:#800080;
}
.c7{
    color:#800000;
}
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Team</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <form action="" class="form-inline" method="POST">
        <input type="text" class="form-control startdate" value="<?php echo $this->input->post('start_date'); ?>"  name="start_date" placeholder="dd-mm-yyyy" >
            <input type="text" class="form-control datepicker" value="<?php echo $this->input->post('date'); ?>"  name="date" placeholder="dd-mm-yyyy" >
            <input type="submit" class="btn btn-success" value="Find">
        </form>
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
                    
                    echo '<li><span class="box">'.strtoupper($user->display_name).'</span>(Paid :'.$treedata->allpaid.'  Unpaid : '.$treedata->allunpaid.' Total : '.$treedata->alltotal.'  Stock : '.$treedata->allstock.'    )<ul class="nested c1">';                   
                    foreach($treedata->child as $row1)
                    {                   
                        if(!empty($row1->child))
                        {
                            echo '<li><span class="box">'.strtoupper($row1->first_name.' '.$row1->last_name).'</span>(Paid :'.$row1->allpaid.'  Unpaid : '.$row1->allunpaid.' Total : '.$row1->alltotal.'  Stock : '.$row1->allstock.'  )<ul class="nested c2">';
                            foreach($row1->child as $row2)
                            {
                                if(!empty($row2->child))
                                {
                                    echo '<li><span class="box">'.strtoupper($row2->first_name.' '.$row2->last_name).'</span>(Paid :'.$row2->allpaid.'  Unpaid : '.$row2->allunpaid.' Total : '.$row2->alltotal.'  Stock : '.$row2->allstock.'    )<ul class="nested c3">';
                                    foreach($row2->child as $row3)
                                    {
                                        if(!empty($row3->child))
                                        {
                                            echo '<li><span class="box">'.strtoupper($row3->first_name.' '.$row3->last_name).'</span>(Paid :'.$row3->allpaid.'  Unpaid : '.$row3->allunpaid.' Total : '.$row3->alltotal.'   Stock : '.$row3->allstock.'   )<ul class="nested c4">';
                                            foreach($row3->child as $row4)
                                            { 
                                                if(!empty($row4->child))
                                                {
                                                    echo '<li><span class="box">'.strtoupper($row4->first_name.' '.$row4->last_name).'</span>(Paid :'.$row4->allpaid.'  Unpaid : '.$row4->allunpaid.'  Total : '.$row4->alltotal.' Stock : '.$row4->allstock.'  )<ul class="nested c5">';
                                                    foreach($row4->child as $row5)
                                                    { 
                                                        if(!empty($row5->child))
                                                        {
                                                            echo '<li><span class="box">'.strtoupper($row5->first_name.' '.$row5->last_name).'</span>(Paid :'.$row5->allpaid.'  Unpaid : '.$row5->allunpaid.' Total : '.$row5->alltotal.'  Stock : '.$row5->allstock.'    )<ul class="nested c6">';
                                                            foreach($row5->child as $row6)
                                                            { 
                                                                if(!empty($row6->child))
                                                                {
                                                                    echo '<li><span class="box">'.strtoupper($row6->first_name.' '.$row6->last_name).'</span>(Paid :'.$row6->allpaid.'  Unpaid : '.$row6->allunpaid.' Total : '.$row6->alltotal.'  Stock : '.$row6->allstock.'    )<ul class="nested c7">';
                                                                    foreach($row6->child as $row7)
                                                                    {    
                                                                        if(!empty($row7->child))
                                                                        {
                                                                            echo '<li><span class="box">'.strtoupper($row7->first_name.' '.$row7->last_name).'</span>(Paid :'.$row7->allpaid.'  Unpaid : '.$row7->allunpaid.' Total : '.$row7->alltotal.'  Stock : '.$row7->allstock.'    )<ul class="nested c7">';
                                                                            foreach($row7->child as $row8)
                                                                            {    
                                                                                if(!empty($row8->child))
                                                                                {
                                                                                    echo '<li><span class="box">'.strtoupper($row8->first_name.' '.$row8->last_name).'</span>(Paid :'.$row8->allpaid.'  Unpaid : '.$row8->allunpaid.' Total : '.$row8->alltotal.'   Stock : '.$row8->allstock.'   )<ul class="nested c7">';
                                                                                    foreach($row8->child as $row9)
                                                                                    {    
                                                                                        if(!empty($row9->child))
                                                                                        {
                                                                                            echo '<li><span class="box">'.strtoupper($row9->first_name.' '.$row9->last_name).'</span>(Paid :'.$row9->allpaid.'  Unpaid : '.$row9->allunpaid.' Total : '.$row9->alltotal.'   Stock : '.$row9->allstock.'   )<ul class="nested c7">';
                                                                                            foreach($row9->child as $row10)
                                                                                            {    
                                                                                                if(!empty($row10->child))
                                                                                                {
                                                                                                    echo '<li><span class="box">'.strtoupper($row10->first_name.' '.$row10->last_name).'</span>(Paid :'.$row10->allpaid.'  Unpaid : '.$row10->allunpaid.' Total : '.$row10->alltotal.'  Stock : '.$row10->allstock.'    )<ul class="nested c7">';
                                                                                                    foreach($row10->child as $row11)
                                                                                                    {    
                                                                                                        if(!empty($row11->child))
                                                                                                        {
                                                                                                            echo '<li><span class="box">'.strtoupper($row11->first_name.' '.$row11->last_name).'</span>(Paid :'.$row11->allpaid.'  Unpaid : '.$row11->allunpaid.' Total : '.$row11->alltotal.'   Stock : '.$row11->allstock.'   )<ul class="nested c7">';
                                                                                                            foreach($row11->child as $row12)
                                                                                                            {    
                                                                                                                echo '<li>'.strtoupper($row12->first_name.' '.$row12->last_name).'(Paid :'.$row12->allpaid.'  Unpaid : '.$row12->allunpaid.'  Total : '.$row12->alltotal.'  Stock : '.$row12->allstock.'   )</li>';
                                                                                                            }  
                                                                                                            echo '</ul></li>';
                                                
                                                                                                        }else{
                                                                                                            echo '<li>'.strtoupper($row11->first_name.' '.$row11->last_name).'(Paid :'.$row11->allpaid.'  Unpaid : '.$row11->allunpaid.' Total : '.$row11->alltotal.'  Stock : '.$row11->allstock.'    )</li>';
                                                                                                        }  
                                                                                                    }  
                                                                                                    echo '</ul></li>';
                                        
                                                                                                }else{
                                                                                                    echo '<li>'.strtoupper($row10->first_name.' '.$row10->last_name).'(Paid :'.$row10->allpaid.'  Unpaid : '.$row10->allunpaid.' Total : '.$row10->alltotal.'  Stock : '.$row10->allstock.'    )</li>';
                                                                                                }  
                                                                                            }  
                                                                                            echo '</ul></li>';
                                
                                                                                        }else{
                                                                                            echo '<li>'.strtoupper($row9->first_name.' '.$row9->last_name).'(Paid :'.$row9->allpaid.'  Unpaid : '.$row9->allunpaid.' Total : '.$row9->alltotal.'  Stock : '.$row9->allstock.'    )</li>';
                                                                                        }  
                                                                                    }  
                                                                                    echo '</ul></li>';
                        
                                                                                }else{
                                                                                    echo '<li>'.strtoupper($row8->first_name.' '.$row8->last_name).'(Paid :'.$row8->allpaid.'  Unpaid : '.$row8->allunpaid.' Total : '.$row8->alltotal.'  Stock : '.$row8->allstock.'    )</li>';
                                                                                }  
                                                                            }  
                                                                            echo '</ul></li>';
                
                                                                        }else{
                                                                            echo '<li>'.strtoupper($row7->first_name.' '.$row7->last_name).'(Paid :'.$row7->allpaid.'  Unpaid : '.$row7->allunpaid.' Total : '.$row7->alltotal.'  Stock : '.$row7->allstock.'    )</li>';
                                                                        }  
                                                                    }  
                                                                    echo '</ul></li>';
        
                                                                }else{
                                                                    echo '<li>'.strtoupper($row6->first_name.' '.$row6->last_name).'(Paid :'.$row6->allpaid.'  Unpaid : '.$row6->allunpaid.' Total : '.$row6->alltotal.'   Stock : '.$row6->allstock.'   )</li>';
                                                                }                                        
                                        
                                        
                                                            }  
                                                            echo '</ul></li>';

                                                        }else{
                                                            echo '<li>'.strtoupper($row5->first_name.' '.$row5->last_name).'(Paid :'.$row5->allpaid.'  Unpaid : '.$row5->allunpaid.' Total : '.$row5->alltotal.'  Stock : '.$row5->allstock.'    )</li>';
                                                        }                                       
                                
                                
                                                    }  
                                                    echo '</ul></li>';
        
                                                }else{
                                                    echo '<li>'.strtoupper($row4->first_name.' '.$row4->last_name).'(Paid :'.$row4->allpaid.'  Unpaid : '.$row4->allunpaid.' Total : '.$row4->alltotal.'  Stock : '.$row4->allstock.'    )</li>';
                                                }                                      
                        
                        
                                            }  
                                            echo '</ul></li>';

                                        }else{
                                            echo '<li>'.strtoupper($row3->first_name.' '.$row3->last_name).'(Paid :'.$row3->allpaid.'  Unpaid : '.$row3->allunpaid.' Total : '.$row3->alltotal.'  Stock : '.$row3->allstock.'    )</li>';
                                        }                                        
                
                
                                    }  
                                    echo '</ul></li>';

                                }else{
                                    echo '<li>'.strtoupper($row2->first_name.' '.$row2->last_name).'(Paid :'.$row2->allpaid.'  Unpaid : '.$row2->allunpaid.'  Total : '.$row2->alltotal.'  Stock : '.$row2->allstock.'   )</li>';
                                } 
                            }
                            echo '</ul></li>';
                        }else{
                            echo '<li>'.strtoupper($row1->first_name.' '.$row1->last_name).'(Paid :'.$row1->allpaid.'  Unpaid : '.$row1->allunpaid.' Total : '.$row1->alltotal.'   Stock : '.$row1->allstock.'   )</li>';
                        }
                      
                    }
                    echo '</ul></li>';
                }else{
                    echo '<li>'.strtoupper($user->display_name).'(Paid :'.$treedata->allpaid.'  Unpaid : '.$treedata->allunpaid.' Total : '.$treedata->alltotal.'   Stock : '.$treedata->allstock.'   )</li>';
                }  

                ?>
              
                <!--li><span class="box">Beverages</span>
                    <ul class="nested">
                    <li>Water</li>
                    <li>Coffee</li>
                    <li><span class="box">Tea</span>
                        <ul class="nested">
                        <li>Black Tea</li>
                        <li>White Tea</li>
                        <li><span class="box">Green Tea</span>
                            <ul class="nested">
                            <li>Sencha</li>
                            <li>Gyokuro</li>
                            <li>Matcha</li>
                            <li>Pi Lo Chun</li>
                            </ul>
                        </li>
                        </ul>
                    </li>  
                    </ul>
                </li-->
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