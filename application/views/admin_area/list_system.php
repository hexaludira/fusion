<div class="container-fluid">
   <div class="row">
      <div class="col">
         <h3 class="mt-1">System Management</h3>
         <!-- <p class="lead">Ini adalah main dashboard MES Cable.</p> -->
      </div>
   </div>
   
   <div>
      <div class="col">
			<div class="card">
			   <div class="card-header mt-2">
               <h2 class="card-title">List System</h2>
               <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#system_add_modal"><i class="fas fa-plus"></i>Add System</button>
				</div>
				<div class="card-body">
               <!-- Data table for List Role -->
                <div class="row">
                  <div class="col-md-12">
                     <div class="table-responsive">
                        <table id="list_system_table" class="table table-bordered table-striped" cellspacing="0">
                           <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">System Code</th>
                                <th class="text-center">System Name</th>
                                <th class="text-center">System Description</th>
                                <th class="text-center">URL</th>
                                <th class="text-center">Color</th>
                                <th class="text-center">Icon</th>
                                <th class="text-center">Action</th>
                            </tr>
                           </thead>
                           <tbody>
                              <!-- to be filled -->
                           </tbody>
                        </table>
                     </div>
                  </div>
                </div>

				</div>
			</div>
    </div>
   </div>
</div> <!-- .container-fluid -->

<!----------------------------- Modal Add System --------------------------------------->
<div class="modal fade" id="system_add_modal" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Add New System</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&Chi;</span>
					</button>
            </div>
            <div class="modal-body">
               <!-- Add form here -->
                  <form class="form-horizontal" method="post" action="" id="add_system_form" enctype="multipart/form-data">
                     <div class="card-body">
                        <div class="form-group row">
                           <i><h6>*Please input the new system</h6></i>
                        </div>
                        <div id="roleInputWrapper">
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">System Code</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="system_code_add" placeholder="Ex: mes_cable" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">System Name</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="system_name_add" placeholder="Ex: MES Cable" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">System Description</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="system_desc_add" placeholder="Ex: Dashboard & Report">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">System URL</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="system_url_add" placeholder="Ex: mes_cable/mc_main_dashboard" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">System Color</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="system_color_add" placeholder="Ex: bg-danger" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">System Icon</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="file" class="form-control" name="system_icon_add" required>
                                 <!-- <div id="preview"></div> -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right" id="btn_system_add">Add System</button>
                     </div>
                </form>
            </div>
         </div>
      </div>
   </div>
<!----------------------------- <END> Modal Add System <END> ---------------------------->

<!----------------------------- Modal Edit System --------------------------------------->
<div class="modal fade" id="system_edit_modal" tabindex="-1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Edit System</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&Chi;</span>
            </button>
         </div>
         <div class="modal-body">
            <!-- Add form here -->
               <form class="form-horizontal" method="post" action="" id="edit_system_form" enctype="multipart/form-data">
                  <div class="card-body">
                     <div class="form-group row">
                        <i><h6>*Please edit the system</h6></i>
                     </div>
                     <div id="roleInputWrapper">
                        <div class="form-group row">
                           <input type="hidden" class="form-control" id="system_id_edit" name="system_id_edit">
                           <div class="col-sm-3">
                              <label class="col-form-label">System Code</label>
                           </div>
                           <div class="col-sm-5">
                              <input type="text" class="form-control" name="system_code_edit" id="system_code_edit" placeholder="Ex: mes_cable" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-3">
                              <label class="col-form-label">System Name</label>
                           </div>
                           <div class="col-sm-5">
                              <input type="text" class="form-control" name="system_name_edit" id="system_name_edit" placeholder="Ex: MES Cable" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-3">
                              <label class="col-form-label">System Description</label>
                           </div>
                           <div class="col-sm-5">
                              <input type="text" class="form-control" name="system_desc_edit" id="system_desc_edit" placeholder="Ex: Dashboard & Report">
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-3">
                              <label class="col-form-label">System URL</label>
                           </div>
                           <div class="col-sm-5">
                              <input type="text" class="form-control" name="system_url_edit" id="system_url_edit" placeholder="Ex: mes_cable/mc_main_dashboard" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-3">
                              <label class="col-form-label">System Color</label>
                           </div>
                           <div class="col-sm-5">
                              <input type="text" class="form-control" name="system_color_edit" id="system_color_edit" placeholder="Ex: bg-danger" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-3">
                              <label class="col-form-label">System Icon</label>
                           </div>
                           <div class="col-sm-5">
                              <input type="hidden" name="system_icon_old" id="system_icon_old">
                              <input type="file" class="form-control" name="system_icon_edit" name="system_icon_edit">
                              <small class="text-muted">Current: <span id="icon_filename"></span></small>
                              <div id="preview"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary float-right" id="btn_system_update">Update System</button>
                  </div>
               </form>
         </div>
      </div>
   </div>
</div>
<!----------------------------- <END> Modal Edit System <END> ---------------------------->

<!--------------------------- Modal Delete System -------------------------------------->
<div class="modal fade" id="system_delete_modal" tabindex="-1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Delete System</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
         <h4>Are you sure you want to delete this System?</h4><br/>
         <h5 style="color: red;">If you delete this system, all menu tied to this system cannot be accessed. This cannot be undone.</h5>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="btn_confirm_delete">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!--------------------------- <END> Modal Delete System <END> ----------------------------->

