<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <div class="col d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800 "><?= $title; ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="card o-hiden border-0 col-lg-7 mx-auto">
        <div class="card-body p-0">

            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"> Patient Admission </h1>
                        </div>
                        <?= $this->session->flashdata('success'); ?>
                        <form class="user" method="post" action="<?= base_url('auth/registerPatient'); ?>">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <select name="patientMedicalRecord_id" id="patientMedicalRecord_id" class="form-control">
                                        <option value=""> Select patient's Medical Record ID</option>
                                        <?php foreach ($patientMedicalRecord_id as $m) : ?>
                                            <option value="<?= $m['patientMedicalRecord_id']; ?>"> <?= $m['patientMedicalRecord_id']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('patientMedicalRecord_id', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    <br>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="first_name" id="first_name" class="form-control form-control-user" placeholder="First Name">
                                    <?= form_error('first_name', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    <br><input type="text" name="phonenum" id="phonenum" class="form-control form-control-user" placeholder="Phone Number">
                                    <?= form_error('phonenum', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    <br><input type="date" name="DOB" id="DOB" class="form-control form-control-user" placeholder="Last Name">
                                    <?= form_error('DOB', '<small class="text-danger" pl-3>', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="last_name" id="last_name" class="form-control form-control-user" placeholder="Last Name">
                                    <?= form_error('last_name', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    <br><input type="text" name="patient_address" id="patient_address" class="form-control form-control-user" placeholder="Address">
                                    <?= form_error('patient_address', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    <br><label for="gender"> Gender </label> <br>
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male"> Male</label><br>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female"> Female</label><br>
                                    <?= form_error('gender', '<small class="text-danger" pl-3>', '</small>'); ?>
                                </div>

                            </div>
                            <a class="btn btn-primary" href="<?= base_url('auth/registerPatient'); ?>"> Clear form </a>
                            <br> <br>
                            <button type="submit" name="registerPatient" class="btn btn-primary btn-user btn-block">
                                Register Patient
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div <!-- /.container-fluid -->
<!-- End of Main Content -->