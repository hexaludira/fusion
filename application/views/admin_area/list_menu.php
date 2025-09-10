<div class="container-fluid">
   <div class="row">
      <div class="col">
         <h3 class="mt-1">Menu Management</h3>
         <!-- <p class="lead">Ini adalah main dashboard MES Cable.</p> -->
      </div>
   </div>
   
   <div>
      <div class="col">
			<div class="card">
			   <div class="card-header mt-2">
               <h2 class="card-title">List Menu</h2>
               <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#menu_add_modal"><i class="fas fa-plus"></i>Add Menu</button>
				</div>
				<div class="card-body">
               <!-- Data table for List Role -->
                <div class="row">
                  <div class="col-md-12">
                     <div class="table-responsive">
                        <table id="list_menu_table" class="table table-bordered table-striped" cellspacing="0">
                           <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">System Name</th>
                                <th class="text-center">Menu Name</th>
                                <th class="text-center">URL</th>
                                <th class="text-center">Icon</th>
                                <th class="text-center">Sort</th>
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

<!----------------------------- Modal Add Menu --------------------------------------->
<div class="modal fade" id="menu_add_modal" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Add New Menu</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&Chi;</span>
					</button>
            </div>
            <div class="modal-body">
               <!-- Add form here -->
                  <form class="form-horizontal" method="post" action="" id="add_menu_form">
                     <div class="card-body">
                        <div class="form-group row">
                           <i><h6>*Please input new menu</h6></i>
                        </div>
                        <div id="roleInputWrapper">
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">Choose System</label>
                              </div>
                              <div class="col-sm-5">
                                 <select name="menu_system_add" id="menu_system_add" class="form-control">
                                    <option></option>
                                    <?php foreach ($systems as $system) :?>
                                       <option value="<?= $system->system_id?>"><?= $system->system_name ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">Menu Name</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="menu_name_add" placeholder="Ex: Main Dashboard" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">Menu URL</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="menu_url_add" placeholder="Ex: mes_cable/mc_main_dashboard" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">Menu Icon</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="menu_icon_add" placeholder="Ex: fa-gauge-high" required>
                                 <small>Please choose icon from <a href="https://fontawesome.com/search?ic=free&o=r" target="_blank">https://fontawesome.com</a> and copy the icon name</small>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">Menu Sort</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="number" class="form-control" name="menu_sort_add" placeholder="Ex: 1" required>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right" id="btn_menu_add">Add Menu</button>
                     </div>
                </form>
            </div>
         </div>
      </div>
   </div>
<!----------------------------- <END> Modal Add Menu <END> ---------------------------->

<!----------------------------- Modal Edit Menu --------------------------------------->
<div class="modal fade" id="menu_edit_modal" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Edit Menu</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&Chi;</span>
					</button>
            </div>
            <div class="modal-body">
               <!-- Add form here -->
                  <form class="form-horizontal" method="post" action="" id="edit_menu_form">
                     <div class="card-body">
                        <div class="form-group row">
                           <i><h6>*Please edit menu below</h6></i>
                        </div>
                        <div id="roleInputWrapper">
                           <div class="form-group row">
                              <input type="hidden" class="form-control" id="menu_id_edit" name="menu_id_edit">
                              <div class="col-sm-3">
                                 <label class="col-form-label">Choose System</label>
                              </div>
                              <div class="col-sm-5">
                                 <select name="menu_system_edit" id="menu_system_edit" class="form-control">
                                    <option></option>
                                    <?php foreach ($systems as $system) :?>
                                       <option value="<?= $system->system_id?>"><?= $system->system_name ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">Menu Name</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="menu_name_edit" id="menu_name_edit" placeholder="Ex: Main Dashboard" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">Menu URL</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="menu_url_edit" id="menu_url_edit" placeholder="Ex: mes_cable/mc_main_dashboard" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">Menu Icon</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="menu_icon_edit" id="menu_icon_edit" placeholder="Ex: fa-gauge-high" required>
                                 <small>Please choose icon from <a href="https://fontawesome.com/search?ic=free&o=r" target="_blank">https://fontawesome.com</a> and copy the icon name</small>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-3">
                                 <label class="col-form-label">Menu Sort</label>
                              </div>
                              <div class="col-sm-5">
                                 <input type="number" class="form-control" name="menu_sort_edit" id="menu_sort_edit" placeholder="Ex: 1" required>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right" id="btn_menu_update">Update Menu</button>
                     </div>
                </form>
            </div>
         </div>
      </div>
   </div>
<!----------------------------- <END> Modal Edit Menu <END> ---------------------------->

<!--------------------------- Modal Delete Menu -------------------------------------->
<div class="modal fade" id="menu_delete_modal" tabindex="-1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Delete Menu</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
         <h4>Are you sure you want to delete this menu?</h4><br/>
         <h5 style="color: red;">If you delete this menu, the content of the menu cannot be shown. You've been warned.</h5>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="btn_confirm_delete">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!--------------------------- <END> Modal Delete Menu <END> ----------------------------->

