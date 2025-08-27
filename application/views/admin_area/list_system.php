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
                                 <div id="preview"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right" id="btn_system_add">Add Role</button>
                     </div>
                </form>
            </div>
         </div>
      </div>
   </div>
<!----------------------------- <END> Modal Add System <END> ---------------------------->

<!----------------------------- Modal Edit Role --------------------------------------->
<div class="modal fade" id="role_edit_modal" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Edit Role</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&Chi;</span>
					</button>
            </div>
            <div class="modal-body">
               <!-- Add form here -->
                  <form class="form-horizontal" method="post" action="" id="edit_role_form">
                     <div class="card-body">
                        <div id="roleInputWrapper">
                           <div class="form-group row">
                              <input type="hidden" class="form-control" id="role_id_edit" name="role_id_edit">
                              <div class="col-sm-1">
                                 <label class="col-sm-3 col-form-label">Role</label>
                              </div>
                              <div class="col-sm-3">
                                 <input type="text" class="form-control" name="role_name_edit" id="role_name_edit" placeholder="Role Name" required>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="role_desc_edit" id="role_desc_edit" placeholder="Role Description" required>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right" id="btn_role_update">Update Role</button>
                     </div>
                </form>
            </div>
         </div>
      </div>
</div>
<!----------------------------- <END> Modal Edit Role <END> ---------------------------->

<!--------------------------- Modal Delete Role -------------------------------------->
<div class="modal fade" id="role_delete_modal" tabindex="-1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Delete Role</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
         <h4>Are you sure you want to delete this role?</h4><br/>
         <h5 style="color: red;">If you delete this role, corresponding user will lose access. This cannot be undone.</h5>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="btn_confirm_delete">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!--------------------------- <END> Modal Delete Role <END> ----------------------------->

<!--------------------------- Modal Assign Access -------------------------------------->
<div class="modal fade" id="modalSetAccess" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Set Access</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&Chi;</span>
					</button>
            </div>
            <form id="formSetAccess" method="post" role-id="">
               <input type="hidden" name="role_id" id="role_id">
               <div class="modal-body" id="access-content">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th style="width: 40%">System</th>
                           <th>Menu</th>
                        </tr>
                     </thead>
                     <tbody id="accessTable">
                        <!-- Isi dari AJAX -->
                     </tbody>
                  </table>    
               </div>
               <div class="modal-footer">
                  <input type="hidden" name="role_id" id="role_id">
                  <button type="button" class="btn btn-primary" id="btnSaveAccess">Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>

<!--------------------------- <END> Modal Assign Access <END> ----------------------------->

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

      // Delete Role
      $('#list_role_table').on('click','.btn_delete', function(){
         let role_id = $(this).attr('data-id');
         $('#role_delete_modal').modal('show');
         $('#btn_confirm_delete').on('click', function(){
            $.ajax({
               url : '<?= base_url('admin_area/usermanagement/delete_role')?>',
               type  : 'POST',
               data  : {role_id_delete : role_id},
               success : function(response){
                  $('#role_delete_modal').modal('hide');
                  if(response.success){
                     Swal.fire("Role has been deleted",'','success');
                  } else {
                     Swal.fire("Role data failed to delete",'','error');
                  }
                  setTimeout(function(){
                     location.reload();
                  },1300);
               }
            });
         });
      });
      // <END> Ajax for Delete Role <END>

      // Ajax for Show Edit Role
      $('#list_role_table').on('click','.btn_edit', function(e){
         e.preventDefault();
         let role_id = $(this).attr('data-id');
         $.ajax({
            url : '<?= base_url('admin_area/usermanagement/edit_role')?>',
            type : 'POST',
            data : {role_id_edit : role_id},
            dataType : 'json',
            success : function(response){
               console.log(response);
               $('#role_id_edit').val(response[0].role_id);
               $('#role_name_edit').val(response[0].role_name);
               $('#role_desc_edit').val(response[0].role_desc);
               $('#role_edit_modal').modal('show');
            }
         });
      });
      // <END> Ajax for Show Edit Role <END>

      // Ajax for Update Role
      $('#btn_role_update').on('click',(function(e){
         e.preventDefault();
         var form_data = new FormData($('#edit_role_form')[0]);

         $.ajax({
            url : '<?= base_url('admin_area/usermanagement/update_role')?>',
            type : 'POST',
            dataType : 'json',
            data : form_data,
            contentType : false,
            cache : false,
            processData : false,
            success : function(response){
               if(response.success){
                  console.log(response);
                  $('#edit_role_form')[0].reset();
                  $('#role_edit_modal').modal('hide');
                  Swal.fire("Role updated succesfully",'','success');
                  setTimeout(function(){
                     location.reload();
                  }, 1300);
               } else {
                  console.log(response);
                  Swal.fire("Update Role failed",'','error');
               }
            }
         });
      }));
      // <END> Ajax for Update Role <END>

      // Ajax for Showing Access Modal
      $('#list_role_table').on('click','.btn_access', function(){
         let roleId = $(this).attr('data-id');
         $('#formSetAccess').attr('role-id', roleId);
         $('#role_id').val(roleId);
         console.log("Role ID:", roleId);
         // $('#modalSetAccess').modal('show');
         $.ajax({
            url: '<?= base_url('admin_area/usermanagement/get_role_access')?>',
            type: 'POST',
            data: { role_id: roleId },
            dataType: 'json',
            success: function(res){
               $('#accessTable').empty(); // hapus isi lama

               $.each(res.systems, function(i, sys){
                     // buat baris system
                     let menusHtml = '';
                     $.each(sys.menus, function(j, menu){
                        menusHtml += `
                           <div class="form-check">
                                 <input type="checkbox" class="form-check-input" name="menu[]" value="${menu.id}" ${menu.checked ? 'checked' : ''}>
                                 <label class="form-check-label">${menu.name}</label>
                           </div>
                        `;
                     });

                     $('#accessTable').append(`
                        <tr>
                           <td>
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="system[]" value="${sys.id}" ${sys.checked ? 'checked' : ''}>
                                    <label class="form-check-label">${sys.name}</label>
                                 </div>
                           </td>
                           <td>${menusHtml}</td>
                        </tr>
                     `);
               });
               $('#modalSetAccess').modal('show');
            }
         });
      }); // Show Access modal <END>

      // Save selected access to Database
      $('#btnSaveAccess').on('click', function(e){
         e.preventDefault();

         let roleId = $('#formSetAccess').attr('role-id');
         let systems = [];
         let menus = [];

         // Get all checked system
         $('input[name="system[]"]:checked').each(function() {
            systems.push($(this).val());
         });

         // Get all checked menu
         $('input[name="menu[]"]:checked').each(function() {
            menus.push($(this).val());
         });

         $.ajax({
            url : '<?= base_url('admin_area/usermanagement/save_role_access')?>',
            type : 'POST',
            dataType : 'json',
            data : {
               role_id : roleId,
               systems : systems,
               menus : menus
            },
            success : function(response){
               if (response.status === 'success'){
                  Swal.fire('Role Access Saved Succesfully','','success');
                  $('#modalSetAccess').modal('hide');
               } else {
                  Swal.fire("Role Access Not Saved",'','error');
               }
            }
         });
      }); // Save Selectec access to Database <END>

    });
</script>