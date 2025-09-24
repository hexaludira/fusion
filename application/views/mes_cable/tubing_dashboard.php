<div class="container-fluid">
	
	<!-- Select period -->
   <div class="row">
      <div class="col">
         <h3 class="mt-1">Welcome <?= $this->session->userdata('name') ?>, to Tubing Dashboard!</h3>
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
                     <div class="col-md-3">
                        <div class="input-group date" data-target-input="nearest">
                           <input type="text" class="form-control datetimepicker-input" data-target="#tubing_date_start" id="tubing_date_start" name="tubing_date_start">
                           <div class="input-group-append" data-target="#tubing_date_start" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-auto d-flex justify-content-center">
                        <span class="h2 m-0">-</span>
                     </div>
                     <div class="col-md-3">
                        <div class="input-group date" data-target-input="nearest">
                           <input type="text" class="form-control datetimepicker-input" data-target="#tubing_date_end" id="tubing_date_end" name="tubing_date_end">
                           <div class="input-group-append" data-target="#tubing_date_end" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" id="btn_show_data_tubing">Show Data</button>
                     </div>
                  </div>
               </form>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3 mx-3">
							<div class="small-box bg-warning">
								<div class="inner">
									<h3>Cable KM</h3>
						         <h5>Plan : <b><span id="plan_ckm">-</span> Km</b></h5>
									<h5>Actual : <b><span id="actual_ckm">-</span> Km</b></h5>
									<h5>Percentage : <b><span id="percent_ckm"> %</span></b></h5>
								</div>
                        <div class="icon">
                           <i class="fas fa-ring"></i>
                        </div>
							</div>
						</div>
					</div>
               <!-- Data table for tubing -->
                <div class="row">
                  <form action="" class="form-horizontal" method="">
                     <div class="form-group row">
                        <label class="col-md-auto col-form-label">Select Core :</label>
                        <div class="col-md-3">
                           <select id="core_filter" class="form-control" style="width: 200px; display: inline-block; margin-left: 10px;">
                              <option value="">All Core</option>
                              <option value="6">Core 6</option>
                              <option value="12">Core 12</option>
                           </select>
                        </div>
                     </div>
                  </form>
                  
                </div>
                <div class="row">
                  <div class="col-md-12">
                     <div class="table-responsive">
                        <table id="tubing_detail_table" class="table table-bordered table-striped" cellspacing="0">
                           <thead>
                            <tr>
                                <!-- <th rowspan="2">No</th> -->
                                <th rowspan="2" class="text-center">Color</th>
                                <th rowspan="2" class="text-center">Core</th>
                                <th colspan="6" class="text-center">Diameter</th>
                            </tr>
                            <tr>
                                <th>1.9</th>
                                <th>2</th>
                                <th>2.1</th>
                                <th>2.2</th>
                                <th>2.4</th>
                                <th>3.2</th>
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
      $('#tubing_date_start, #tubing_date_end').datetimepicker({
    	format : 'YYYY-MM-DD HH:mm',
       icons: {time: 'far fa-clock'}
      });

      // Tubing detail datatables
      var table = $('#tubing_detail_table').DataTable({
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
            url: "<?= base_url('mes_cable/mc_tubing_dashboard/load_tubing_table')?>",
            type: "POST",
            data: function(d){
               d.start_date = $('#tubing_date_start').val();
               d.end_date = $('#tubing_date_end').val();
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
            // {"data" : "No"},
            {"data" : "color"},
            {"data" : "core", visible : false},
            {"data" : "diam_1_9", "render" : renderDivideAndFormat},
            {"data" : "diam_2", "render" : renderDivideAndFormat},
            {"data" : "diam_2_1", "render" : renderDivideAndFormat},
            {"data" : "diam_2_2", "render" : renderDivideAndFormat},
            {"data" : "diam_2_4", "render" : renderDivideAndFormat},
            {"data" : "diam_3_2", "render" : renderDivideAndFormat}
         ]
      });

      // Function to filter based on Core
      $('#core_filter').on('change',function(){
            var selected = $(this).val();
            table.column(1).search(selected).draw();
         });

      // Function to format the data output
      function renderDivideAndFormat(value) {
         if (!value || isNaN(value)) return "0";
         return (value / 1000).toLocaleString('en-US', { minimumFractionDigits: 1 }) + " Km";
      }

      //Show tubing data button
      $('#btn_show_data_tubing').on('click', function(e){
         e.preventDefault();
         let startDate = $('#tubing_date_start').val();
         let endDate = $('#tubing_date_end').val();

         // Reload DataTable
         $('#tubing_detail_table').DataTable().ajax.reload();

         // Get data for Cable KM card
         $.ajax({
            url: '<?= base_url('mes_cable/mc_tubing_dashboard/get_tubing_summary')?>',
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
                     icon: "warning"
                  });
               }
               
               $('#actual_ckm').text(actual);
               $('#percent_ckm').text(percentage + ' %');
            },
            error: function(){
               Swal.fire({
                  title: "Oopss",
                  text: "Failed to get Tubing data",
                  icon: "error"
               }); 
            }
         });
      });
    });
</script>