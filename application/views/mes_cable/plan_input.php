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
                   <?php
                     $no = 5;
                   ?>
                  <div class="table-responsive">
                     <table id="daily_plan_table" class="table table-bordered table-striped" cellspacing="0">
                        <thead>
                           <tr>
                              <th rowspan="2">No</th>
                              <th rowspan="2">Date</th>
                              <th rowspan="2">Sales Order No</th>
                              <th rowspan="2">Coloring Plan</th>
                              <th rowspan="2">Tubing Plan</th>
                              <th rowspan="2">Stranding Plan</th>
                              <th colspan="2" class="text-center">Sheathing Plan</th>
                              <th rowspan="2">Planned by</th>
                              <th rowspan="2">Action</th>
                           </tr>
                           <tr>
                              <th>CKM</th>
                              <th>FKM</th>
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
                              <i><h6>*Please input the plan in Km</h6></i>
                           </div>
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
                              <input type="number" class="form-control" id="plan_coloring_add" name="plan_coloring_add">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_tubing_add" class="col-sm-3 col-form-label">Tubing Plan</label>
                           <div class="col-sm-6">
                              <input type="number" class="form-control" id="plan_tubing_add" name="plan_tubing_add">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_stranding_add" class="col-sm-3 col-form-label">Stranding Plan</label>
                           <div class="col-sm-6">
                              <input type="number" class="form-control" id="plan_stranding_add" name="plan_stranding_add">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_sheathing_add" class="col-sm-3 col-form-label">Sheathing Plan</label>
                           <div class="col-sm-6">
                              <div class="row">
                                 <div class="col-5">
                                    <input type="number" class="form-control" id="plan_sheathing_ckm_add" name="plan_sheathing_ckm_add" placeholder="CKM">
                                 </div>
                                 <div class="col-5">
                                    <input type="number" class="form-control" id="plan_sheathing_fkm_add" name="plan_sheathing_fkm_add" placeholder="FKM">
                                 </div>
                              </div>  
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right" id="btn_plan_add">Set Plan</button>
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
                           <div class="col-sm-6">
                              <input type="hidden" class="form-control" id="plan_id_edit" name="plan_id_edit">
                           </div>
                        </div>
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
                              <input type="number" class="form-control" id="plan_coloring_edit" name="plan_coloring_edit">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_tubing_edit" class="col-sm-3 col-form-label">Tubing Plan</label>
                           <div class="col-sm-6">
                              <input type="number" class="form-control" id="plan_tubing_edit" name="plan_tubing_edit">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_stranding_edit" class="col-sm-3 col-form-label">Stranding Plan</label>
                           <div class="col-sm-6">
                              <input type="number" class="form-control" id="plan_stranding_edit" name="plan_stranding_edit">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="plan_sheathing_edit" class="col-sm-3 col-form-label">Sheathing Plan</label>
                           <div class="col-sm-6">
                              <div class="row">
                                 <div class="col-5">
                                    <input type="number" class="form-control" id="plan_sheathing_ckm_edit" name="plan_sheathing_ckm_edit" placeholder="CKM">
                                 </div>
                                 <div class="col-5">
                                    <input type="number" class="form-control" id="plan_sheathing_fkm_edit" name="plan_sheathing_fkm_edit" placeholder="FKM">
                                 </div>
                              </div>  
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary float-right" id="btn_plan_update">Set Plan</button>
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
         /* ======================= Show Daily Plan Data ========================= */
         show_plan_data();

         $('#plan_date_add, #plan_date_edit').datetimepicker({
            format : 'YYYY-MM-DD'
         });

         function show_plan_data(){
            $.ajax({
               url : "<?= base_url('mes_cable/mc_plan_input/getPlanData')?>",
               type: 'POST',
               dataType: 'json',
               // async: false,
               success: function(response){
                  console.log(response);
                  if ($.fn.DataTable.isDataTable('#daily_plan_table')) {
                     $('#daily_plan_table').DataTable().clear().destroy();
                  }

                  $('#daily_plan_table').DataTable({
                     dom:
                     "<'row'<'col-md-6'B><'col-md-6'f>>" +
                     "<'row'<'col-12'tr>>" +
                     "<'row'<'col-md-5'i><'col-md-7'p>>",
                     // dom : 'Bfrtip',
                     processing: true,
                     "responsive": true,
                     "paging": true,
                     "lengthChange": false,
                     "searching": true,
                     "ordering": true,
                     "info": true,
                     "autoWidth": false,
                     "responsive": true,
                     buttons: ["copy", "csv", "excel", "pdf", "colvis"],
                     data: response,
                     columns: [
                        {data: null, render: function(data, type, row, meta){
                           return meta.row + 1;
                        }},
                        {data: 'date_plan',
                           render: function(data, type, row){
                              if(data) {
                                 const dateParts = data.split("-");
                                 return dateParts[2] + "-" + dateParts[1] + "-" + dateParts[0];
                              }
                              return '';
                           }
                        },
                        {data: 'sales_order_no'},
                        {data: 'coloring_plan_qty', render: renderDivideAndFormat},
                        {data: 'tubing_plan_qty', render: renderDivideAndFormat},
                        {data: 'stranding_plan_qty', render: renderDivideAndFormat},
                        {data: 'sheathing_plan_ckm_qty', render: renderDivideAndFormat},
                        {data: 'sheathing_plan_fkm_qty', render: renderDivideAndFormat},
                        {data: 'created_user_name'},
                        {data: 'plan_id', render: function(data, type, row){
                           return '<button class="btn btn-info btn-sm btn_edit me-2" data-id="' + data + '"><i class="fas fa-pencil-alt"></i> Edit</button> ' + '<button class="btn btn-danger btn-sm btn_delete" data-id="' + data + '"><i class="fas fa-trash-can"></i> Delete</button>';
                        }}
                     ]
                  });
               }     
            });  
         }

         /* ======================= <END>Show Daily Plan Data<END> ========================= */

         // Function to format the data output
         function renderDivideAndFormat(value) {
            let num = parseFloat(value);
            if (!value || isNaN(num)) return "0";
            return (num).toLocaleString('en-US', { minimumFractionDigits: 0 });
         }

         /* ======================= Add Daily Plan Data ========================= */
            $('#btn_plan_add').on('click', (function(e){
               e.preventDefault();
               var form_data = new FormData($('#add_plan_form')[0]);

               $.ajax({
                  url : "<?= base_url('mes_cable/mc_plan_input/addPlan')?>",
                  type : "POST",
                  dataType : 'json',
                  data : form_data,
                  contentType : false,
                  cache : false,
                  processData: false,
                  success : function(response){
                     console.log('RESPONSE:', response);
                     if(response.success){
                        $('#add_plan_form')[0].reset();
                        $('#plan_add_modal').modal('hide');
                        Swal.fire("Plan added succesfully",'','success');
                        // $('#daily_plan_table').DataTable().ajax.reload();
                        setInterval('location.reload()',1300);
                     } else {
                        Swal.fire("Adding Plan Failed",'','error');
                     }
                  }
               });
            }));
         /* =======================<END> Add Daily Plan Data <END>========================= */

         /* ======================= Show Edit Daily Plan Modal ========================= */
            $("#daily_plan_table").on('click','.btn_edit',function(e){
               e.preventDefault();
               let plan_id = $(this).attr('data-id');
               $.ajax({
                  url: '<?= base_url('mes_cable/mc_plan_input/editPlan')?>',
                  type: 'POST',
                  data: {plan_id : plan_id},
                  dataType: 'json',
                  success: function(response){
                     console.log(response);
                     $('#plan_edit_modal').modal('show');
                     $('#plan_id_edit').val(response[0].plan_id);
                     $('#plan_date_edit').val(response[0].date_plan);
                     $('#plan_so_number_edit').val(response[0].sales_order_no);
                     $('#plan_coloring_edit').val(response[0].coloring_plan_qty);
                     $('#plan_tubing_edit').val(response[0].tubing_plan_qty);
                     $('#plan_stranding_edit').val(response[0].stranding_plan_qty);
                     $('#plan_sheathing_edit').val(response[0].sheathing_plan_qty);
                  }
               });
            })
          /* =======================<END> Show Edit Daily Plan Modal <END>====================== */
         
          /* ======================= Update Daily Plan Data ========================= */
            $("#btn_plan_update").on('click',(function(e){
               e.preventDefault();
               var form_data = new FormData($('#edit_plan_form')[0]);

               $.ajax({
                  url : "<?= base_url('mes_cable/mc_plan_input/updatePlan')?>",
                  type : "POST",
                  dataType : 'json',
                  data : form_data,
                  contentType : false,
                  cache : false,
                  processData: false,
                  success : function(response){
                     console.log('RESPONSE:', response);
                     if(response.success){
                        $('#edit_plan_form')[0].reset();
                        $('#plan_edit_modal').modal('hide');
                        Swal.fire("Plan updated succesfully",'','success');
                        // $('#daily_plan_table').DataTable().ajax.reload();
                        setInterval('location.reload()',1300);
                     } else {
                        Swal.fire("Update Plan Failed",'','error');
                     }
                  }
               });
            }));
          /* =======================<END> Update Daily Plan Data <END>========================= */

         /* ============================ Delete Plan =============================== */
            $('#daily_plan_table').on('click','.btn_delete', function(){
               let plan_id = $(this).attr('data-id');
               $('#plan_delete_modal').modal('show');
               $('#btn_confirm_delete').on('click', function(){
                  $.ajax({
                     url: '<?= base_url('mes_cable/mc_plan_input/deletePlan')?>',
                     type: 'POST',
                     data : {plan_id_delete : plan_id},
                     success : function(response){
                        $('#plan_delete_modal').modal('hide');
                        if(response.success){
                           Swal.fire("Plan data has been deleted",'','success');
                        } else {
                           Swal.fire("Plan data failed to delete",'','error');
                        }
                        setInterval('location.reload()',1300);
                     }
                  });
               });
            });

         /* ============================<END> Delete Plan <END>=============================== */
         //  $('#daily_plan_table').DataTable({
         //    "paging": true,
         //    "lengthChange": false,
         //    "searching": true,
         //    "ordering": true,
         //    "info": true,
         //    "autoWidth": false,
         //    "responsive": true,
         //    "buttons": ["copy", "csv", "excel", "pdf", "colvis"]
         // }).buttons().container().appendTo('#daily_plan_table_wrapper .col-md-6:eq(0)');

      });

      
  </script>