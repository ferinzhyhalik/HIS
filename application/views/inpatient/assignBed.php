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
                    <th scope="col">Inpatient ID</th>
                    <th scope="col">Bed ID</th>
                    <th scope="col">Room Grade</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($inpatient as $m) : ?>
                    <tr>
                        <td><?= $m['inpatient_id']; ?> </td>
                        <td><?= $m['bed_id']; ?> </td>
                        <td><?= $m['room_grade']; ?> </td>
                        <td> <button type="submit" class="btn btn-primary">Assign</button>
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