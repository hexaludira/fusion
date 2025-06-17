<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">IT</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a class='h10'>IT Active menu - <b>Daily>Server Room Inspect</b></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php echo "Plan= ".$plan_coloring_data->plan_qty;?>
            <br>
            <?php echo "Actual= ".$mes_actual_data->actual_mes_qty;?>
            <br>
            <?php echo "Percentage= ".number_format((($mes_actual_data->actual_mes_qty / $plan_coloring_data->plan_qty) * 100),1)."%";?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Server Room Inspect Data</h3>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#room_add_modal"><i class="fas fa-plus"></i> Let the inspect begin!</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" cellspacing="0">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Date & Time</th>
                      <th>Temperature</th>
                      <th>Humidity</th>
                      <th>UPS</th>
                      <th>Server</th>
                      <th>Door</th>
                      <th>APAR</th>
                      <th>Remarks</th>
                      <th>Inspected by</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                          $no = 1;
                          foreach ($inspect_data as $data):
                      ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= date_format(date_create($data->room_inspect_datetime),"d-m-Y H:i:s"); ?></td>
                      <td><?= $data->room_inspect_temperature; ?>&deg;C</td>
                      <td><?= $data->room_inspect_humidity; ?>%</td>
                      <td><?php if($data->room_inspect_ups == "1"){ echo "Normal";} else {echo "Abnormal";} ?></td>
                      <td><?php if($data->room_inspect_server == "1"){ echo "Normal";} else {echo "Abnormal";} ?></td>
                      <td><?php if($data->room_inspect_door == "1"){ echo "Normal";} else {echo "Abnormal";} ?></td>
                      <td><?php if($data->room_inspect_apar == "1"){ echo "OK";} else {echo "Not OK";} ?></td>
                      <td><?= $data->room_inspect_remarks; ?></td>
                      <td><?= $data->room_inspect_by; ?></td> 
                      <td>
                          <button class="btn btn-info btn-sm btn_edit" id="<?= $data->id_room_inspect; ?>"><i class="fas fa-pencil-alt"></i>
                              Edit
                          </button>
                          <button class="btn btn-danger btn-sm btn_delete" id="<?= $data->id_room_inspect; ?>"><i class="fas fa-trash-can"></i>
                              Delete
                          </button>
                      </td>
                    </tr>  
                    <?php
                      endforeach;
                    ?>               
                    </tbody>
                  </table>
                  <!-- Show session name -->
                  <!-- <button class="btn btn-danger btn-sm btn_ping">
                              test ping
                  </button> -->
                  <!-- <span class="hide_password_text">ini password</span> -->
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  <!------------------- Modal Add System ---------------------------------->
  <div class="modal fade" id="room_add_modal" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Please Add Inspection Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Add form here -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <form id="add_room_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-4">
                        <!-- <div class="form-group">
                           <input type="hidden" class="form-control" id="system_id_edit">
                        </div> -->
                        <div class="form-group">
                          <label><h5>Inspection Date & Time</h5></label>
                          <div class="input-group date" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#room_inspectdate_add" id="room_inspectdate_add" name="room_inspectdate_add">
                            <div class="input-group-append" data-target="#room_inspectdate_add" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label><h5>Temperature</h5></label>
                            <input type="number" class="form-control" id="room_temperature_add" name="room_temperature_add" placeholder="--Numeric Only--" step=".01">
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label><h5>Humidity</h5></label>
                            <input type="number" class="form-control" id="room_humidity_add" name="room_humidity_add" placeholder="--Numeric Only" step=".01">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label><h5>UPS</h5></label>
                              <select name="room_ups_select_add" class="form-control" id="room_ups_select_add">
                                <option></option>
                                <option value="1">Normal</option>
                                <option value="2">Abnormal</option>
                                <!-- <option value="3">Consumables</option> -->
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                                <label><h5>Server</h5></label>
                                <select name="room_server_select_add" class="form-control" id="room_server_select_add">
                                  <option></option>
                                  <option value="1">Normal</option>
                                  <option value="2">Abnormal</option>
                                  <!-- <option value="3">Consumables</option> -->
                                </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                                <label><h5>Door</h5></label>
                                <select name="room_door_select_add" class="form-control" id="room_door_select_add">
                                  <option></option>
                                  <option value="1">Normal</option>
                                  <option value="2">Abnormal</option>
                                  <!-- <option value="3">Consumables</option> -->
                                </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                                <label><h5>APAR</h5></label>
                                <select name="room_apar_select_add" class="form-control" id="room_apar_select_add">
                                  <option></option>
                                  <option value="1">OK</option>
                                  <option value="2">Not OK</option>
                                  <!-- <option value="3">Consumables</option> -->
                                </select>
                            </div>
                          </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label><h5>Remarks</h5></label>
                        <textarea class="form-control" name="room_remarks_add" id="room_remarks_add" rows="3"></textarea>
                        </div>
                      </div>    
                    </div>
                  </form>       
                </div>
            </div>
          </div>       
        </div>         
      </div>
      <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" id="btn_tac_add">Add</button>
			</div>
      
    </div>
	</div>			
	</div>
  <!------------------- <END>Modal Add System<END> ---------------------------------->
  

  <!---------------------------- Modal Edit System ---------------------------------->
  <div class="modal fade" id="tac_edit_modal" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit T-A-C</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Add form here -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <form id="edit_tac_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                           <input type="hidden" class="form-control" id="tac_id_edit" name="tac_id_edit">
                        </div>
                        <div class="form-group">
                           <label><h5>Item Name</h5></label>
                           <input type="text" class="form-control" id="tac_item_edit" name="tac_item_edit">
                        </div>
                        <div class="form-group">
                          <label><h5>Item Type</h5></label>
                          <select name="tac_type_select_edit" class="form-control" id="tac_type_select_edit">
                            <option></option>
                            <option value="1">Tools</option>
                            <option value="2">Accessories</option>
                            <option value="3">Consumables</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label><h5>Item Function</h5></label>
                          <input type="text" class="form-control" id="tac_function_edit" name="tac_function_edit">
                        </div>
                        
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label><h5>Item Location</h5></label>
                            <input type="text" class="form-control" id="tac_location_edit" name="tac_location_edit">
                          </div>        
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label><h5>Item Price</h5></label>
                            <input type="text" class="form-control" id="tac_price_edit" name="tac_price_edit" placeholder="Price in IDR">
                          </div>    
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label><h5>Item Purchase Date</h5></label>
                          <div class="input-group date" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#tac_purchasedate_edit" id="tac_purchasedate_edit" name="tac_purchasedate_edit">
                            <div class="input-group-append" data-target="#tac_purchasedate_edit" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>
                        </div>   
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label><h5>Item Picture</h5></label>
                            <div class="custom-file">
                              <input type="file" ref="file" accept="image/*" class="custom-file-input" id="tac_picture_edit" name="tac_picture_edit">
                              <label class="custom-file-label" for="tac_picture_edit" id="label_image_edit">Choose file</label>
                            </div>
                          </div>       
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label><h5>Item Quantity</h5></label>
                          <input type="text" class="form-control" id="tac_quantity_edit" name="tac_quantity_edit">
                        </div>   
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label><h5>Unit</h5></label>
                            <select name="tac_unit_select_edit" class="form-control" id="tac_unit_select_edit">
                              <option></option>
                              <option value="pcs">pcs</option>
                              <option value="pack">pack</option>
                              <option value="meter(m)">meter(m)</option>
                              <option value="roll">roll</option>
                              <option value="kilometer(km)">kilometer(km)</option>
                              <option value="pairs">pairs</option>
                          </select>
                          </div>       
                      </div>
                    </div>
                    <!-- <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label><h5>Notes</h5></label>
                              <textarea class="form-control" id="tac_notes_add" rows="3"></textarea>
                            </div>
                          </div>
                    </div> -->
                  </form>
                </div>
              </div>
            </div>
          </div>
				</div>
				<div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" id="btn_tac_update">Update</button>
				</div>
			</div>
		</div>
	</div>
  <!------------------- <END>Modal Edit System<END> ---------------------------------->

  <!----------------------- Modal Delete TAC-------------------------------------->
  <div class="modal fade" id="tac_delete_modal" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete T-A-C</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
          <h4>Are you sure you want to delete?</h4>
				</div>
				<div class="modal-footer">
          <button type="button" class="btn btn-danger" id="btn_confirm_delete">Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
  <!----------------------- <END>Modal Delete System<END>---------------------------->

  <!-- ############################################################################ -->
  <!------------------------------ JavaScript --------------------------------------->
  <!-- <script src="/plugins/moment/moment.min.js"></script>
  <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->

  <script type="text/javascript">
    $(document).ready(function(){

      // Select2 JS
      $('#room_ups_select_add').select2({
        dropdownParent : $("#room_add_modal .modal-content"),
        theme: 'bootstrap4',
        placeholder: "--Select one--",
      });

      $('#room_server_select_add').select2({
        dropdownParent : $("#room_add_modal .modal-content"),
        theme: 'bootstrap4',
        placeholder: "--Select one--",
      });

      $('#room_door_select_add').select2({
        dropdownParent : $("#room_add_modal .modal-content"),
        theme: 'bootstrap4',
        placeholder: "--Select one--",
      });

      $('#room_apar_select_add').select2({
        dropdownParent : $("#room_add_modal .modal-content"),
        theme: 'bootstrap4',
        placeholder: "--Select one--",
      });


      $('#tac_type_select_edit').select2({
        dropdownParent : $("#tac_edit_modal .modal-content"),
        theme: 'bootstrap4',
        placeholder: "--Please choose one--",
      });

      $('#tac_unit_select_edit').select2({
        dropdownParent : $("#tac_edit_modal .modal-content"),
        theme: 'bootstrap4',
        placeholder: "--Please choose unit--",
      });
      //<END> Select2 JS


      //Custom input file
      bsCustomFileInput.init();

      //Datepicket init
      $('#room_inspectdate_add').datetimepicker({
        icons : {  time : 'far fa-clock'},
        format : 'YYYY-MM-DD HH:mm:ss',
        //pick12HourFormat : false
      });

      $('#room_inspectdate_edit').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
      });
     

			/* ======================= Menambahkan Data Inspeksi ========================= */
			$('#btn_tac_add').on('click', (function(e){
        e.preventDefault();
        var form_data = new FormData($('#add_room_form')[0]);

				$.ajax({
					url : "it/administrator/daily/room_inspect/roominspect_controller.php",
					type : "POST",
					data : form_data,
          contentType : false,
          cache : false,
          processData: false,
					success : function(response){
            if(response == "1"){
              Swal.fire("Data added succesfully",'','success');
            } else {
              Swal.fire("Adding Data Failed",'','error');
            }
            //Swal.fire(response);

            $('#room_inspectdate_add').val(null).trigger('change');
            $('#room_temperature_add').val("");
            $('#room_humidity_add').val("");
            $('#room_ups_select_add').val(null).trigger('change');
            $('#room_server_select_add').val(null).trigger('change');
            $('#room_door_select_add').val(null).trigger('change');
            $('#room_apar_select_add').val(null).trigger('change');
            $('#room_remarks_add').val("");

            $('#room_add_modal').modal("hide");
            setInterval('location.reload()',1300);
					}
				});
			}));

			/* =================== <END>Menambahkan Data TAC <END> ===================== */

      /* ================== Menampilkan modal Show Picture ====================== */
      $('#example1').on('click','.btn_image', function(){
        let image_id = $(this).attr('id');
        let img_name;
          // alert(cred_id);
          // $('#detail-credentials').append(cred_id)
          // $("#sys_cred_modal").modal('show');
          $.ajax({
            url : "it/administrator/masterdata/tac/tac_controller.php",
            type : "POST",
            dataType : 'json',
            data : {image_id : image_id},
            success : function(response){
              //Swal.fire(response);
              img_name = response;
              if (img_name == null){
                //alert("Gambar tidak ada");
                $('#tac_picture').attr("src","https://www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png");
                $('#tac_picture_modal').modal('show');
              } else {
                $('#tac_picture').attr("src","<?php $_SERVER['DOCUMENT_ROOT'];?>" + '/sash/it/administrator/masterdata/tac/'+ img_name);
                $('#tac_picture_modal').modal('show');
              }
            }
          })
      });
      /* =============== <END>Menampilkan modal Show Credentials<END> ============ */

      /* ======================= Menampilkan modal Edit TAC ======================= */
      $('#example1').on('click','.btn_edit', function(){
        let edit_id = $(this).attr('id');
        let picture_name_trim;
        let formattedDate;
        $.ajax({
          url : "<?= base_url('Room_inspect');?>",
          type : 'POST',
          data : {edit_tac_id : edit_id},
          dataType : 'json',
          success : function(response){
            console.log(response);
            $("#tac_edit_modal").modal("show");
            $('#tac_id_edit').val(response.id_tac);
            $('#tac_item_edit').val(response.tac_name);
            $('#tac_type_select_edit').val(response.tac_type).trigger('change');
            $('#tac_function_edit').val(response.tac_function);
            $('#tac_location_edit').val(response.tac_location);
            $('#tac_price_edit').val(response.tac_price);
            formattedDate = moment(response.tac_dateofpurchase).format('MM/D/YYYY')
            $('#tac_purchasedate_edit').val(formattedDate);
            picture_name_trim = (response.tac_picture).replace('pictures/','');
            $('#label_image_edit').text(picture_name_trim);
            $('#tac_quantity_edit').val(response.tac_quantity);
            $('#tac_unit_select_edit').val(response.tac_unit).trigger('change');
          }
        });
        //Swal.fire(edit_id);
      });
      /* ==================== <END> Menampilkan modal Edit TAC <END> ==================== */

      /* ======================= Mengupdate masterdata TAC (UPDATE) ========================= */
      $('#btn_tac_update').on('click', function(e){
        e.preventDefault();
        let form_data = new FormData($('#edit_tac_form')[0]);


        $.ajax({
          url : 'it/administrator/masterdata/tac/tac_controller.php',
          type : 'POST',
          data : form_data,
          contentType : false,
          cache : false,
          processData: false,
          success : function(response){
            //console.log(response);
            if(response == "1"){
              Swal.fire("Data updated succesfully",'','success');
            } else {
              Swal.fire("Update data failed",'','error')
            }
            
            $('#tac_item_edit').val("");
            $('#tac_type_select_edit').val(null).trigger('change');
            $('#tac_function_edit').val("");
            $('#tac_location_edit').val("");
            $('#tac_price_edit').val("");
            $('#tac_purchasedate_edit').val(null).trigger('change');
            $('#label_image_edit').text("Choose file");
            $('#tac_quantity_edit').val("");
            $('#tac_unit_select_edit').val(null).trigger('change');
            $('#tac_edit_modal').modal("hide");
            setInterval('location.reload()',1500);
          }
        });
      });
      /* ==================== <END> Mengupdate masterdata TAC (UPDATE) <END> =================== */

      /* ============================= Delete masterdata TAC ============================ */
      $('#example1').on('click','.btn_delete', function(){
        let tac_id_delete = $(this).attr('id');
        $('#tac_delete_modal').modal('show');
        $('#btn_confirm_delete').on('click', function(){
          $.ajax({
            url : 'it/administrator/masterdata/tac/tac_controller.php',
            type : 'POST',
            data : {tac_id_delete : tac_id_delete},
            success : function(response){
              $('#tac_delete_modal').modal('hide');
              if(response == "1"){
                Swal.fire("Data has been deleted",'','success');
              } else {
                Swal.fire("Data failed to delete",'','error');
              }
              
              setInterval('location.reload()',1300);
            }
          });
        });
      });
      /* ======================== <END> Delete masterdata system <END> ===================== */

      //PING BUTTON
      $('.btn_ping').on('click', function(){
        let fungsi = "test_ping";
        $.ajax({
            url : 'it/administrator/masterdata/tac/tac_controller.php',
            type : 'POST',
            data : {fungsi : fungsi},
            success : function(response){
              Swal.fire(response);
              
              //setInterval('location.reload()',1500);
            }
          });
      });
    });
    
  </script>
  <!--------------------------- <END> JavaScript <END> ----------------------------->