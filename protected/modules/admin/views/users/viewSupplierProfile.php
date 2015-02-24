 <?php if(!empty($var)){
    <div class="box">
      <div>
        <div class="panel panel-info">
          <div class="panel-heading ">
            <h3 class="panel-title"><b>Supplier Details For User Id #<?php echo $var->users_id; ?></b></h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class=" col-md-9 col-lg-12 "> 
                <table class="table table-user-information">
                  <tbody>  
                    <tr>
                      <td><b>Id</b></td>
                      <td><?php echo $var->id; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Name</b></td>
                      <td><?php echo $var->name; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Cover</b></td>
                      <td><?php echo $var->cover; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Website</b></td>
                      <td><?php echo $var->website; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Skype Id</b></td>
                      <td><?php echo $var->skype_id; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Email</b></td>
                      <td><?php echo $var->email; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Tagline</b></td>
                      <td><?php echo $var->tagline; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>About Company</b></td>
                      <td><?php echo $var->about_company; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Short Desc</b></td>
                      <td><?php echo $var->short_description; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Details</b></td>
                      <td><?php echo $var->details; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Foundation Year</b></td>
                      <td><?php echo $var->foundation_year; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Location</b></td>
                      <td><?php echo $var->location; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Pricing Details</b></td>
                      <td><?php echo $var->pricing_details; ?></td> 
                    </tr>
                    <tr>
                      <td><b>Minimum Price</b></td>
                      <td><?php echo $var->min_price; ?></td> 
                    </tr>
                    <tr>
                      <td><b>Number Of Employee</b></td>
                      <td><?php echo $var->number_of_employee; ?></td> 
                    </tr>
                    <tr>
                      <td><b>Total Available Employee</b></td>
                      <td><?php echo $var->total_available_employee; ?></td> 
                    </tr>
                    <tr>
                      <td><b>Consultation Description</b></td>
                      <td><?php echo $var->consultation_description; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Standard Pitch</b></td>
                      <td><?php echo $var->standard_pitch; ?></td> 
                    </tr>     
                    <tr>
                      <td><b>Standard Service Agreement</b></td>
                      <td><?php echo $var->standard_service_agreement; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Profile Status</b></td>
                      <td><?php echo $var->profile_status; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Add Date</b></td>
                      <td><?php echo $var->add_date; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Modification Date</b></td>
                      <td><?php echo $var->modification_date; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Rough Estimate</b></td>
                      <td><?php echo $var->rough_estimate; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Linked In</b></td>
                      <td><?php echo $var->linkedin; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Facebook</b></td>
                      <td><?php echo $var->facebook; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Google</b></td>
                      <td><?php echo $var->google; ?></td> 
                    </tr>
                    <tr>
                      <td><b>Twitter</b></td>
                      <td><?php echo $var->twitter; ?></td> 
                    </tr>  
                    <tr>
                      <td><b>Youtube</b></td>
                      <td><?php echo $var->you_tube; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Per Hour Rate</b></td>
                      <td><?php echo $var->per_hour_rate; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Project Size</b></td>
                      <td><?php echo $var->project_size; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Web References</b></td>
                      <td><?php echo $var->web_references; ?></td> 
                    </tr>
                    <tr>
                      <td><b>Development Location</b></td>
                      <td><?php echo $var->development_location; ?></td> 
                    </tr>  
                    <tr>
                      <td><b>Sales Location</b></td>
                      <td><?php echo $var->sales_location; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Response Time</b></td>
                      <td><?php echo $var->response_time; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Status</b></td>
                      <td><?php echo $var->status; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Accept New Project Date</b></td>
                      <td><?php echo $var->accept_new_project_date; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Link Status</b></td>
                      <td><?php echo $var->link_status; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Is Profile Complete</b></td>
                      <td><?php echo $var->is_profile_complete; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Offers</b></td>
                      <td><?php echo $var->offers; ?></td> 
                    </tr> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>      
        </div>
      </div>
    </div>
<?php  
    }
    else "NOT A SUPPLIER YET";
    ?>