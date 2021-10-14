<style>
.bootstrap-tagsinput span{
    background: #0a1f25;
    padding: 3px;
    border-radius: 10px !important;
}
.bootstrap-tagsinput{
    width:100%;
}
.bootstrap-tagsinput input{
    height: calc(1.3em + .5rem + 2px);
    padding: .25rem .5rem;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Product Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('mapp/product') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<div class="text-danger"><?php echo validation_errors(); ?></div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype='multipart/form-data' >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category_id">Category </label>
                            <select id="category_id" class="form-control" name="category_id">
                                <option value="">Select Category</option>
                                <?php foreach($categories as $category){ ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->category_title; ?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger" id="category_id_error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_name">Product Name </label>
                            <input type="hidden" id="edit-product-id" value="">
                            <input type="text" name="product_name" class="form-control" value="<?php if(!empty(set_value('product_name'))){ echo set_value('product_name'); }elseif(isset($record->product_name)){ echo $record->product_name; } ?>" id="product_name" placeholder="Product Name" />
                            <small class="text-danger" id="product_name_error"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="product_mrp">MRP </label>
                            <input type="number" name="product_mrp" class="form-control" value="<?php if(!empty(set_value('product_mrp'))){ echo set_value('product_mrp'); }elseif(isset($record->product_mrp)){ echo $record->product_mrp; } ?>" id="product_mrp" placeholder="Product MRP" />
                            <small class="text-danger" id="product_mrp_error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_name">Selling Price </label>
                            <input type="number" name="product_sp" class="form-control" value="<?php if(!empty(set_value('product_sp'))){ echo set_value('product_sp'); }elseif(isset($record->product_sp)){ echo $record->product_sp; } ?>" id="product_sp" placeholder="Product Selling Prce" />
                            <small class="text-danger" id="product_sp_error"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="product_qty">Qty </label>
                            <input type="number" name="product_qty" class="form-control" value="<?php if(!empty(set_value('product_qty'))){ echo set_value('product_qty'); }elseif(isset($record->product_qty)){ echo $record->product_qty; } ?>" id="product_qty" placeholder="Product Qty" />
                            <small class="text-danger" id="product_qty_error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_type">Type </label>
                            <select name="product_type" id="product_type" class="form-control">
                                <option value="piece">Piece</option>
                                <option value="meter">Meter</option>
                                <option value="ft">Ft</option>
                                <option value="cm">Cm</option>
                                <option value="inch">Inch</option>
                                <option value="liter">Liter</option>
                                <option value="ml">Ml</option>
                                <option value="dozen">Dozen</option>
                                <option value="kg">Kg</option>
                                <option value="gm">Gm</option>
                            </select>
                            <small class="text-danger" id="product_type_error"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="product_detail">Product Detail </label>
                            <input type="text" name="product_detail" class="form-control" value="<?php if(!empty(set_value('product_detail'))){ echo set_value('product_detail'); }elseif(isset($record->product_detail)){ echo $record->product_detail; } ?>" id="product_detail" placeholder="Product Detail" />
                            <small class="text-danger" id="product_detail_error"></small>
                        </div>
                        
                         <div class="form-group col-md-6">
                            <label for="brand_id">Brand </label>
                            <select id="brand_id" class="form-control" name="brand_id">
                                <option value="">Select Brand</option>
                                <?php foreach($brands as $brand){ ?>
                                    <option value="<?php echo $brand->id; ?>"><?php echo $brand->brand_name; ?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger" id="brand_id_error"></small>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="product_image">Image</label>
                            <input type="file" name="product_image" id="product_image" class="form-control"/>
                            <small class="text-danger" id="product_image_error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_size">Size </label>
                            <input type="text" name="product_size" data-role="tagsinput" value="<?php if(!empty(set_value('product_size'))){ echo set_value('product_size'); }elseif(isset($record->product_size)){ echo $record->product_size; } ?>" id="product_size" placeholder="Product Size" />
                            <small class="text-danger" id="product_size_error"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="product_color">Color</label><button onclick="AppenColorPicker()" type="button" class="ml-4 btn btn-sm btn-primary">Add</button>
                            <div id="color_field">

                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="product_color">Highlights</label><button onclick="AppendHighlights()" type="button" class="ml-4 btn btn-sm btn-primary">Add</button>
                            <div id="highlight_field">

                            </div>
                        </div>
                       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="product_color">Gallery Images (Only png,jpg,jpeg extension allowed)</label>
                            <input type="file" class="form-control" id="gallery_image" name="gallery_image[]" multiple>
                            <small class="text-danger" id="product_gallery_error"></small>
                        </div>
                        
                          <div class="form-group col-md-6">
                            <label for="similar_product_id">Similar Product </label>
                          
                            <select id="multiple" class="js-states form-control" name="similar_product_id[]" multiple>
                                <option value="">Select Similar Product</option>
                                <?php foreach($similar_product as $product){ ?>
                                
                                    <option value="<?php echo $product->id; ?>"><?php echo $product->product_name; ?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger" id="similar_product_id_error"></small>
                        </div>
                        
                    </div>
                     <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="home_display">Home Page Display(optional)</label>
                             <select name="home_display" id="home_display" class="form-control">
                                 <option  selected>Select</option>
                                <option value="2" <?php if(!empty($record->home_display) && $record->home_display=='2'){ echo "selected"; } ?>>Deal of the day</option>
                                <option value="1" <?php if(!empty($record->home_display) && $record->home_display=='1'){ echo "selected"; } ?>>Trending Now Products</option>
                                <option value="3" <?php if(!empty($record->home_display) && $record->home_display=='3'){ echo "selected"; } ?>>Best For you products</option>
                            </select>
                           
                        </div>
                      </div>
                    <button type="button" onclick="submit_form()" class="btn btn-primary">Save Detail</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="processing-model" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Processing....</h5>
      </div>
      <div class="modal-body text-center">
            <div id="loader-body">
            </div>
      </div>
    </div>
  </div>
</div>
<script>
    function AppenColorPicker(){
        var html='<div class="row mt-2">'+
                    '<div class="col-md-10">'+
                        '<input type="color"  name="product_color[]" class="d-inline form-control"/>'+
                    '</div>'+
                    '<button class="d-inline btn btn-danger" onclick="this.parentNode.parentNode.removeChild(this.parentNode)">Del</button>'+
                '</div>';
        document.getElementById("color_field").insertAdjacentHTML('afterend',html);
    }
    function AppendHighlights(){
        var html='<div class="row mt-2">'+
                    '<div class="col-md-10">'+
                        '<input type="text"  name="product_highlight[]" class="d-inline form-control"/>'+
                    '</div>'+
                    '<button class="d-inline btn btn-danger" onclick="this.parentNode.parentNode.removeChild(this.parentNode)">Del</button>'+
                '</div>';
        document.getElementById("highlight_field").insertAdjacentHTML('afterend',html);
    }
   
</script>