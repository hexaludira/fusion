<div class="container-fluid">
	
	<!-- Select period -->
   <div class="row">
      <div class="col">
         <h3 class="mt-1">Welcome <?= $this->session->userdata('name') ?>, to Sales Order Tracking!</h3>
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
                           <input type="text" class="form-control datetimepicker-input" data-target="#sotrack_date_start" id="sotrack_date_start" name="sotrack_date_start">
                           <div class="input-group-append" data-target="#sotrack_date_start" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-auto d-flex justify-content-center">
                        <span class="h2 m-0">-</span>
                     </div>
                     <div class="col-md-2">
                        <div class="input-group date" data-target-input="nearest">
                           <input type="text" class="form-control datetimepicker-input" data-target="#sotrack_date_end" id="sotrack_date_end" name="sotrack_date_end">
                           <div class="input-group-append" data-target="#sotrack_date_end" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" id="btn_show_data_sotrack">Show Data</button>
                     </div>
                  </div>
               </form>
				</div>
				<div class="card-body">
               <!-- Data table for salesorder tracking -->
                <div class="row">
                  <div class="col-md-12">
                     <div class="table-responsive">
                        <table id="sotrack_detail_table" class="table table-bordered table-striped" cellspacing="0">
                           <thead>
                            <tr>
                                <!-- <th rowspan="2">No</th> -->
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Customer Name</th>
                                <th class="text-center">Sales Order No</th>
                                <th class="text-center">SO Item</th>
                                <th class="text-center">Material Name</th>
                                <th class="text-center">Qty Order</th>
                                <th class="text-center">Coloring</th>
                                <th class="text-center">Tubing</th>
                                <th class="text-center">Stranding</th>
                                <th class="text-center">Sheathing</th>
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
      $('#sotrack_date_start, #sotrack_date_end').datetimepicker({
    	format : 'YYYY-MM-DD'
      });

      // SO track detail datatables
      var table = $('#sotrack_detail_table').DataTable({
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
            url: "<?= base_url('mes_cable/mc_salesorder_tracking/load_sotracking_table')?>",
            type: "POST",
            data: function(d){
               d.start_date = $('#sotrack_date_start').val();
               d.end_date = $('#sotrack_date_end').val();
            },
            error: function(){
               Swal.fire({
                  title: "Oopss",
                  text: "Failed to get Sales Order Tracking data",
                  icon: "error"
               }); 
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
            {"data" : "created_date"},
            {"data" : "customer_name"},
            {"data" : "sales_order_no"},
            {"data" : "sales_order_item_no"},
            {"data" : "material_name"},
            {"data" : "qty_order"},
            {"data" : "coloring", "render" : renderDivideAndFormat},
            {"data" : "tubing", "render" : renderDivideAndFormat},
            {"data" : "stranding", "render" : renderDivideAndFormat},
            {"data" : "sheathing", "render" : renderDivideAndFormat}
         ]
      });

      // Function to format the data output
      function renderDivideAndFormat(value) {
         if (!value || isNaN(value)) return "0";
         return (value / 1000).toLocaleString('en-US', { minimumFractionDigits: 1 });
      }

      //Show so tracking data button
      $('#btn_show_data_sotrack').on('click', function(e){
         e.preventDefault();
         let startDate = $('#sotrack_date_start').val();
         let endDate = $('#sotrack_date_end').val();

         // Reload DataTable
         $('#sotrack_detail_table').DataTable().ajax.reload();

         // Get data for Cable KM card
         // $.ajax({
         //    url: '<?= base_url('mes_cable/mc_tubing_dashboard/get_tubing_summary')?>',
         //    type: 'POST',
         //    dataType: 'json',
         //    data: {
         //       start_date : startDate,
         //       end_date : endDate
         //    },
         //    success: function(response) {
         //       $('#plan_ckm').text(response.plan);
         //       $('#actual_ckm').text(response.actual_total);
         //       $('#percent_ckm').text(response.percentage + '%');
         //    },
         //    error: function(){
         //       Swal.fire({
         //          title: "Oopss",
         //          text: "Failed to get Tubing data",
         //          icon: "error"
         //       }); 
         //    }
         // });
      });
    });
</script>