<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form class="form-horizontal" method="post" id="change_password_form">
                     <div class="form-group row align-items-center">
                        <div class="col-sm-2">
                           <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $this->session->userdata('user_id')?>">
                           <label for="new_password" class="col-form-label">New Password</label>
                        </div>
                        <div class="col-sm-4">
                           <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                     </div>
                     <div class="form-group row align-items-center">
                        <div class="col-sm-2">
                           <label for="retype_password" class="col-form-label">Re-type Password</label>
                        </div>
                        <div class="col-sm-4">
                           <input type="password" class="form-control" id="retype_password" name="retype_password" required>
                           <h6 id="password_message"></h6>
                        </div>
                     </div>

                     <button type="submit" class="btn btn-primary float-right">Change Password</button>
                  </form>
                </div>
                <!-- card-body -->   
            </div>
            <!-- card -->
        </div>
    </div>
</div>

<script type="text/javascript">
   $(document).ready(function(){

      $('#new_password, #retype_password').on('keyup', function(){
         let newPass = $('#new_password').val();
         let rePass = $('#retype_password').val();

         if(newPass === "" && rePass === ""){
            $('#password_message').text('').css('color', '');
            return;
         }

         if(newPass === rePass){
            $('#password_message').text('Password match').css('color', 'green');
         } else {
            $('#password_message').text('Password not match').css('color','red');
         }
      });

      $('#change_password_form').on('submit', function(e){
         e.preventDefault();
         let newPass = $('#new_password').val();
         let rePass  = $('#retype_password').val();
         // let form_data = new FormData($('#change_password_form')[0]);

         if(newPass !== rePass){
            e.preventDefault();
            Swal.fire('Password dan Re-type Password is not match','','warning');
            return;
         } else {
            $.ajax({
               url : '<?= base_url('all_system/save_new_password')?>',
               type : 'POST',
               dataType : 'json',
               data : {new_password : newPass},
               contentType : false,
               cache : false,
               processData: false,
               success : function(response){
                  console.log('RESPONSE:', response);
                  if(response.success){
                     $('#change_password_form')[0].reset();
                     Swal.fire("Password changed succesfully",'','success');
                  } else {
                     Swal.fire("Password failed to change",'','error');
                  }
               }
            });
         }
      });
   })
</script>