<div class="container-fluid">
	
	<!-- Select period -->
  <div class="row">
    <!-- <div class="col">
      <h1 class="mt-3">Selamat datang, <?= $this->session->userdata('name') ?>!</h1>
      <p class="lead">Ini adalah main dashboard MES Cable.</p>
    </div> -->
    <div class="col">
			<div class="card">
				<div class="card-header p-2">
					<ul class="nav nav-pills">
						<li class="nav-item"><a class="nav-link active" href="#today_tab" data-toggle="tab">Today</a></li>
						<li class="nav-item"><a class="nav-link" href="#month_tab" data-toggle="tab">This Month</a></li>
						<li class="nav-item"><a class="nav-link" href="#year_tab" data-toggle="tab">This Year</a></li>
						</ul>
				</div>
				<div class="card-body">
					<div class="tab-content">
						<div class="active tab-pane" id="today_tab">
							<div class="row justify-content-center">
								<div class="col-lg-3 mx-3">
									<div class="small-box bg-info">
										<div class="inner">
											<h3>Cable KM</h3>
											<h5>Plan : <b><span class="plan_ckm">-</span> Km</b></h5>
											<h5>Actual : <b><span class="actual_ckm">-</span> Km</b></h5>
											<h5>Percentage : <b><span class="percent_ckm"> %</span></b></h5>
										</div>
									</div>
								</div>
								<div class="col-lg-3 mx-3">
									<div class="small-box bg-success">
										<div class="inner">
											<h3>Fiber KM</h3>
											<h5>Plan : <b><span class="plan_fkm">-</span> Km</b></h5>
											<h5>Actual : <b><span class="actual_fkm">-</span> Km</b></h5>
											<h5>Percentage : <b><span class="percent_fkm"> %</span></b></h5>
										</div>
									</div>
								</div>
							</div>
							<!-- Column Graph -->
							 <div class="row justify-content-center">
								<div class="col-md-5 mx-1">
									<div id="chart_ckm_today">

									</div>
								</div>
								<div class="col-md-5 mx-1">
									<div id="chart_fkm_today">

									</div>
								</div>
							 </div>
						</div>
						<div class="tab-pane" id="month_tab">
							<div class="loading-spinner" style="
								display: flex; text-align: center; 	padding: 20px;  display: flex;
								justify-content: center;
								align-items: center;
								height: 200px;
								flex-direction: column;">
								<i class="fa fa-spinner fa-spin fa-2x text-primary"></i>
								<p>Loading data. Please wait...</p>
							</div>
							<div class="dashboard-content" style="display: none;">
								<div class="row justify-content-center">
									<div class="col-lg-3 mx-3">
										<div class="small-box bg-info">
											<div class="inner">
												<h3>Cable KM</h3>
												<h5>Plan : <b><span class="plan_ckm">-</span> Km</b></h5>
												<h5>Actual : <b><span class="actual_ckm">-</span> Km</b></h5>
												<h5>Percentage : <b><span class="percent_ckm"> %</span></b></h5>
											</div>
										</div>
									</div>
									<div class="col-lg-3 mx-3">
										<div class="small-box bg-success">
											<div class="inner">
												<h3>Fiber KM</h3>
												<h5>Plan : <b><span class="plan_fkm">-</span> Km</b></h5>
												<h5>Actual : <b><span class="actual_fkm">-</span> Km</b></h5>
												<h5>Percentage : <b><span class="percent_fkm"> %</span></b></h5>
											</div>
										</div>
									</div>
								</div>
								<!-- Column Graph -->
								<div class="row justify-content-center">
									<div class="col-5 mx-1">
										<div id="chart_ckm_month">

										</div>
									</div>
									<div class="col-5 mx-1">
										<div id="chart_fkm_month">

										</div>
									</div>
								</div>
							</div> <!-- .dashboard-content -->	
						</div> <!-- This Month Tab End -->
						<div class="tab-pane" id="year_tab">
							<!-- <h4>This Year</h4> -->
							<div class="loading-spinner" style="
								display: flex; text-align: center; 	padding: 20px;  display: flex;
								justify-content: center;
								align-items: center;
								height: 200px;
								flex-direction: column;">
								<i class="fa fa-spinner fa-spin fa-2x text-primary"></i>
								<p>Loading data. Please wait...</p>
							</div>
							<div class="dashboard-content" style="display: none;">
								<div class="row justify-content-center">
									<div class="col-lg-3 mx-3">
										<div class="small-box bg-info">
											<div class="inner">
												<h3>Cable KM</h3>
												<h5>Plan : <b><span class="plan_ckm">-</span> Km</b></h5>
												<h5>Actual : <b><span class="actual_ckm">-</span> Km</b></h5>
												<h5>Percentage : <b><span class="percent_ckm"> %</span></b></h5>
											</div>
										</div>
									</div>
									<div class="col-lg-3 mx-3">
										<div class="small-box bg-success">
											<div class="inner">
												<h3>Fiber KM</h3>
												<h5>Plan : <b><span class="plan_fkm">-</span> Km</b></h5>
												<h5>Actual : <b><span class="actual_fkm">-</span> Km</b></h5>
												<h5>Percentage : <b><span class="percent_fkm"> %</span></b></h5>
											</div>
										</div>
									</div>
								</div>
								<!-- Column Graph -->
								<div class="row justify-content-center">
									<div class="col-md-5 mx-1">
										<div id="chart_ckm_year">

										</div>
									</div>
									<div class="col-md-5 mx-1">
										<div id="chart_fkm_year">

										</div>
									</div>
								</div>
							</div> <!-- .dashboard-content -->
						</div> <!-- This Year Tab End -->
					</div>
				</div>
			</div>
    </div>
  </div>
	<!-- End Select Period -->

	
  
