<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="mt-1">Welcome, <?= $this->session->userdata('name') ?>!</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daily Plan</h3>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#plan_add_modal"><i class="fas fa-plus"></i>Add New</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- Table Plan Daily -->
                  <div class="table-responsive">
                     <table id="daily_plan_table" class="table table-bordered table-striped" cellspacing="0">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Date</th>
                              <th>Sales Order No</th>
                              <th>Coloring Plan Qty</th>
                              <th>Tubing Plan Qty</th>
                              <th>Stranding Plan Qty</th>
                              <th>Sheathing Plan Qty</th>
                              <th>Planned by</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <!-- to be filled -->
                        </tbody>
                     </table>
                  </div>
                </div>
                <!-- card-body -->   
            </div>
            <!-- card -->
        </div>
    </div>
</div>
<!-- container-fluid -->
   <!----------------------------- Modal Add Plan --------------------------------------->
   <div class="modal fade" id="plan_add_modal" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Add New Plan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&Chi;</span>
					</button>
            </div>
            <div class="modal-body">
               <!-- Add form here -->
                  <form class="form-horizontal" method="post" action="" id="add_plan_form">
                     <div class="card-body">
                        <div class="form-group row">
                           <label for="plan_date_add" class="col-sm-3 col-form-label">Date</label>
                           <div class="col-sm-6">
                              <div class="input-group date" data-target-input="nearest">
                                 <input type="text" class="form-control datetimepicker-input" data-target="#plan_date_add" id="plan_date_add" name="plan_date_add">
                                 <div class="input-group-append" data-target="#plan_date_add" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_so_number_add" class="col-sm-3 col-form-label">Sales Order No</label>
                           <div class="col-sm-6">
                              <input type="text" class="form-control" id="plan_so_number_add" name="plan_so_number_add">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_coloring_add" class="col-sm-3 col-form-label">Coloring Plan</label>
                           <div class="col-sm-6">
                              <input type="text" class="form-control" id="plan_coloring_add" name="plan_coloring_add">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_tubing_add" class="col-sm-3 col-form-label">Tubing Plan</label>
                           <div class="col-sm-6">
                              <input type="text" class="form-control" id="plan_tubing_add" name="plan_tubing_add">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_stranding_add" class="col-sm-3 col-form-label">Stranding Plan</label>
                           <div class="col-sm-6">
                              <input type="text" class="form-control" id="plan_stranding_add" name="plan_stranding_add">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_sheathing_add" class="col-sm-3 col-form-label">Sheathing Plan</label>
                           <div class="col-sm-6">
                              <input type="text" class="form-control" id="plan_sheathing_add" name="plan_sheathing_add">
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right">Set Plan</button>
                     </div>
                </form>
            </div>
         </div>
      </div>
   </div>
   <!----------------------------- End Modal Add Plan ----------------------------------->

   <!----------------------------- Modal Edit Plan --------------------------------------->
   <div class="modal fade" id="plan_edit_modal" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Edit Plan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&Chi;</span>
					</button>
            </div>
            <div class="modal-body">
               <!-- Add form here -->
                  <form class="form-horizontal" method="post" action="" id="edit_plan_form">
                     <div class="card-body">
                        <div class="form-group row">
                           <label for="plan_date_edit" class="col-sm-3 col-form-label">Date</label>
                           <div class="col-sm-6">
                              <div class="input-group date" data-target-input="nearest">
                                 <input type="text" class="form-control datetimepicker-input" data-target="#plan_date_edit" id="plan_date_edit" name="plan_date_edit">
                                 <div class="input-group-append" data-target="#plan_date_edit" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_so_number_edit" class="col-sm-3 col-form-label">Sales Order No</label>
                           <div class="col-sm-6">
                              <input type="text" class="form-control" id="plan_so_number_edit" name="plan_so_number_edit">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_coloring_edit" class="col-sm-3 col-form-label">Coloring Plan</label>
                           <div class="col-sm-6">
                              <input type="text" class="form-control" id="plan_coloring_edit" name="plan_coloring_edit">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_tubing_edit" class="col-sm-3 col-form-label">Tubing Plan</label>
                           <div class="col-sm-6">
                              <input type="text" class="form-control" id="plan_tubing_edit" name="plan_tubing_edit">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_stranding_edit" class="col-sm-3 col-form-label">Stranding Plan</label>
                           <div class="col-sm-6">
                              <input type="text" class="form-control" id="plan_stranding_edit" name="plan_stranding_edit">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_sheathing_edit" class="col-sm-3 col-form-label">Sheathing Plan</label>
                           <div class="col-sm-6">
                              <input type="text" class="form-control" id="plan_sheathing_edit" name="plan_sheathing_edit">
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right">Set Plan</button>
                     </div>
                </form>
            </div>
         </div>
      </div>
   </div>
   <!----------------------------- End Modal Edit Plan ----------------------------------->

   <!----------------------- Modal Delete Plan-------------------------------------->
  <div class="modal fade" id="plan_delete_modal" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete Plan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
          <h4>Are you sure you want to delete plan?</h4>
				</div>
				<div class="modal-footer">
          <button type="button" class="btn btn-danger" id="btn_confirm_delete">Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
  <!----------------------- <END>Modal Delete Plan<END>---------------------------->

  <script type="text/javascript">
      $(document).ready(function(){
         $('#daily_plan_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "colvis"]
         }).buttons().container().appendTo('#daily_plan_table_wrapper .col-md-6:eq(0)');

      });
  </script>

  /* ======================= Menambahkan Data TAC ========================= */
			$('#btn_tac_add').on('click', (function(e){
        e.preventDefault();
        var form_data = new FormData($('#add_tac_form')[0]);
				// var tac_item_add = $('#tac_item_add').val();
				// var system_purpose = $('#system_purpose_add').val();
				// var system_location = $('#system_location_add').val();
				// var system_username = $('#system_username_add').val();
				// var system_password = $('#system_password_add').val();

				$.ajax({
					url : "it/administrator/masterdata/tac/tac_controller.php",
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

            $('#tac_item_add').val("");
            $('#tac_type_select_add').val(null).trigger('change');
            $('#tac_function_add').val("");
            $('#tac_location_add').val("");
            $('#tac_price_add').val("");
            $('#tac_purchasedate_add').val(null).trigger('change');
            $('#label_image_add').text("Choose file");
            $('#tac_quantity_add').val("");
            $('#tac_unit_select_add').val(null).trigger('change');

            $('#tac_add_modal').modal("hide");
            setInterval('location.reload()',1300);
					}
				});
			}));

                  