<div class="container-fluid">
   <div class="row">
      <div class="col">
         <h3 class="mt-1">Role Management</h3>
         <!-- <p class="lead">Ini adalah main dashboard MES Cable.</p> -->
      </div>
   </div>
   
   <div>
      <div class="col">
			<div class="card">
			   <div class="card-header mt-2">
               <h2 class="card-title">List Role</h2>
               <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#role_add_modal"><i class="fas fa-plus"></i>Add Role</button>
				</div>
				<div class="card-body">
               <!-- Data table for List Role -->
                <div class="row">
                  <div class="col-md-12">
                     <div class="table-responsive">
                        <table id="list_role_table" class="table table-bordered table-striped" cellspacing="0">
                           <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Role ID</th>
                                <th class="text-center">Role Name</th>
                                <th class="text-center">Role Description</th>
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

<!----------------------------- Modal Add Role --------------------------------------->
<div class="modal fade" id="role_add_modal" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Add New Role</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&Chi;</span>
					</button>
            </div>
            <div class="modal-body">
               <!-- Add form here -->
                  <form class="form-horizontal" method="post" action="" id="add_role_form">
                     <div class="card-body">
                        <div class="form-group row">
                           <i><h6>*Please input the role name and description</h6></i>
                        </div>
                        <div id="roleInputWrapper">
                           <div class="form-group row">
                              <div class="col-sm-1">
                                 <label class="col-sm-3 col-form-label">Role</label>
                              </div>
                              <div class="col-sm-3">
                                 <input type="text" class="form-control" name="role_name_add[]" placeholder="Role Name" required>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="role_desc_add[]" placeholder="Role Description" required>
                              </div>
                              <div class="col-sm-3">
                                 <button type="button" class="btn btn-secondary" id="btn_another_role">Add another field</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right" id="btn_role_add">Add Role</button>
                     </div>
                </form>
            </div>
         </div>
      </div>
   </div>
<!----------------------------- <END> Modal Add Role <END> ---------------------------->

<!----------------------------- Modal Edit Role --------------------------------------->
<div class="modal fade" id="role_add_modal" tabindex="-1">
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
                              <div class="col-sm-1">
                                 <label class="col-sm-3 col-form-label">Role</label>
                              </div>
                              <div class="col-sm-3">
                                 <input type="text" class="form-control" name="role_name_edit" placeholder="Role Name" required>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="role_desc_edit" placeholder="Role Description" required>
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

<script type="text/javascript">
    $(document).ready(function(){

      show_list_role();

      /* ======================= Show List Role Data ========================= */
      function show_list_role(){
         $.ajax({
            url : '<?= base_url('admin_area/usermanagement/list_role')?>',
            type : 'POST',
            dataType : 'json',
            success: function(response){
               console.log(response);
               if ($.fn.DataTable.isDataTable('#list_role_table')) {
                     $('#list_role_table').DataTable().clear().destroy();
               }

               $('#list_role_table').DataTable({
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
                     {data: 'role_id'},
                     {data: 'role_name'},
                     {data: 'role_desc'},
                     {data: 'role_id', render: function(data, type, row){
                        return '<button class="btn btn-info btn-sm btn_edit me-2" data-id="' + data + '"><i class="fas fa-pencil-alt"></i> Edit</button> ' + '<button class="btn btn-danger btn-sm btn_delete" data-id="' + data + '"><i class="fas fa-trash-can"></i> Delete</button>';
                     }}
                  ]
               });
            }
         });
      }

      /* ======================= <END>Show List Role Data<END> ========================= */

      // Function for add new role field
      $('#btn_another_role').on('click',function(){
         const newInput = `
            <div class="form-group row role-input-group">
               <div class="col-sm-1">
                  <label class="col-sm-3 col-form-label">Role</label>
               </div>
               <div class="col-sm-3">
                  <input type="text" class="form-control" name="role_name_add[]" placeholder="Role Name" required>
               </div>
               <div class="col-sm-5">
                  <input type="text" class="form-control" name="role_desc_add[]" placeholder="Role Description" required>
               </div>
               <div class="col-sm-3">
                  <button type="button" class="btn btn-danger remove-role-btn">&times;</button>
               </div>
            </div>
         `;
         $('#roleInputWrapper').append(newInput);
      });

      // delete Role input field
      $(document).on('click','.remove-role-btn', function(){
         $(this).closest('.role-input-group').remove();
      });

      // Ajax for submit new role
      $('#btn_role_add').on('click', function(e){
         e.preventDefault();
         // const roleName = $('#role_name_add').val();
         // const roleDesc = $('#role_desc_add').val();
         const roleNames = $('[name="role_name_add[]"]').map(function(){
            return $(this).val();
         }).get();
         const roleDesc = $('[name="role_desc_add[]"]').map(function(){
            return $(this).val();
         }).get();

         $.ajax({
            url : '<?= base_url('admin_area/usermanagement/add_new_role')?>',
            type : 'POST',
            dataType : 'json',
            data : { role_name_add : roleNames, role_desc_add : roleDesc},
            success : function(response) {
               if(response.status === 'success'){
                  $('#add_role_form')[0].reset();
                  $('#role_add_modal').modal('hide');
                  Swal.fire("Role added succesfully",'','success');
                  setTimeout(function(){
                     location.reload();
                  },1300);
               } else {
                  Swal.fire("Adding Role Failed",'','error');
               }
            }
         });
      });
      // <END> Ajax for submit new role <END>

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

      // Ajax for edit role


      // <END> Ajax for Edit Role <END>

    });
</script>