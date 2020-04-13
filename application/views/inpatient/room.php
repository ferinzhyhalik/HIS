<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-5">
        <div class="col d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800 "><?= $title; ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div><br>
        <?= $this->session->flashdata('message'); ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Bed ID</th>
                    <th scope="col">Inpatient ID</th>
                    <th scope="col">Room ID</th>
                    <th scope="col">Room Grade</th>
                    <th scope="col">Bed Availability</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($beds as $bd) : ?>
                    <tr>
                        <td><?= $bd['bed_id']; ?> </td>
                        <td><?= $bd['inpatient_id']; ?> </td>
                        <td><?= $bd['room_id']; ?> </td>
                        <td><?= $bd['room_grade']; ?> </td>
                        <td><?= $bd['bed_availability']; ?> </td>
                        <td>
                            <a href="<?= base_url('inpatient/deletePatient/')  . $bd['bed_id'] ?> " class="badge badge-danger" onclick=" return confirm('are you sure want to delete this patient ?')">Delete</a>
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