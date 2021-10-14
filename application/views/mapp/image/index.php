<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Image</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo site_url('mapp/image/edit'); ?>" class="btn btn-sm btn-primary ml-2"> Add New Image</a>
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                        <form class="form-inline" method="get">
                            <input type="text" class="form-control form-control-sm  ml-1" name="keyword" value="<?php echo $this->input->get('keyword'); ?>" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1">Search</button>
                            <a href="<?php echo site_url('mapp/image'); ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <!--th scope="col">AVATAR</th-->
                                <th scope="col">IMAGE</th>
                                <th scope="col">IMAGE TYPE</th> 
                                <th scope="col">IMAGE PATH</th> 
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($result)){
                                    foreach($result as $row){
                                        ?>
                                            <tr>
                                                <td>
                                                  <img style="max-height:60px;" src="<?php echo public_path('products/'.$row->image_path); ?>" >
                                                </td>
                                                <td>
                                                    <?php echo $row->type; ?>
                                                </td>
                                                 <td >
                                                     <p id="imge<?php echo $row->id; ?>" class="js-copytextarea"><?php echo $row->image_path; ?></p>
                                                     
                                                </td>
                                                <td>
                                                   <a class="js-textareacopybtn btn btn-outline-primary btn-sm" onclick="copyToClipboard('imge<?php echo $row->id; ?>')" ><span class="fas fa-copy"><span></a>
                                                   
                                                   
                                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('mapp/image/edit/'.$row->id) ?>" ><span class="fa fa-pencil-alt"><span></a>
                                                </td>
                                            </tr>
                                        
                                        <?php
                                    }

                                }
                            ?>
                           
                        </tbody>
                    </table>
                    <?php  echo $pagination ?>

                </div>
            </div>
        </div>
    </div>
</div>

 <script>
// var copyTextareaBtn = document.querySelector('.js-textareacopybtn');
// copyTextareaBtn.addEventListener('click', function(event) {
//   //  var copyTextarea = document.getElementById('imge').value;
//   var copyTextarea =   document.querySelector(".js-copytextarea");
  
// //     var link = document.createElement('input');
// //     document.body.appendChild(link);
// //     link.value = copyTextarea.value;
// //   link.select();
// //  console.log(link)
//   ///document.execCommand("copy");

//   try {
//     var successful = document.execCommand('copy');
//     var msg = successful ? 'successful' : 'unsuccessful';
//      alert("Copied the text: " + copyTextarea.value);
//     console.log('Copying text command was ' + msg);
//   } catch (err) {
//       console.log(err)
//     console.log('Oops, unable to copy');
//   }
// });

</script>
