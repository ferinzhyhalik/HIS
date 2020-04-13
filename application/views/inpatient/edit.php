<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-5">
        <div class="col d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">


            <!-- <?= form_open_multipart('inpatient/edit/'); ?> -->
            <form class="user" method="post" action="<?= base_url('inpatient/edit/') . $inpatient['patientMedicalRecord_id'] ?>">
                <input type="hidden" name="patientMedicalRecord_id" value=" <?= $inpatient['patientMedicalRecord_id'] ?>">
                <div class="form-group row">
                    <label for="Email" class="col-sm-2 col-form-label">Inpatient ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inpatient_id" name="inpatient_id" value="<?= $inpatient['inpatient_id'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $patient['first_name'] ?>" readonly>
                        <?= form_error('first_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="first_name" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $patient['last_name'] ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="doctor_id" class="col-sm-2 col-form-label"> Doctor ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="doctor_id" name="doctor_id" value="<?= $inpatient['doctor_id'] ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nurse_id" class="col-sm-2 col-form-label"> Nurse ID</label>
                    <div class="col-sm-10">
                        <select name="nurse_id" id="nurse_id" class="form-control">
                            <option value="<?= $inpatient['nurse_id'] ?>"> Select Nurse = <?= $inpatient['nurse_id'] ?></option>
                            <?php foreach ($nurse_id as $m) : ?>
                                <option value="<?= $m['nurse_id']; ?>"> <?= $m['nurse_id']; ?> - <?= $m['first_name']; ?> <?= $m['last_name']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_in" class="col-sm-2 col-form-label"> Date In </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="date_in" name="date_in" value="<?= date('d F Y', $inpatient['date_in']); ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_out" class="col-sm-2 col-form-label"> Date Out</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date-out" name="date_out" value="<?= $inpatient['date_out'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inpatient_status" class="col-sm-2 col-form-label"> Room Grade</label>
                    <div class="col-sm-10">
                        <select name="room_grade" id="room_grade" class="form-control">
                            <option value="<?= $inpatient['room_grade'] ?>"> <?= $inpatient['room_grade'] ?></option>
                            <option value="UGD">UGD</option>
                            <option value="Standard"> Standard </option>
                            <option value="VIP"> VIP </option>
                            <option value="VVIP"> VVIP </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bed_id" class="col-sm-2 col-form-label"> Bed ID</label>
                    <div class="col-sm-10">
                        <select name="bed_id" id="bed_id" class="form-control">
                            <option value="<?= $inpatient['bed_id'] ?>"> Select Bed : <?= $inpatient['bed_id'] ?></option>
                            <?php foreach ($beds as $m) : ?>
                                <option value="<?= $m['bed_id']; ?>"> <?= $m['bed_id']; ?> - <?= $m['room_grade']; ?> - <?= $m['bed_availability']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="diagnose" class="col-sm-2 col-form-label" readonly> Diagnose </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="diagnose" name="diagnose" placeholder="Add diagnose">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lab_schedule" class="col-sm-2 col-form-label"> Lab Schedule</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control" id="lab_schedule" name="lab_schedule" value="<?= date('d F Y', $treatment['lab_schedule']); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/lab_result/') . $treatment['lab_pic'] ?> " class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="lab_pic" name="lab_pic">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="lab_result" class="col-sm-2 col-form-label"> <br>Result Analysis </label>
                    <div class="col-sm-10">
                        <br><input type="text" class="form-control" id="lab_result" name="lab_result" placeholder="Add result analysis">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="visit_schedule" class="col-sm-2 col-form-label"> Visit Schedule</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control" id="visit_schedule" name="visit_schedule" value="<?= $treatment['visit_schedule'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="prescription" class="col-sm-2 col-form-label"> Prescription </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prescription" name="prescription" placeholder="Add prescription">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="payment_total" class="col-sm-2 col-form-label"> Payment Total </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="payment_total" name="payment_total" value="<?= $inpatient['payment_total'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="payment_status" class="col-sm-2 col-form-label"> Status </label>
                    <div class="col-sm-10">
                        <select name="payment_status" id="payment_status" class="form-control">
                            <option value="<?= $inpatient['payment_status'] ?>"> <?= $inpatient['payment_status'] ?></option>
                            <option value="1"> Not Paid </option>
                            <option value="2"> Paid </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inpatient_status" class="col-sm-2 col-form-label"> Status </label>
                    <div class="col-sm-10">
                        <select name="inpatient_status" id="inpatient_status" class="form-control">
                            <option value="<?= $inpatient['inpatient_status'] ?>"> <?= $inpatient['inpatient_status'] ?></option>
                            <option value="1"> Waiting </option>
                            <option value="2"> Inpatient </option>
                            <option value="3"> Discharge </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->