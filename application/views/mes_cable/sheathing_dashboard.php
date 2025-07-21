<div class="container-fluid">
	
	<!-- Select period -->
   <div class="row">
      <div class="col">
         <h3 class="mt-1">Welcome <?= $this->session->userdata('name') ?>, to Sheathing Dashboard!</h3>
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
                           <input type="text" class="form-control datetimepicker-input" data-target="#sheathing_date_start" id="sheathing_date_start" name="sheathing_date_start">
                           <div class="input-group-append" data-target="#sheathing_date_start" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-auto d-flex justify-content-center">
                        <span class="h2 m-0">-</span>
                     </div>
                     <div class="col-md-2">
                        <div class="input-group date" data-target-input="nearest">
                           <input type="text" class="form-control datetimepicker-input" data-target="#sheathing_date_end" id="sheathing_date_end" name="sheathing_date_end">
                           <div class="input-group-append" data-target="#sheathing_date_end" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" id="btn_show_data_sheathing">Show Data</button>
                     </div>
                  </div>
               </form>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-5 mx-3">
							<div class="small-box bg-danger">
								<div class="row">
                                    <div class="col-lg-5 m-2">
                                        <div class="inner">
                                            <h3>Cable KM</h3>
                                            <h5>Plan : <b><span id="plan_ckm">-</span> Km</b></h5>
                                            <h5>Actual : <b><span id="actual_ckm">-</span> Km</b></h5>
                                            <h5>Percentage : <b><span id="percent_ckm"> %</span></b></h5>
								        </div>
                                    </div>
                                    <div class="col-lg-5 mx-4 my-2">
                                        <div class="inner">
                                            <h3>Fiber KM</h3>
                                            <h5>Plan : <b><span id="plan_fkm">-</span> Km</b></h5>
                                            <h5>Actual : <b><span id="actual_fkm">-</span> Km</b></h5>
                                            <h5>Percentage : <b><span id="percent_fkm"> %</span></b></h5>
								        </div>
                                    </div>
                                </div>        
                        <div class="icon">
                           <i class="fas fa-rug"></i>
                        </div>
							</div>
						</div>
					</div>
               <!-- Data table for sheathing -->
                <div class="row">
                  <div class="col-md-12">
                     <div class="table-responsive">
                        <table id="sheathing_detail_table" class="table table-bordered table-striped" cellspacing="0">
                           <thead>
                            <tr>
                                <!-- <th rowspan="2">No</th> -->
                                <th rowspan="2" class="text-center">No</th>
                                <th rowspan="2" class="text-center">Sales Order No</th>
                                <th rowspan="2" class="text-center">Customer Name</th>
                                <th rowspan="2" class="text-center">Material Name</th>
                                <th rowspan="2" class="text-center">Unqualified Qty</th>
                                <th rowspan="2" class="text-center">Uninspected Qty</th>
                                <th colspan="2" class="text-center">Prod. Length</th>
                            </tr>
                            <tr>
                                <th>CKM</th>
                                <th>FKM</th>
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
      $('#sheathing_date_start, #sheathing_date_end').datetimepicker({
    	format : 'YYYY-MM-DD'
      });

      // Sheathing detail datatables
      var table = $('#sheathing_detail_table').DataTable({
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
            url: "<?= base_url('mes_cable/mc_sheathing_dashboard/load_sheathing_table')?>",
            type: "POST",
            data: function(d){
               d.start_date = $('#sheathing_date_start').val();
               d.end_date = $('#sheathing_date_end').val();
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
            {data: null, render: function(data, type, row, meta){
                return meta.row + 1;
            }},
            {"data" : "sales_order_no"},
            {"data" : "customer_name"},
            {"data" : "material_name"},
            {"data" : "unqualified", render : renderDivideAndFormat},
            {"data" : "uninspected", render : renderDivideAndFormat},
            {"data" : "ckm", render : renderDivideAndFormat},
            {"data" : "fkm", render : renderDivideAndFormat}
         ],
         rowCallback: function(row, data, index) {
            let unqualified = parseFloat(data.unqualified);
            let uninspected = parseFloat(data.uninspected);
            if (unqualified > 0) {
                  $('td:eq(4)', row).css('background-color', 'red');
            } else if (uninspected > 0) {
                  $('td:eq(5)', row).css('background-color', 'yellow');
            }
         }
      });

      // Function to format the data output
      function renderDivideAndFormat(value) {
         if (!value || isNaN(value)) return "0";
         return (value / 1000).toLocaleString('en-US', { minimumFractionDigits: 0 }) + " Km";
      }

      //Show sheathing data button function
      $('#btn_show_data_sheathing').on('click', function(e){
         e.preventDefault();
         let startDate = $('#sheathing_date_start').val();
         let endDate = $('#sheathing_date_end').val();

         // Reload DataTable
         $('#sheathing_detail_table').DataTable().ajax.reload();

         // Get data for Cable KM and Fiber KM card
         $.ajax({
            url: '<?= base_url('mes_cable/mc_sheathing_dashboard/get_sheathing_summary')?>',
            type: 'POST',
            dataType: 'json',
            data: {
               start_date : startDate,
               end_date : endDate
            },
            success: function(response) {
               $('#plan_ckm').text(response.plan_ckm);
               $('#actual_ckm').text(response.actual_total_ckm);
               $('#percent_ckm').text(response.percentage_ckm + '%');
               $('#plan_fkm').text(response.plan_fkm);
               $('#actual_fkm').text(response.actual_total_fkm);
               $('#percent_fkm').text(response.percentage_fkm + '%');
            },
            error: function(){
               Swal.fire({
                  title: "Oopss",
                  text: "Failed to get Sheathing data",
                  icon: "error"
               }); 
            }
         });
      });
    });
</script>