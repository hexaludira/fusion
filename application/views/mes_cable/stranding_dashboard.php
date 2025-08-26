<div class="container-fluid">
	
	<!-- Select period -->
   <div class="row">
      <div class="col">
         <h3 class="mt-1">Welcome <?= $this->session->userdata('name') ?>, to Stranding Dashboard!</h3>
         <!-- <p class="lead">Ini adalah main dashboard MES Cable.</p> -->
      </div>
   </div>
   
   <div>
    <div class="col">
			<div class="card">
				<div class="card-header mt-2">
               <form class="form-horizontal" method="post" action="" id="date_range_form">
                  <div class="form-group row">
                     <label class="col-md-auto col-form-label">Date Range</label>
                     <div class="col-md-2">
                        <div class="input-group date" data-target-input="nearest">
                           <input type="text" class="form-control datetimepicker-input" data-target="#stranding_date_start" id="stranding_date_start" name="stranding_date_start">
                           <div class="input-group-append" data-target="#stranding_date_start" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-auto d-flex justify-content-center">
                        <span class="h2 m-0">-</span>
                     </div>
                     <div class="col-md-2">
                        <div class="input-group date" data-target-input="nearest">
                           <input type="text" class="form-control datetimepicker-input" data-target="#stranding_date_end" id="stranding_date_end" name="stranding_date_end">
                           <div class="input-group-append" data-target="#stranding_date_end" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" id="btn_show_data_stranding">Show Data</button>
                     </div>
                  </div>
               </form>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3 mx-3">
							<div class="small-box bg-success">
								<div class="inner">
									<h3>Cable KM</h3>
						         <h5>Plan : <b><span id="plan_ckm">-</span> Km</b></h5>
									<h5>Actual : <b><span id="actual_ckm">-</span> Km</b></h5>
									<h5>Percentage : <b><span id="percent_ckm"> %</span></b></h5>
								</div>
                        <div class="icon">
                           <i class="fas fa-xmarks-lines"></i>
                        </div>
							</div>
						</div>
					</div>
               <!-- Data table for stranding -->
                <div class="row">
                </div>
                <div class="row">
                  <div class="col-md-12">
                     <div class="table-responsive">
                        <table id="stranding_detail_table" class="table table-bordered table-striped" cellspacing="0">
                           <thead>
                            <tr>
                                <!-- <th rowspan="2">No</th> -->
                                <th class="text-center">Material No.</th>
                                <th class="text-center">Material Name</th>
                                <th class="text-center">Production Length (Km)</th>
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
      //datepicker init
      $('#stranding_date_start, #stranding_date_end').datetimepicker({
    	format : 'YYYY-MM-DD'
      });

      // Stranding detail datatables
      var table = $('#stranding_detail_table').DataTable({
         dom : 'Bfrtip',
         processing: true,
         serverSide: false,
         "paging": true,
         "lengthChange": false,
         "searching": true,
         "ordering": true,
         "info": true,
         "autoWidth": false,
         "responsive": true,
         buttons: ["copy", "csv", "excel", "pdf", "colvis"],
         ajax: {
            url: "<?= base_url('mes_cable/mc_stranding_dashboard/load_stranding_table')?>",
            type: "POST",
            data: function(d){
               d.start_date = $('#stranding_date_start').val();
               d.end_date = $('#stranding_date_end').val();
            },
            "dataSrc" : "data"
         },
         // "columnDefs" : [
         //    {
         //       "targets": [1],
         //       "visible": false,
         //       "searchable": false
         //    }
         // ],
         "columns": [
            {"data" : "matnr"},
            {"data" : "name"},
            {"data" : "production_length", "render" : renderDivideAndFormat},
         ]
      });

      // Function to format the data output
      function renderDivideAndFormat(value) {
         if (!value || isNaN(value)) return "0";
         return (value / 1000).toLocaleString('en-US', { minimumFractionDigits: 1 }) + " Km";
      }

      //Show stranding data button
      $('#btn_show_data_stranding').on('click', function(e){
         e.preventDefault();
         let startDate = $('#stranding_date_start').val();
         let endDate = $('#stranding_date_end').val();

         // Reload DataTable
         $('#stranding_detail_table').DataTable().ajax.reload();

         // Get data for Cable KM card
         $.ajax({
            url: '<?= base_url('mes_cable/mc_stranding_dashboard/get_stranding_summary')?>',
            type: 'POST',
            dataType: 'json',
            data: {
               start_date : startDate,
               end_date : endDate
            },
            success: function(response) {
               let plan = response.plan;
               let actual = response.actual_total;
               let percentage = 0;
               if(plan != null){
                  percentage = ((actual / plan) * 100).toFixed(1);
               } else {
                  Swal.fire({
                     title: "Warning",
                     text: 'Plan data is empty',
                     icon: "warning"
                  });
               }
               $('#plan_ckm').text(plan);
               $('#actual_ckm').text(actual);
               $('#percent_ckm').text(percentage + '%');
            },
            error: function(){
               Swal.fire({
                  title: "Oopss",
                  text: "Failed to get Stranding data",
                  icon: "error"
               }); 
            }
         });
      });
    });
</script>