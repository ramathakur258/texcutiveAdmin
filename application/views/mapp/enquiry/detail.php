
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Enquiry Detail</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('mapp/enquiry') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>

<div class="text-danger"><?php echo validation_errors(); ?></div>
<div class="row">
   
    <div class="col-sm-12">
        <div class="card">
                  <section id="tabs">
	<div class="container" style="max-width:none;">
		<h6 class="section-title h1">
		    <div>
		        <?php if($record->approval_status == 'pending'){ ?>
		        <button type="button"  data-toggle="modal" data-target="#myModal"class="btn btn-primary mb-3 mt-3">Approve</button>
		        <?php }else{ ?>
		         <button type="button" class="btn btn-primary" disabled>Approved</button>
		        <?php } ?>
		        
		    </div>
		    <hr>
		</h6>
		<div class="row">
			<div class="col-md-12 ">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Account Information</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Personal Information</a>
						<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Address Information</a>
						<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Business Information</a>
							<a class="nav-item nav-link" id="nav-doc-tab" data-toggle="tab" href="#nav-doc" role="tab" aria-controls="nav-doc" aria-selected="false">Documents</a>
					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			          
			          <div class="row">
			              <div class="col-sm-12">
			                  <h4>Account information</h4>
			                   <table class="table" width="80px" align="center">
                                    <tbody >
                                       <tr>
                                          <td class="text-left">Company/Shop name:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->shop_name; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">First Name:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->first_name; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Middle Name:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->middle_name; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Last Name:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->last_name; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Gender:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->gender; } ?>	</b></td>
                                       </tr>
									   <tr>
                                          <td class="text-left">Mobile Number:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->mobile; } ?> </b></td>
                                       </tr>
                                     
                                    </tbody>
                                 </table>
			              </div>
			            
			          </div>
			          
			          
			          
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					    <h4>Personal information</h4>
			                   <table class="table" width="80px" align="center">
                                    <tbody >
                                       <tr>
                                          <td class="text-left">Date of Birth:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->dob; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Pan Number:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->pan_number; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Aadhar Number:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->aadhar_number; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Email:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->email; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Retailer Type:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->retailer_type; } ?>	</b></td>
                                       </tr>
									   <tr>
                                          <td class="text-left">Firm Type:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->firm_type; } ?> </b></td>
                                       </tr>
                                     
                                    </tbody>
                                 </table>
					</div>
					<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
					 <h4>Address information</h4>
			                   <table class="table" width="80px" align="center">
                                    <tbody >
                                       <tr>
                                          <td class="text-left">Address Line 1:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->address1; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Address Line 1:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->address2; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Land Mark:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->land_mark; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Pincode:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->pincode; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">City:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->city; } ?>	</b></td>
                                       </tr>
									   <tr>
                                          <td class="text-left">State:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->state; } ?> </b></td>
                                       </tr>
                                     
                                    </tbody>
                                 </table>
					</div>
					<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
					   <h4>Business information</h4>
			                   <table class="table" width="80px" align="center">
                                    <tbody >
                                       <tr>
                                          <td class="text-left">How long have you been in business?:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->busineess_duration; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Why do you want to take your business online?:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->	why_online; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Please list the products that you service/sell.:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->products; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">How did you hear about Chalo Online?:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->how_hear_about_chaloonline; } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">What is your annual sales volume?*:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->annual_sales_volume; } ?>	</b></td>
                                       </tr>
									   <tr>
                                          <td class="text-left">What market (region) do you service? What is your geographic reach?* :</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->geographic_reach; } ?> </b></td>
                                       </tr>
                                         <tr>
                                          <td class="text-left">How many sales people do you have on your team?:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->sales_people_number; } ?> </b></td>
                                       </tr>
                                         </tr>
                                         <tr>
                                          <td class="text-left"> 
                                             What is your monthly marketing budget and what marketing mediums do you utilize?*:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->monthly_market_budget; } ?> </b></td>
                                       </tr>
                                         <tr>
                                          <td class="text-left"> 
                                           What are your sales goals for 2021-2022?:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->sales_goals; } ?> </b></td>
                                       </tr>
                                       
                                        <tr>
                                          <td class="text-left"> 
                                           GST number:</td>
                                          <td style="text-align:left;"><b><?php if(!empty($record)) { echo $record->gst_number; } ?> </b></td>
                                       </tr>
                                     
                                    </tbody>
                                 </table>
					</div>
					<div class="tab-pane fade" id="nav-doc" role="tabpanel" aria-labelledby="nav-doc-tab">
					    
					     <h4>Address information</h4>
			                   <table class="table" width="80px" align="center">
                                    <tbody >
                                       <tr>
                                          <td class="text-left">photo:</td>
                                         <td style="text-align:left;"><b><?php if(!empty($record)) { ?>
                                         <img style="max-height:80px;" src="https://chaloonline.in/uploads/documents/<?php echo $record->photo; ?>" onclick="window.open(this.src)">
                                         <?php } ?></b></td>
                                            
                                       </tr>
                                       <tr>
                                          <td class="text-left">Address Proof:</td>
                                         <td style="text-align:left;"><b><?php if(!empty($record)) { ?>
                                         <img style="max-height:80px;" src="https://chaloonline.in/uploads/documents/<?php echo $record->address_proof; ?>"  onclick="window.open(this.src)">
                                         <?php } ?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Pan card:</td>
                                        <td style="text-align:left;"><b><?php if(!empty($record)) { ?>
                                         <img style="max-height:80px;" src="https://chaloonline.in/uploads/documents/<?php echo $record->pan_card; ?>"  onclick="window.open(this.src)">
                                         <?php } ?></b></td>
                                       </tr>
                                      
                                     
                                    </tbody>
                                 </table>
					
					
					
					
					</div>
				</div>
			
			</div>
		</div>
	</div>
</section>
        </div>
    </div>
</div>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Approve</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="post">
              <div class="modal-body">
                  
                   <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="brand_name">Amount</label>
                            <input class="form-control" type="text" name="amount"/>
                        </div>
                         <div class="form-group col-md-12">
                            <label for="brand_name">Features</label>
                            <button onclick="AppendHighlights()" type="button" class="ml-4 btn btn-sm btn-primary">Add</button>
                             <div id="features_field">
                        </div>
                 </div>
                  
              </div>
        
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Approve</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
     </form>
    </div>
  </div>
</div>
<script>
      function AppendHighlights(){
        var html='<div class="row mt-2">'+
                    '<div class="col-md-10">'+
                        '<input type="text"  name="features[]" class="d-inline form-control"/>'+
                    '</div>'+
                    '<button class="d-inline btn btn-danger" onclick="this.parentNode.parentNode.removeChild(this.parentNode)">Del</button>'+
                '</div>';
        document.getElementById("features_field").insertAdjacentHTML('afterend',html);
    }
</script>