<script type="text/javascript">
    $(document).ready(function(){

      show_list_menu();

      $('#menu_system_add').select2({
         dropdownParent : $("#menu_add_modal .modal-content"),
         theme: 'bootstrap4',
         placeholder: "--Select System--",
      });

      $('#menu_system_edit').select2({
         dropdownParent : $("#menu_edit_modal .modal-content"),
         theme: 'bootstrap4',
         placeholder: "--Select System--",
      });

      /* ======================= Show List Menu Data ========================= */
      function show_list_menu(){
         $.ajax({
            url : '<?= base_url('admin_area/menumanagement/list_menu')?>',
            type : 'POST',
            dataType : 'json',
            success: function(response){
               console.log(response);
               if ($.fn.DataTable.isDataTable('#list_menu_table')) {
                     $('#list_menu_table').DataTable().clear().destroy();
               }

               $('#list_menu_table').DataTable({
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
                     {data: 'system_name', visible : false},
                     {data: 'menu_name'},
                     {data: 'url'},
                     {data: 'icon', render: function(data, type, row){
                        if(data){
                           return '<i class="nav-icon fas ' + data + '"></i>'
                        } else {
                           return '<?= "no_icon"?>';
                        }
                     }},
                     {data: 'sort'},
                     {data: 'id', render: function(data, type, row){
                        return '<button class="btn btn-info btn-sm btn_edit" data-id="' + data + '"><i class="fas fa-pencil-alt"></i> Edit</button> ' + 
                        '<button class="btn btn-danger btn-sm btn_delete m-1" data-id="' + data + '"><i class="fas fa-trash-can"></i> Delete</button>'
                     }}
                  ],
                  rowGroup: {
                     dataSrc : 'system_name',
                     startRender : function (rows, group) {
                        return `
                           <div class="d-flex justify-content-between align-items-center px-3 py-2" style="background:#007bff; color:white; font-weight:bold; border-radius:4px;">
                     
                              <div>
                                    <i class="fa fa-layer-group"></i> ${group}
                              </div>
                           </div>
                        `
                     }
                  },
                  order : [[1, 'asc'], [5, 'asc']] // urut berdasarkan system_name lalu sort
               });
            }
         });
      }

      /* ======================= <END>Show List System Data<END> ========================= */

      // Submit new Menu
      $('#btn_menu_add').on('click', function(e){
         e.preventDefault();
         
         let formData = new FormData($('#add_menu_form')[0]);
         
         $.ajax({
            url : '<?= base_url('admin_area/menumanagement/add_new_menu')?>',
            type : 'POST',
            dataType : 'json',
            data : formData,
            processData : false,
            contentType : false,
            success : function(response) {
               if(response.success){
                  $('#add_menu_form')[0].reset();
                  $('#menu_add_modal').modal('hide');
                  Swal.fire("Menu added succesfully",'','success');
                  setTimeout(function(){
                     location.reload();
                  },1300);
               } else {
                  Swal.fire("Adding Menu Failed",'','error');
               }
            }
         });
      });
      // <END> Submit new Menu <END>

      // Show Edit Menu Modal
      $('#list_menu_table').on('click','.btn_edit', function(e){
         e.preventDefault();
         let menu_id = $(this).attr('data-id');
         $.ajax({
            url : '<?= base_url('admin_area/menumanagement/edit_menu')?>',
            type : 'POST',
            data : {menu_id_edit : menu_id},
            dataType : 'json',
            success : function(response){
               console.log(response);
               $('#menu_id_edit').val(response[0].id);
               $('#menu_system_edit').val(response[0].system_id).trigger('change');
               $('#menu_name_edit').val(response[0].menu_name);
               $('#menu_url_edit').val(response[0].url);
               $('#menu_icon_edit').val(response[0].icon);
               $('#menu_sort_edit').val(response[0].sort);
               $('#menu_edit_modal').modal('show');
            }
         });
      });
      // <END> Ajax for Show Edit Role <END>

      // Ajax for Update Menu
      $('#btn_menu_update').on('click',(function(e){
         e.preventDefault();
         var form_data = new FormData($('#edit_menu_form')[0]);

         $.ajax({
            url : '<?= base_url('admin_area/menumanagement/update_menu')?>',
            type : 'POST',
            dataType : 'json',
            data : form_data,
            contentType : false,
            cache : false,
            processData : false,
            success : function(response){
               if(response.success){
                  console.log(response);
                  $('#edit_menu_form')[0].reset();
                  $('#menu_edit_modal').modal('hide');
                  Swal.fire("Menu updated succesfully",'','success');
                  setTimeout(function(){
                     location.reload();
                  }, 1300);
               } else {
                  console.log(response);
                  Swal.fire("Update Menu failed",'','error');
               }
            }
         });
      }));
      // <END> Ajax for Update Menu <END>

      // Delete Menu
      $('#list_menu_table').on('click','.btn_delete', function(){
         let menu_id = $(this).attr('data-id');
         $('#menu_delete_modal').modal('show');
         $('#btn_confirm_delete').on('click', function(){
            $.ajax({
               url : '<?= base_url('admin_area/menumanagement/delete_menu')?>',
               type  : 'POST',
               dataType : 'json',
               data  : {menu_id_delete : menu_id},
               success : function(response){
                  $('#menu_delete_modal').modal('hide');
                  if(response.success){
                     Swal.fire("Menu has been deleted",'','success');
                  } else {
                     Swal.fire("Menu failed to delete",'','error');
                  }
                  setTimeout(function(){
                     location.reload();
                  },1300);
               }
            });
         });
      });
      // <END> Ajax for Delete Menu <END>

    });
</script>