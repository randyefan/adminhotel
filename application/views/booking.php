<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    var_dump($booking);
    ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Booking</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Booking Hotel</h6>
        </div>
        <div class="card-body">
            <!-- <?php echo $error; ?> -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">No</th>
                            <th class="align-middle">Nama Hotel</th>
                            <th class="align-middle">Tipe Room</th>
                            <th class="align-middle">Tanggal Booking</th>
                            <th class="align-middle">Tanggal Kedatangan</th>
                            <th class="align-middle">Tanggal Keluar</th>
                            <th class="align-middle">Total Malam</th>
                            <th class="align-middle">Total Biaya</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-center">
                            <th class="align-middle">No</th>
                            <th class="align-middle">Nama Hotel</th>
                            <th class="align-middle">Tipe Room</th>
                            <th class="align-middle">Tanggal Booking</th>
                            <th class="align-middle">Tanggal Kedatangan</th>
                            <th class="align-middle">Tanggal Keluar</th>
                            <th class="align-middle">Total Malam</th>
                            <th class="align-middle">Total Biaya</th>
                        </tr>
                    </tfoot>
                    <tbody class="">

                        <?php $nomor = 1; ?>
                        <?php foreach ($room as $r) : ?>
                            <tr>
                                <td class="align-middle text-center"><?= $nomor++; ?></td>
                                <td class="align-middle text-center"><?= $r->hotelname; ?></td>
                                <td class="align-middle text-center"><?= $r->roomtipe; ?></td>
                                <td class="align-middle text-center"><?= rupiah($r->roomharga); ?></td>
                                <td class="align-middle text-center"><?= $r->roomcapacity; ?></td>
                                <td class="align-middle text-center"><?= '<img src="' . base_url('uploads/room/') . $r->roompict . '" width="300px" height="200px"/>'; ?></td>
                                <td class="align-middle text-center"> <a href="<?= base_url(); ?>Room/hapus/<?= $r->IDroom; ?>" class="text-danger mr-2" onclick="return confirm('yakin?');"><i class="far fa-trash-alt"></i></a><a href="" id="ubah" class="text-primary" data-toggle="modal" data-target="#RubahModal" data-idroom="<?= $r->IDroom; ?>" data-idhotel="<?= $r->IDhotel; ?>" data-namahotel="<?= $r->hotelname; ?>" data-tipe="<?= $r->roomtipe; ?>" data-harga="<?= $r->roomharga; ?>" data-gbr="<?= $r->roompict; ?>" data-kapasitas="<?= $r->roomcapacity; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->