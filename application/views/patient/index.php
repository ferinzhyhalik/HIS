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
                    <th scope="col">#</th>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Medical Records ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>


                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($patient as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $m['patient_id']; ?> </td>
                        <td><?= $m['patientMedicalRecord_id']; ?> </td>
                        <td><?= $m['first_name']; ?> <?= $m['last_name'] ?> </td>
                        <td><?= $m['gender']; ?> </td>
                        <td><?= $m['DOB']; ?> </td>
                        <td><?= $m['phonenum']; ?> </td>
                        <td><?= $m['patient_address']; ?> </td>
                        <td><?= date('d F Y', $m['date_added']); ?> </td>
                        <td><?= $m['patient_status']; ?> </td>
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