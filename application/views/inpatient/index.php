<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-5">
        <div class="col d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800 "><?= $title; ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Patient Medical Record ID</th>
                    <th scope="col">Doctor ID</th>
                    <th scope="col">Nurse ID</th>
                    <th scope="col">Bed ID</th>
                    <th scope="col">Inpatient Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($inpatient as $m) : ?>
                    <tr>
                        <td><?= $m['patientMedicalRecord_id']; ?> </td>
                        <td><?= $m['doctor_id']; ?> </td>
                        <td><?= $m['nurse_id']; ?> </td>
                        <td><?= $m['bed_id']; ?> </td>
                        <td><?= $m['inpatient_status'] ?> </td>
                        <td>
                            <a href="<?= base_url('inpatient/view/') . $m['patientMedicalRecord_id'] ?>" class="badge badge-warning">View</a>
                            <a href="<?= base_url('inpatient/edit/')  . $m['patientMedicalRecord_id'] ?>  " class="badge badge-success">Edit</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- TODO: lanjut menu management -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->