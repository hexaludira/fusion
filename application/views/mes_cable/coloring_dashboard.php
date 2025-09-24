<div class="container-fluid">
	
	<!-- Select period -->
   <div class="row">
      <div class="col">
         <h3 class="mt-1">Welcome <?= $this->session->userdata('name') ?>, to Coloring Dashboard!</h3>
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
                     <div class="col-md-auto">
                        <div class="input-group date" data-target-input="nearest">
                           <input type="text" class="form-control datetimepicker-input" data-target="#coloring_date_start" id="coloring_date_start" name="coloring_date_start">
                           <div class="input-group-append" data-target="#coloring_date_start" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-auto d-flex justify-content-center">
                        <span class="h2 m-0">-</span>
                     </div>
                     <div class="col-md-auto">
                        <div class="input-group date" data-target-input="nearest">
                           <input type="text" class="form-control datetimepicker-input" data-target="#coloring_date_end" id="coloring_date_end" name="coloring_date_end">
                           <div class="input-group-append" data-target="#coloring_date_end" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" id="btn_show_data_coloring">Show Data</button>
                     </div>
                  </div>
               </form>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3 mx-3">
							<div class="small-box bg-info">
								<div class="inner">
									<h3>Cable KM</h3>
						         <h5>Plan : <b><span id="plan_ckm">-</span> Km</b></h5>
									<h5>Actual : <b><span id="actual_ckm">-</span> Km</b></h5>
									<h5>Percentage : <b><span id="percent_ckm"> %</span></b></h5>
								</div>
                        <div class="icon">
                           <i class="fas fa-road-barrier"></i>
                        </div>
							</div>
						</div>
					</div>
               <!-- Data table for coloring -->
                <div class="row">
                  <div class="col-md-12">
                     <div class="table-responsive">
                        <table id="coloring_detail_table" class="table table-bordered table-striped" cellspacing="0">
                           <thead>
                              <tr>
                                 <th rowspan="2" class="text-center">Color</th>
                                 <th colspan="5" class="text-center">Type</th>
                              </tr>
                              <tr>
                                 <!-- <th>No</th> -->
                                 <!-- <th>Color</th> -->
                                 <th>G652D</th>
                                 <th>G655</th>
                                 <th>G657A1</th>
                                 <th>G657A1-200</th>
                                 <th>G657A2</th>
                              </tr>
                           </thead>
                           <tbody>

                           </tbody>
                        </table>
                     </div>
                  </div>
                </div>

				</div>
			</div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
      //datepicker init
      $('#coloring_date_start, #coloring_date_end').datetimepicker({
    	   format : 'YYYY-MM-DD HH:mm',
         icons: {time: 'far fa-clock'}
         
      });

      //Datatables
      // $('#coloring_detail_table').DataTable({
      //       "paging": true,
      //       "lengthChange": false,
      //       "searching": true,
      //       "ordering": true,
      //       "info": true,
      //       "autoWidth": false,
      //       "responsive": true,
      //       "buttons": ["copy", "csv", "excel", "pdf", "colvis"]
      //    }).buttons().container().appendTo('#coloring_detail_table_wrapper .col-md-6:eq(0)');
      

      // Server Side DataTables
      var table = $('#coloring_detail_table').DataTable({
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
            url: "<?= base_url('mes_cable/mc_coloring_dashboard/load_coloring_table')?>",
            type: "POST",
            data: function(d){
               d.start_date = $('#coloring_date_start').val();
               d.end_date = $('#coloring_date_end').val();
            },
            "dataSrc" : "data"
         },
         "columns": [
            // {"data" : "No"},
            {"data" : "color"},
            {"data" : "G652D", "render" : renderDivideAndFormat},
            {"data" : "G655", "render" : renderDivideAndFormat},
            {"data" : "G657A1", "render" : renderDivideAndFormat},
            {"data" : "G657A1_200", "render" : renderDivideAndFormat},
            {"data" : "G657A2", "render" : renderDivideAndFormat}
         ]
      });

      // Function to format the data output
      function renderDivideAndFormat(value) {
         if (!value || isNaN(value)) return "0";
         return (value / 1000).toLocaleString('en-US', { minimumFractionDigits: 1 }) + " Km";
      }

      //Show coloring data
      $('#btn_show_data_coloring').on('click', function(e){
         e.preventDefault();
         let startDate = $('#coloring_date_start').val();
         let endDate = $('#coloring_date_end').val();

         // Reload DataTable
         $('#coloring_detail_table').DataTable().ajax.reload();

         // Get data for Cable KM card
         $.ajax({
            url: '<?= base_url('mes_cable/mc_coloring_dashboard/get_coloring_km_summary')?>',
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
                  $('#plan_ckm').text(plan);
                  percentage = ((actual / plan) * 100).toFixed(1);
               } else {
                  $('#plan_ckm').text("-");
                  Swal.fire({
                     title: "Warning",
                     text: 'Plan data is empty',
                     icon: "warning",
                  });
                  
               }
               // $('#plan_ckm').text(plan);
               $('#actual_ckm').text(actual);
               $('#percent_ckm').text(percentage + ' %');
            },
            error: function(response){
               Swal.fire({
                  title: "Oopss",
                  text: "Failed to get Coloring data",
                  icon: "error"
               }); 
            }
         });
      });
    });
</script>