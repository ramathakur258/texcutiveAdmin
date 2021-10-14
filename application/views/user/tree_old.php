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
  -moz-user-select: none; /* Firefox 2+ */
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
    
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

            <ul id="myUL">
                
                <?php 
                $ref= $this->tree_model->referralData($user->user_id);         
                if($sb1=$this->common->childRecord($user->user_id))
                {
                    
                    echo '<li><span class="box">'.strtoupper($user->display_name).'</span>(Paid :'.$ref->paid.'  Unpaid : '.$ref->unpaid.' Total : '.$ref->total.'    )<ul class="nested c1">';                   
                    foreach($sb1 as $row1)
                    {   $ref1= $this->tree_model->referralData($row1->id);                   
                        if($sb2=$this->common->childRecord($row1->id))
                        {
                            echo '<li><span class="box">'.strtoupper($row1->first_name.' '.$row1->last_name).'</span>(Paid :'.$ref1->paid.'  Unpaid : '.$ref1->unpaid.' Total : '.$ref1->total.'  )<ul class="nested c2">';
                            foreach($sb2 as $row2)
                            {
                                $ref2= $this->tree_model->referralData($row2->id); 
                                if($sb3=$this->common->childRecord($row2->id))
                                {
                                    echo '<li><span class="box">'.strtoupper($row2->first_name.' '.$row2->last_name).'</span>(Paid :'.$ref2->paid.'  Unpaid : '.$ref2->unpaid.' Total : '.$ref2->total.'    )<ul class="nested c3">';
                                    foreach($sb3 as $row3)
                                    {
                                        $ref3= $this->tree_model->referralData($row3->id); 
                                        if($sb4=$this->common->childRecord($row3->id))
                                        {
                                            echo '<li><span class="box">'.strtoupper($row3->first_name.' '.$row3->last_name).'</span>(Paid :'.$ref3->paid.'  Unpaid : '.$ref3->unpaid.' Total : '.$ref3->total.'    )<ul class="nested c4">';
                                            foreach($sb4 as $row4)
                                            { 
                                                $ref4= $this->tree_model->referralData($row4->id); 
                                                if($sb5=$this->common->childRecord($row4->id))
                                                {
                                                    echo '<li><span class="box">'.strtoupper($row4->first_name.' '.$row4->last_name).'</span>(Paid :'.$ref4->paid.'  Unpaid : '.$ref4->unpaid.'  Total : '.$ref4->total.'   )<ul class="nested c5">';
                                                    foreach($sb5 as $row5)
                                                    { 
                                                        $ref5= $this->tree_model->referralData($row5->id); 
                                                        if($sb6=$this->common->childRecord($row5->id))
                                                        {
                                                            echo '<li><span class="box">'.strtoupper($row5->first_name.' '.$row5->last_name).'</span>(Paid :'.$ref5->paid.'  Unpaid : '.$ref5->unpaid.' Total : '.$ref5->total.'    )<ul class="nested c6">';
                                                            foreach($sb6 as $row6)
                                                            { 
                                                                $ref6= $this->tree_model->referralData($row6->id); 
                                                                if($sb7=$this->common->childRecord($row6->id))
                                                                {
                                                                    echo '<li><span class="box">'.strtoupper($row6->first_name.' '.$row6->last_name).'</span>(Paid :'.$ref6->paid.'  Unpaid : '.$ref6->unpaid.' Total : '.$ref6->total.'    )<ul class="nested c7">';
                                                                    foreach($sb7 as $row7)
                                                                    {    $ref7= $this->tree_model->referralData($row7->id); 
                                                                        if($sb8=$this->common->childRecord($row7->id))
                                                                        {
                                                                            echo '<li><span class="box">'.strtoupper($row7->first_name.' '.$row7->last_name).'</span>(Paid :'.$ref7->paid.'  Unpaid : '.$ref7->unpaid.' Total : '.$ref7->total.'    )<ul class="nested c7">';
                                                                            foreach($sb7 as $row8)
                                                                            {    $ref8= $this->tree_model->referralData($row8->id); 
                                                                                if($sb9=$this->common->childRecord($row8->id))
                                                                                {
                                                                                    echo '<li><span class="box">'.strtoupper($row8->first_name.' '.$row8->last_name).'</span>(Paid :'.$ref8->paid.'  Unpaid : '.$ref8->unpaid.' Total : '.$ref8->total.'    )<ul class="nested c7">';
                                                                                    foreach($sb7 as $row9)
                                                                                    {    $ref9= $this->tree_model->referralData($row9->id); 
                                                                                        if($sb10=$this->common->childRecord($row9->id))
                                                                                        {
                                                                                            echo '<li><span class="box">'.strtoupper($row9->first_name.' '.$row9->last_name).'</span>(Paid :'.$ref9->paid.'  Unpaid : '.$ref9->unpaid.' Total : '.$ref9->total.'    )<ul class="nested c7">';
                                                                                            foreach($sb7 as $row10)
                                                                                            {    $ref10= $this->tree_model->referralData($row10->id); 
                                                                                                if($sb11=$this->common->childRecord($row10->id))
                                                                                                {
                                                                                                    echo '<li><span class="box">'.strtoupper($row10->first_name.' '.$row10->last_name).'</span>(Paid :'.$ref10->paid.'  Unpaid : '.$ref10->unpaid.' Total : '.$ref10->total.'    )<ul class="nested c7">';
                                                                                                    foreach($sb7 as $row11)
                                                                                                    {    $ref11= $this->tree_model->referralData($row11->id); 
                                                                                                        if($sb12=$this->common->childRecord($row11->id))
                                                                                                        {
                                                                                                            echo '<li><span class="box">'.strtoupper($row11->first_name.' '.$row11->last_name).'</span>(Paid :'.$ref11->paid.'  Unpaid : '.$ref11->unpaid.' Total : '.$ref11->total.'    )<ul class="nested c7">';
                                                                                                            foreach($sb7 as $row12)
                                                                                                            {    $ref12= $this->tree_model->referralData($row12->id);                                    
                                                                                        
                                                                                                                echo '<li>'.strtoupper($row12->first_name.' '.$row12->last_name).'(Paid :'.$ref12->paid.'  Unpaid : '.$ref12->unpaid.'  Total : '.$ref12->total.'   )</li>';
                                                                                                            }  
                                                                                                            echo '</ul></li>';
                                                
                                                                                                        }else{
                                                                                                            echo '<li>'.strtoupper($row11->first_name.' '.$row11->last_name).'(Paid :'.$ref11->paid.'  Unpaid : '.$ref11->unpaid.' Total : '.$ref11->total.'    )</li>';
                                                                                                        }  
                                                                                                    }  
                                                                                                    echo '</ul></li>';
                                        
                                                                                                }else{
                                                                                                    echo '<li>'.strtoupper($row10->first_name.' '.$row10->last_name).'(Paid :'.$ref10->paid.'  Unpaid : '.$ref10->unpaid.' Total : '.$ref10->total.'    )</li>';
                                                                                                }  
                                                                                            }  
                                                                                            echo '</ul></li>';
                                
                                                                                        }else{
                                                                                            echo '<li>'.strtoupper($row9->first_name.' '.$row9->last_name).'(Paid :'.$ref9->paid.'  Unpaid : '.$ref9->unpaid.' Total : '.$ref9->total.'    )</li>';
                                                                                        }  
                                                                                    }  
                                                                                    echo '</ul></li>';
                        
                                                                                }else{
                                                                                    echo '<li>'.strtoupper($row8->first_name.' '.$row8->last_name).'(Paid :'.$ref8->paid.'  Unpaid : '.$ref8->unpaid.' Total : '.$ref8->total.'    )</li>';
                                                                                }  
                                                                            }  
                                                                            echo '</ul></li>';
                
                                                                        }else{
                                                                            echo '<li>'.strtoupper($row7->first_name.' '.$row7->last_name).'(Paid :'.$ref7->paid.'  Unpaid : '.$ref7->unpaid.' Total : '.$ref7->total.'    )</li>';
                                                                        }  
                                                                    }  
                                                                    echo '</ul></li>';
        
                                                                }else{
                                                                    echo '<li>'.strtoupper($row6->first_name.' '.$row6->last_name).'(Paid :'.$ref6->paid.'  Unpaid : '.$ref6->unpaid.' Total : '.$ref6->total.'    )</li>';
                                                                }                                        
                                        
                                        
                                                            }  
                                                            echo '</ul></li>';

                                                        }else{
                                                            echo '<li>'.strtoupper($row5->first_name.' '.$row5->last_name).'(Paid :'.$ref5->paid.'  Unpaid : '.$ref5->unpaid.' Total : '.$ref5->total.'    )</li>';
                                                        }                                       
                                
                                
                                                    }  
                                                    echo '</ul></li>';
        
                                                }else{
                                                    echo '<li>'.strtoupper($row4->first_name.' '.$row4->last_name).'(Paid :'.$ref4->paid.'  Unpaid : '.$ref4->unpaid.' Total : '.$ref4->total.'    )</li>';
                                                }                                      
                        
                        
                                            }  
                                            echo '</ul></li>';

                                        }else{
                                            echo '<li>'.strtoupper($row3->first_name.' '.$row3->last_name).'(Paid :'.$ref3->paid.'  Unpaid : '.$ref3->unpaid.' Total : '.$ref3->total.'    )</li>';
                                        }                                        
                
                
                                    }  
                                    echo '</ul></li>';

                                }else{
                                    echo '<li>'.strtoupper($row2->first_name.' '.$row2->last_name).'(Paid :'.$ref2->paid.'  Unpaid : '.$ref2->unpaid.'  Total : '.$ref2->total.'   )</li>';
                                } 
                            }
                            echo '</ul></li>';
                        }else{
                            echo '<li>'.strtoupper($row1->first_name.' '.$row1->last_name).'(Paid :'.$ref1->paid.'  Unpaid : '.$ref1->unpaid.' Total : '.$ref1->total.'    )</li>';
                        }
                      
                    }
                    echo '</ul></li>';
                }else{
                    echo '<li>'.strtoupper($user->display_name).'(Paid :'.$ref->paid.'  Unpaid : '.$ref->unpaid.' Total : '.$ref->total.'    )</li>';
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