<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Room</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Room</h6>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="material-icons align-middle">
                    assignment </i> Tambah Room
            </button>
            <!-- <?php echo $error; ?> -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">No</th>
                            <th class="align-middle">Nama Hotel</th>
                            <th class="align-middle">Tipe Room</th>
                            <th class="align-middle">Harga per Malam</th>
                            <th class="align-middle">Kapasitas Room</th>
                            <th class="align-middle">Pic</th>
                            <th class="align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-center">
                            <th class="align-middle">No</th>
                            <th class="align-middle">Nama Hotel</th>
                            <th class="align-middle">Tipe Room</th>
                            <th class="align-middle">Harga per Malam</th>
                            <th class="align-middle">Kapasitas Room</th>
                            <th class="align-middle">Pic</th>
                            <th class="align-middle">Aksi</th>
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

<!-- Modal Tambah Data Hotel -->
<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Room/tambah') ?>" method="post" enctype="multipart/form-data">
                    <div class="text-center">
                        <img src="<?= base_url('assets/') ?>gambar/noimage" class="rounded mb-2" alt="..." width="200px" height="200px" id="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Hotel</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="IDhotel">
                            <?php foreach ($hotel as $h) :  ?>
                                <?php echo "<option value=" . $h['IDhotel'] . ">" . $h['hotelname'] . "</option>" ?>
                                <!-- <option value="1">1</option> -->
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tipe Room (Deluxe Room, etc)" name="tiperoom">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Harga Kamar per Malam" name="roomharga">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Kapasitas Room" name="kapasitas">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Foto Hotel</label>
                        <input type="file" name="imagee" class="form-control-file" id="exampleFormControlFile1" onchange="showImage.call(this)">
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Tambah Data Hotel -->

<!-- Modal Rubah Data Hotel -->
<div class="modal fade bd-example-modal-lg" id="RubahModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Room/edit') ?>" method="post" enctype="multipart/form-data" id="ubahdata">
                    <input type="hidden" id="idroom" name="idroom">
                    <input type="hidden" id="idhotel" name="idhotel">
                    <div class="text-center">
                        <img src="<?= base_url('assets/') ?>gambar/noimage" class="rounded mb-2" alt="..." width="200px" height="200px" id="imagee">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Hotel</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="IDhotel" id="namahotel">
                            <?php foreach ($hotel as $h) :  ?>
                                <?php echo "<option value=" . $h['IDhotel'] . ">" . $h['hotelname'] . "</option>" ?>
                                <!-- <option value="1">1</option> -->
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tipe" placeholder="Tipe Room (Deluxe Room, etc)" name="tiperoom">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="harga" placeholder="Harga Kamar per Malam" name="roomharga">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="kapasitas" placeholder="Kapasitas Room" name="kapasitas">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Foto Hotel</label>
                        <input type="file" name="imagee" class="form-control-file" id="gbr" onchange="showImage2.call(this)">
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Rubah Data Hotel -->

<!-- Javascript & ajax Modal Edit -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/Javascript">
    $(document).on("click", "#ubah", function() {
    var idroom = $(this).data('idroom');
    var idhotel = $(this).data('idhotel');
    var tipe = $(this).data('tipe');
    var harga = $(this).data('harga');
    var kapasitas = $(this).data('kapasitas');
    var gbr = $(this).data('gbr');
    var hotelname = $(this).data('namahotel');
    
    $("#ubahdata #idroom").val(idroom);
    $("#ubahdata #namahotel").val(hotelname);
    $("#ubahdata #tipe").val(tipe);
    $("#ubahdata #harga").val(harga);
    $("#ubahdata #kapasitas").val(kapasitas);
    $("#ubahdata #image").attr("src", "<?= base_url('uploads/room/') ?>"+gbr);
  });
  </script>
<!-- Javascript Modal Edit -->

<!-- Function Show Image Modal Tambah -->
<script>
    function showImage() {
        if (this.files && this.files[0]) {
            var obj = new FileReader();
            obj.onload = function(data) {
                var image = document.getElementById("image");
                image.src = data.target.result;

            }
            obj.readAsDataURL(this.files[0]);
        }
    }
</script>

<script>
    function showImage2() {
        if (this.files && this.files[0]) {
            var obj = new FileReader();
            obj.onload = function(data) {
                var imagee = document.getElementById("imagee");
                imagee.src = data.target.result;

            }
            obj.readAsDataURL(this.files[0]);
        }
    }
</script>

<!-- Function Show Image Modal Tambah -->