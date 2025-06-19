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
						<li class="nav-item"><a class="nav-link active" href="#today" data-toggle="tab">Today</a></li>
						<li class="nav-item"><a class="nav-link" href="#this_month" data-toggle="tab">This Month</a></li>
						<li class="nav-item"><a class="nav-link" href="#this_year" data-toggle="tab">This Year</a></li>
						</ul>
				</div>
				<div class="card-body">
					<div class="tab-content">
						<div class="tab-pane" id="today">
							<div class="row justify-content-center">
								<div class="col-lg-3 mx-3">
									<div class="small-box bg-info">
										<div class="inner">
											<h3>Cable KM</h3>
											<p>Plan : </p>
											<p>Actual : </p>
											<p>Percentage : </p>
										</div>
									</div>
								</div>
								<div class="col-lg-3 mx-3">
									<div class="small-box bg-success">
										<div class="inner">
											<h3>Fiber KM</h3>
											<p>Plan : </p>
											<p>Actual : </p>
											<p>Percentage : </p>
										</div>
									</div>
								</div>
							</div>
							<!-- Column Graph -->
							 <div class="row justify-content-center">
								<div class="col-lg-4 mx-3">
									graph1
								</div>
								<div class="col-lg-4 mx-3">
									graph2
								</div>
							 </div>
						</div>
						<div class="tab-pane" id="this_month">
							<h4>This Month</h4>
						</div>
						<div class="tab-pane" id="this_year">
							<h4>This Year</h4>
						</div>
					</div>
				</div>
			</div>
    </div>
  </div>
	<!-- End Select Period -->

	
  
</div>