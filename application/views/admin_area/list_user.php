<div class="container-fluid">
	
	<!-- Select period -->
   <div class="row">
      <div class="col">
         <h3 class="mt-1">User Management</h3>
         <!-- <p class="lead">Ini adalah main dashboard MES Cable.</p> -->
      </div>
   </div>
   
   <div>
      <div class="col">
			<div class="card">
			   <div class="card-header mt-2">
               <h2 class="card-title">List User</h2>
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
  </div>
	<!-- End Select Period -->


</div>
<script type="text/javascript">
    $(document).ready(function(){

      show_list_user();

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

    });
</script>