<script type="text/javascript">
    $(document).ready(function(){

      show_list_system();

      /* ======================= Show List System Data ========================= */
      function show_list_system(){
         $.ajax({
            url : '<?= base_url('admin_area/systemmanagement/list_system')?>',
            type : 'POST',
            dataType : 'json',
            success: function(response){
               console.log(response);
               if ($.fn.DataTable.isDataTable('#list_system_table')) {
                     $('#list_system_table').DataTable().clear().destroy();
               }

               $('#list_system_table').DataTable({
                  dom:
                  "<'row'<'col-md-6'B><'col-md-6'f>>" +
                  "<'row'<'col-12'tr>>" +
                  "<'row'<'col-md-5'i><'col-md-7'p>>",
                  processing: true,
                  "responsive" : true,
                  "paging" : true,
                  "lengthChange" : false,
                  "searching": true,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false,
                  buttons: ["copy", "csv", "excel", "pdf", "colvis"],
                  data: response,
                  columns: [
                     {data: null, render: function(data, type, row, meta){
                        return meta.row + 1;
                     }},
                     {data: 'system_code'},
                     {data: 'system_name'},
                     {data: 'system_desc'},
                     {data: 'url'},
                     {data: 'color'},
                     {data: 'icon', render: function(data, type, row){
                        if(data){
                           return '<img src="<?= base_url("assets/img/")?>' + data + '" alt="icon" width="70">';
                        } else {
                           return '<?= "no_picture"?>';
                        }
                     }},
                     {data: 'system_id', render: function(data, type, row){
                        return '<button class="btn btn-info btn-sm btn_edit" data-id="' + data + '"><i class="fas fa-pencil-alt"></i> Edit</button> ' + 
                        '<button class="btn btn-danger btn-sm btn_delete m-1" data-id="' + data + '"><i class="fas fa-trash-can"></i> Delete</button>'
                     }}
                  ]
               });
            }
         });
      }

      /* ======================= <END>Show List System Data<END> ========================= */

      // Submit new system
      $('#btn_system_add').on('click', function(e){
         e.preventDefault();
         
         let formData = new FormData($('#add_system_form')[0]);
         
         $.ajax({
            url : '<?= base_url('admin_area/systemmanagement/add_new_system')?>',
            type : 'POST',
            dataType : 'json',
            data : formData,
            processData : false,
            contentType : false,
            success : function(response) {
               if(response.success){
                  $('#add_system_form')[0].reset();
                  $('#system_add_modal').modal('hide');
                  Swal.fire("System added succesfully",'','success');
                  setTimeout(function(){
                     location.reload();
                  },1300);
               } else {
                  Swal.fire("Adding System Failed",'','error');
               }
            }
         });
      });
      // <END> Submit new System <END>

      // Show Edit System Modal
      $('#list_system_table').on('click','.btn_edit', function(e){
         e.preventDefault();
         let system_id = $(this).attr('data-id');
         $.ajax({
            url : '<?= base_url('admin_area/systemmanagement/edit_system')?>',
            type : 'POST',
            data : {system_id_edit : system_id},
            dataType : 'json',
            success : function(response){
               console.log(response);
               console.log("ICON:", response[0].icon);
               console.log("URL:", "<?= base_url('assets/img/')?>"+response[0].icon);
               $('#system_id_edit').val(response[0].system_id);
               $('#system_code_edit').val(response[0].system_code);
               $('#system_name_edit').val(response[0].system_name);
               $('#system_desc_edit').val(response[0].system_desc);
               $('#system_url_edit').val(response[0].url);
               $('#system_color_edit').val(response[0].color);
               $('#system_icon_edit').val(response[0].icon);
               $('#system_icon_old').val(response[0].icon);
               let iconUrl = "<?= base_url('assets/img/'); ?>" + response[0].icon;
               $('#preview').html('<img src="' + iconUrl + '" width="50" alt="icon">');
               $('#icon_filename').text(response[0].icon);
               $('#system_edit_modal').modal('show');
            }
         });
      });
      // <END> Show Edit System Modal <END>

      // Ajax for Update System
      $('#btn_system_update').on('click',(function(e){
         e.preventDefault();
         var form_data = new FormData($('#edit_system_form')[0]);

         $.ajax({
            url : '<?= base_url('admin_area/systemmanagement/update_system')?>',
            type : 'POST',
            dataType : 'json',
            data : form_data,
            contentType : false,
            cache : false,
            processData : false,
            success : function(response){
               if(response.success){
                  console.log(response);
                  $('#edit_system_form')[0].reset();
                  $('#system_edit_modal').modal('hide');
                  Swal.fire("System updated succesfully",'','success');
                  setTimeout(function(){
                     location.reload();
                  }, 1300);
               } else {
                  console.log(response);
                  Swal.fire("Update System failed",'','error');
               }
            }
         });
      }));
      // <END> Ajax for Update System <END>

       // Delete System
       $('#list_system_table').on('click','.btn_delete', function(){
         let system_id = $(this).attr('data-id');
         $('#system_delete_modal').modal('show');
         $('#btn_confirm_delete').on('click', function(){
            $.ajax({
               url : '<?= base_url('admin_area/systemmanagement/delete_system')?>',
               type  : 'POST',
               dataType : 'json',
               data  : {system_id_delete : system_id},
               success : function(response){
                  $('#system_delete_modal').modal('hide');
                  if(response.success){
                     Swal.fire("System has been deleted",'','success');
                  } else {
                     Swal.fire("System failed to delete",'','error');
                  }
                  setTimeout(function(){
                     location.reload();
                  },1300);
               }
            });
         });
      });
      // <END> Ajax for Delete System <END>


    });
</script>