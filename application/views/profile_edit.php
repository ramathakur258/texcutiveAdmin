<h4 class="mb-4 text-muted">Packages</h4>

<div class="row">    
    <div class="col-12 col-xl-12 mb-4 align-items-stretch">
    <?php echo validation_errors(); ?>
        <div class="card h-100 border-0 rounded-0">
            <div class="card-title mb-1 p-3 d-flex">
                <h6>Add/Edit</h6>
                <a href="<?php echo site_url('partner/packages'); ?>" class="btn btn-secondary ml-auto "><i class="fas fa-left-arrow">BACK</i></a>
            </div>
            <div class="card-body">
            <form action="" method="post" enctype='multipart/form-data' >
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">Media</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="location-tab" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected="false">Location</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active pt-3" id="general" role="tabpanel" aria-labelledby="home-tab">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Business Name *</label>
                                    <input type="text" name="title" class="form-control" value="<?php if(!empty(set_value('title'))){ echo set_value('title'); }elseif(isset($record->title)){ echo $record->title; } ?>" id="title" placeholder="Business name" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contact_person">Contact Person *</label>
                                    <input type="text" name="contact_person" class="form-control" value="<?php if(!empty(set_value('contact_person'))){ echo set_value('contact_person'); }elseif(isset($record->contact_person)){ echo $record->contact_person; } ?>" id="contact_person" placeholder="contact person name" />
                                </div>
                            </div>
                          
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" value="<?php if(!empty(set_value('password'))){ echo set_value('password'); } ?>" id="password" placeholder="********" />
                                </div>
                                                           
                                <div class="form-group col-md-6">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control" >
                                        <option value="">None</option>
                                        <?php
                                        if(!empty($categories)){
                                            foreach($categories as $row){
                                               
                                                    ?>
                                                <option value="<?php echo $row->id ?>"   <?php if (!empty(set_value('category_id')) && set_value('category_id')== $row->id) {
                                                        echo 'selected="selected"';
                                                    } elseif (isset($record->category_id) && $record->category_id== $row->id) {
                                                        echo 'selected="selected"';
                                                    } ?>   ><?php echo $row->title ?></option>
                                                <?php
                                                
                                            }

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade  pt-3" id="media" role="tabpanel" aria-labelledby="media-tab">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="logo">Business Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control" />
                                    <?php
                                    if(isset($record->logo)){

                                        ?>
                                        <img class="p-3" src="<?php echo site_url('uploads/gym/'.$record->logo); ?>" style="width:200px;" >

                                        <?php


                                    }else{
                                        ?>
                                        <img class="p-3"  src="<?php echo site_url('uploads/gym/logo.png'); ?>" style="width:200px;" >

                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="banner">Business Banner</label>
                                    <input type="file" name="banner" id="banner"  class="form-control" />
                                    <?php
                                    if(isset($record->banner)){

                                        ?>
                                        <img  class="p-3" src="<?php echo site_url('uploads/gym/'.$record->banner); ?>" style="width:200px;" >

                                        <?php


                                    }else{
                                        ?>
                                        <img  class="p-3" src="<?php echo site_url('uploads/gym/banner.png'); ?>" style="width:200px;" >

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>  

                        <div class="tab-pane fade  pt-3" id="location" role="tabpanel" aria-labelledby="location-tab">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">Business City </label>
                                    <input type="text" name="city" class="form-control" value="<?php if(!empty(set_value('city'))){ echo set_value('city'); }elseif(isset($record->city)){ echo $record->city; } ?>" id="phone" placeholder="Business city" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state">Business state </label>
                                    <input type="text" name="state" class="form-control" value="<?php if(!empty(set_value('state'))){ echo set_value('state'); }elseif(isset($record->state)){ echo $record->state; } ?>" id="state" placeholder="state" />
                                </div>
                            </div>
                            <div class="form-row">
                               
                                <div class="form-group col-md-12">
                                    <label for="email">Address</label>
                                    <textarea name="address" class="form-control" ><?php if(!empty(set_value('address'))){ echo set_value('address'); }elseif(isset($record->address)){ echo $record->address; } ?> </textarea>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="latitude">Latitude </label>
                                    <input type="text" name="latitude" class="form-control" value="<?php if(!empty(set_value('latitude'))){ echo set_value('latitude'); }elseif(isset($record->latitude)){ echo $record->latitude; } ?>" id="latitude" placeholder="latitude" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" name="longitude" class="form-control" value="<?php if(!empty(set_value('longitude'))){ echo set_value('longitude'); }elseif(isset($record->longitude)){ echo $record->longitude; } ?>" id="longitude" placeholder="longitude" />
                                </div>
                            </div>
                        
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Save Detail</button>
                   
                </form>
            </div>
        </div>
    </div>
</div>