</div>
<script type="text/javascript">
	$(document).ready(function(){
		const today = 'today';
      let charts_ckm = {};
      let charts_fkm = {};

		loadDashboard(today);

		// Get data for Cable KM and Fiber KM card by today
		function loadDashboard(tab){
			let container = $('#' + tab + '_tab');

			container.find('.loading-spinner').show();
			container.find('.year-dashboard-content').hide();
			
			$.ajax({
				url: '<?= base_url('mes_cable/mc_main_dashboard/load_main_dashboard_')?>' + tab,
				type: 'POST',
				dataType: 'json',
				success: function(response){
					// remove the loading spinner
					container.find('.loading-spinner').hide();
					container.find('.dashboard-content').show();

					if(response.status === 'error'){
						Swal.fire({
							title: "Warning",
							text: response.message,
							icon: "warning"
						});
						return;
					}

					container.find('.plan_ckm').text(response.plan_ckm);
					container.find('.actual_ckm').text(response.actual_ckm);
					container.find('.percent_ckm').text(response.percentage_ckm + ' %');
					container.find('.plan_fkm').text(response.plan_fkm);
					container.find('.actual_fkm').text(response.actual_fkm);
					container.find('.percent_fkm').text(response.percentage_fkm + ' %');

               // Update chart (CKM)
               renderChartFor(tab, response.plan_ckm, response.actual_ckm, response.plan_fkm, response.actual_fkm);

					// Check if plan for today already inputed
					// if (tab === 'today'){
					// 	if (!response.plan_ckm || parseFloat(response.plan_ckm) === 0 || !response.plan_fkm || parseFloat(response.plan_fkm) === 0) {
					// 		Swal.fire({
					// 			title: "Warning",
					// 			text: "Plan CKM or Plan FKM is not inputted yet",
					// 			icon: "warning"
					// 		});
					// 	}
					// }
				},
				error: function(){
					Swal.fire({
						title: "Oopss",
						text: "Failed to get main dashboard data",
						icon: "error"
					});
				}
			}); // ajax
		}

      // Function for rendering chart
      function renderChartFor(tab, plan_ckm, actual_ckm, plan_fkm, actual_fkm){
         const options_ckm = {
            chart: { 
               type: 'bar',
               toolbar: {
                  show: true,
                  tools: {
                     download: true,
                     selection: true,
                     zoom: true,
                     zoomin: true,
                     zoomout: true,
                     pan: true,
                     reset: true,
                     customIcons: []
                  }
               }
            },
            colors: ['#ffd449', '#4361ee'],
            series: [{
               name: 'CKM',
               data: [parseFloat(plan_ckm.replace(/,/g,'')), parseFloat(actual_ckm.replace(/,/g,''))]
            }],
            xaxis: {
               categories: ['Plan', 'Actual']
            },
            plotOptions: {
               bar: {
                  distributed : true,
                  borderRadius: 5,
                  dataLabels: {
                     position: 'top'
                  }
               }
            },
            dataLabels: {
               enabled: true,
               formatter: function (val){
                  return val + " Km";
               },
               offsetY: -20,
               style: {
                  fontSize: '12px',
                  colors: ["#304758"]
               }
            },
            title: {
               text: "Total Production (CKM)",
               floating: true,
               offsetY: -5,
               align: 'center'
            }
         };

         const options_fkm = {
            chart: { 
               type: 'bar'
            },
            colors: ['#48cae4','#2a9d8f'],
            series: [{
               name: 'FKM',
               data: [parseFloat(plan_fkm.replace(/,/g,'')), parseFloat(actual_fkm.replace(/,/g,''))]
            }],
            xaxis: {
               categories: ['Plan', 'Actual']
            },
            plotOptions: {
               bar: {
                  distributed : true,
                  borderRadius: 5,
                  dataLabels: {
                     position: 'top'
                  }
               }
            },
            dataLabels: {
               enabled: true,
               formatter: function (val){
                  return val + " Km";
               },
               offsetY: -20,
               style: {
                  fontSize: '12px',
                  colors: ["#304758"]
               }
            },
            title: {
               text: "Total Production (FKM)",
               floating: true,
               offsetY: -5,
               align: 'center'
            }
         };

         // Render CKM chart
         const ckmSelector = $("#chart_ckm_" + tab)[0];
         if(ckmSelector) {
            if(charts_ckm[tab]){
               charts_ckm[tab].updateSeries(options_ckm.series);
            } else {
               charts_ckm[tab] = new ApexCharts(ckmSelector, options_ckm);
               charts_ckm[tab].render();
            }
         }

         // Render FKM chart
         const fkmSelector = $("#chart_fkm_" + tab)[0];
         if(fkmSelector) {
            if(charts_fkm[tab]){
               charts_fkm[tab].updateSeries(options_fkm.series);
            } else {
               charts_fkm[tab] = new ApexCharts(fkmSelector, options_fkm);
               charts_fkm[tab].render();
            }
         }
      }

		// Open today tab / Month tab / Year tab
		$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
			let targetId = $(e.target).attr('href');
         if(targetId === '#today_tab'){
            loadDashboard('today');
         } else if(targetId === '#month_tab'){
				loadDashboard('month');
			} else if (targetId === "#year_tab"){
				loadDashboard('year');
			}
		});
	});
    
</script>