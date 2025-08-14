<div class="container-fluid">
	
	<!-- Select period -->
   <div class="row">
      <div class="col">
         <h3 class="mt-1">User Management</h3>
         
      </div>
   </div>
   
   <div>
      <div class="col">
			<div class="card">
			   <div class="card-header mt-2">
               <h2 class="card-title">List User</h2>
               <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#user_add_modal"><i class="fas fa-plus"></i>Add User</button>
				</div>
				<div class="card-body">
               <!-- Data table for List Role -->
                <div class="row">
                  <div class="col-md-12">
                     <div class="table-responsive">
                        <table id="list_user_table" class="table table-bordered table-striped" cellspacing="0">
                           <thead>
                            <tr>
                                <th class="text-center">User ID</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Role</th>
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
  </div> <!-- .container-fluid -->

  <!----------------------------- Modal Add User --------------------------------------->
  <div class="modal fade" id="user_add_modal" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Add New User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&Chi;</span>
					</button>
            </div>
            <div class="modal-body">
               <!-- Add form here -->
                  <form class="form-horizontal" method="post" action="" id="add_user_form">
                     <div class="card-body">
                        <div class="form-group row">
                           <i><h6>*Please input the user detail and role</h6></i>
                        </div>
                        <div id="roleInputWrapper">
                           <div class="form-group row">
                              <div class="col-sm-4">
                                 <label class="col-form-label">NIK (Employee Number)</label>
                              </div>
                              <div class="col-sm-3">
                                 <input type="number" class="form-control" name="user_nik_add" placeholder="Ex: 22030001" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-4">
                                 <label class="col-form-label">Employee Name</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="user_name_add" placeholder="Ex: Hartono" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-4">
                                 <label class="col-form-label">Employee Email</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="email" class="form-control" name="user_email_add" placeholder="Ex: hartono@mbgfiber.com" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-4">
                                 <label class="col-form-label">Password</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="user_password_add" value="fusion123" readonly>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-4">
                                 <label class="col-form-label">Role</label>
                              </div>
                              <div class="col-sm-5">
                                 <select name="user_role_add" id="user_role_add" class="form-control">
                                 <option></option>
                                 <?php foreach ($roles as $role) :?>
                                    <option value="<?= $role->role_id?>"><?= $role->role_name ?></option>
                                 <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right" id="btn_user_add">Add User</button>
                     </div>
                </form>
            </div>
         </div>
      </div>
   </div>
  <!----------------------------- <END> Modal Add User <END> ----------------------------->

   <!----------------------------- Modal Edit User --------------------------------------->
   <div class="modal fade" id="user_edit_modal" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Edit User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&Chi;</span>
					</button>
            </div>
            <div class="modal-body">
               <!-- Add form here -->
                  <form class="form-horizontal" method="post" action="" id="edit_user_form">
                     <div class="card-body">
                        <div class="form-group row">
                           <i><h6>*Please input the user detail and role</h6></i>
                        </div>
                        <div id="roleInputWrapper">
                           <div class="form-group row">
                              <div class="col-sm-4">
                                 <label class="col-form-label">NIK (Employee Number)</label>
                              </div>
                              <div class="col-sm-3">
                                 <input type="number" class="form-control" name="user_nik_edit" placeholder="Ex: 22030001" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-4">
                                 <label class="col-form-label">Employee Name</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="user_name_edit" placeholder="Ex: Hartono" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-4">
                                 <label class="col-form-label">Employee Email</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="email" class="form-control" name="user_email_edit" placeholder="Ex: hartono@mbgfiber.com" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-4">
                                 <label class="col-form-label">Password</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="user_password_edit" placeholder="fusion123" disabled>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-4">
                                 <label class="col-form-label">Role</label>
                              </div>
                              <div class="col-sm-5">
                                 <select name="user_role_add" id="user_role_add" class="form-control">
                                 <option></option>
                                 <?php foreach ($roles as $role) :?>
                                    <option value="<?= $role->role_id?>"><?= $role->role_name ?></option>
                                 <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right" id="btn_user_add">Add User</button>
                     </div>
                </form>
            </div>
         </div>
      </div>
   </div>
  <!----------------------------- <END> Modal Edit User <END> ----------------------------->
	

</div>
<script type="text/javascript">
    $(document).ready(function(){

      show_list_user();

      $('#user_role_add').select2({
        dropdownParent : $("#user_add_modal .modal-content"),
        theme: 'bootstrap4',
        placeholder: "--Select Role--",
      });

      /* ======================= Show List User Data ========================= */
      function show_list_user(){
         $.ajax({
            url : '<?= base_url('admin_area/usermanagement/list_user')?>',
            type : 'POST',
            dataType : 'json',
            success: function(response){
               console.log(response);
               if ($.fn.DataTable.isDataTable('#list_user_table')) {
                     $('#list_user_table').DataTable().clear().destroy();
               }

               $('#list_user_table').DataTable({
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
                     {data: 'user_id'},
                     {data: 'nik'},
                     {data: 'name'},
                     {data: 'email'},
                     {data: 'role_name'},
                     {data: 'user_id', render: function(data, type, row){
                        return '<button class="btn btn-info btn-sm btn_edit" data-id="' + data + '"><i class="fas fa-pencil-alt"></i> Edit</button> ' + 
                        '<button class="btn btn-danger btn-sm btn_delete mx-1" data-id="' + data + '"><i class="fas fa-trash-can"></i> Delete</button>' + 
                        '<button class="btn btn-warning btn-sm btn_reset_password" data-id="' + data + '"><i class="fas fa-key"></i> Reset Password</button>';
                     }}
                  ]
               });
            }
         });
      }
      /* ======================= <END>Show List User Data<END> ========================= */

      // Ajax for submit new user
      $('#btn_user_add').on('click', function(e){
         e.preventDefault();
         let form_data = new FormData($('#add_user_form')[0]);

         $.ajax({
            url : "<?= base_url('admin_area/usermanagement/add_new_user')?>",
            type : "POST",
            dataType : 'json',
            data : form_data,
            contentType : false,
            cache : false,
            processData : false,
            success : function(response){
               console.log('RESPONSE:', response);
               if(response.success){
                  $('#add_user_form')[0].reset();
                  $('#user_add_modal').modal('hide');
                  Swal.fire("User added succesfully",'','success');
                  setTimeout(function(){
                     location.reload();
                  }, 1300);
               } else {
                  Swal.fire("Adding User Failed",'','error');
               }
            }
         });
      });
      // <END> Ajax for Add user

      // Ajax for reset user password
    });
</script>