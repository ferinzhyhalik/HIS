<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> ELECTRONIC MEDICAL RECORD</h1>
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-8">
        <a href="<?= base_url('inpatient/edit/') ?><?= $inpatient['patientMedicalRecord_id'] ?>" class="btn btn-primary btn-user">
            Edit EMR
        </a> </div> <br>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">INPATIENT ID</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $inpatient['inpatient_id'] ?> <br>
                                <?= $patient['first_name'] ?> <?= $patient['last_name'] ?><br></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa fa-mars fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Doctor in Charge</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $inpatient['doctor_id'] ?> <br>
                                <?= $doctor['first_name']; ?> <?= $doctor['last_name']; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nurse in Charge</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> <?= $inpatient['nurse_id'] ?> <br>
                                        <?= $nurse['first_name']; ?> <?= $nurse['last_name']; ?> </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Date</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">In: <?= date('d F Y', $inpatient['date_in']); ?><br>
                                Out: <?= date('d F Y', $inpatient['date_out']); ?> <br></div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bed</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $inpatient['room_grade']; ?>
                                <br> <?= $inpatient['bed_id'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-bed fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Payment</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> Method: <?= $inpatient['payment_method']; ?>
                                <br> Total: Rp. <?= $inpatient['payment_total'] ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> Status: <?= $inpatient['payment_status']; ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-money-bill-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Status</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $inpatient['inpatient_status'] ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hospital	 fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseDiagnose" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseDiagnose">
                    <h6 class="m-0 font-weight-bold text-primary">Diagnose</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseDiagnose">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Date Added</th>
                                    <th scope="col">Diagnose</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($treat as $m) : ?>
                                    <tr>
                                        <td><?= date('d F Y', $m['date_added']); ?> </td>
                                        <td><?= $m['diagnose']; ?> </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseVisit" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseVisit">
                    <h6 class="m-0 font-weight-bold text-primary">Doctor's Visit</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseVisit">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Date Added</th>
                                    <th scope="col">Schedule</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($treat as $m) : ?>
                                    <tr>
                                        <td><?= date('d F Y', $m['date_added']); ?> </td>
                                        <td><?= date('d F Y g:i a', $m['visit_schedule']); ?> </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">

            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseLab" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseLab">
                    <h6 class="m-0 font-weight-bold text-primary">Lab & Radiology</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseLab">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Date Added</th>
                                    <th scope="col">Schedule</th>
                                    <th scope="col">Result</th>
                                    <th scope="col">Analysis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($treat as $m) : ?>
                                    <tr>
                                        <td><?= date('d F Y g:i a', $m['date_added']); ?> </td>
                                        <td><?= date('d F Y g:i a', $m['lab_schedule']); ?> </td>
                                        <td><img src="<?= base_url('assets/img/lab_result/') . $m['lab_pic'] ?>" class="card-img"> </td>
                                        <td><?= $m['lab_result']; ?> </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapsePrescription" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapsePrescription">
                    <h6 class="m-0 font-weight-bold text-primary">Prescription</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapsePrescription">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Date Prescripted</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Doctor ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($treat as $m) : ?>
                                    <tr>
                                        <td><?= date('d F Y', $m['date_added']); ?> </td>
                                        <td><?= $m['prescription']; ?> </td>
                                        <td><?= $inpatient['doctor_id']; ?> </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- /.container-fluid -->

    <!-- End of Main Content -->