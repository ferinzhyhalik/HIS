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
                            <h1 class="h4 text-gray-900 mb-4"> Inpatient Admission </h1>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="post" action="<?= base_url('auth/registerInpatient'); ?>">
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
                                    <select name="doctor_id" id="doctor_id" class="form-control">
                                        <option value=""> Select Doctor's ID</option>
                                        <?php foreach ($doctor_id as $m) : ?>
                                            <option value="<?= $m['doctor_id']; ?>"> <?= $m['doctor_id']; ?> - <?= $m['first_name'] ?> <?= $m['last_name'] ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('doctor_id', '<small class="text-danger" pl-3>', '</small>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="diagnose" placeholder="Diagnose" name="diagnose"> <br>
                                    <label for="room_grade"> Room Grade </label> <br>
                                    <input type="radio" id="VIP" name="room_grade" value="vip">
                                    <label for="ugd"> UGD</label><br>
                                    <input type="radio" id="standard" name="room_grade" value="UGD">
                                    <label for="standard"> Standard (3 beds)</label><br>
                                    <input type="radio" id="VIP" name="room_grade" value="vip">
                                    <label for="vip"> VIP (1 bed)</label><br>
                                    <input type="radio" id="VVIP" name="room_grade" value="vvip">
                                    <label for="vip"> VVIP (1 bed)</label> <br>
                                    <label for="payment_method"> Payment Method </label> <br>
                                    <input type="radio" id="debit" name="payment_method" value="debit">
                                    <label for="debit"> DEBIT </label> <br>
                                    <input type="radio" id="installment" name="payment_method" value="intallment">
                                    <label for="installment"> INSTALLMENT </label><br>
                                    <input type="radio" id="bpjs" name="payment_method" value="bpjs">
                                    <label for="bpjs"> BPJS </label> <br>
                                    <input type="radio" id="insurance" name="payment_method" value="insurance">
                                    <label for="insurance"> INSURANCE </label> <br>
                                    <?= form_error('payment_method', '<small class="text-danger" pl-3>', '</small>'); ?><br>

                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="labRecommendation" placeholder="Lab Recommendation"> <br>
                                    <label for="reference"> Reference </label> <br>
                                    <input type="radio" id="ugd" name="reference" value="ugd">
                                    <label for="ugd"> UGD</label><br>
                                    <input type="radio" id="otherHospital" name="reference" value="Other Hospital">
                                    <label for="otherHospital"> Other Hospital</label><br>
                                    <input type="radio" id="Outpatient" name="reference" value="Outpatient">
                                    <label for="outpatient"> Outpatient</label><br>
                                    <input type="radio" id="Inpatient" name="reference" value="Inpatient">
                                    <label for="inpatient"> Inpatient</label><br>
                                    <?= form_error('reference', '<small class="text-danger" pl-3>', '</small>'); ?><br><br>

                                </div>

                            </div>
                            <a class="btn btn-primary" href="<?= base_url('auth/registerInpatient'); ?>"> Clear form </a>
                            <br> <br>
                            <button type="submit" name="registerInpatient" class="btn btn-primary btn-user btn-block">
                                Submit admission
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div <!-- /.container-fluid -->
<!-- End of Main Content -->