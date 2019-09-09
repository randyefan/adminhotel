<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">Hotel</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Hotel</h6>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="material-icons align-middle">
          assignment </i> Tambah Data Hotel
      </button>
      <!-- <?php echo $error; ?> -->
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th class="align-middle">No</th>
              <th class="align-middle">Nama Hotel</th>
              <th class="align-middle">Desc</th>
              <th class="align-middle">Star</th>
              <th class="align-middle">Kota</th>
              <th class="align-middle">Phone Number</th>
              <th class="align-middle">Pic</th>
              <th class="align-middle">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr class="text-center">
              <th class="align-middle">No</th>
              <th class="align-middle">Nama Hotel</th>
              <th class="align-middle">Desc</th>
              <th class="align-middle">Star</th>
              <th class="align-middle">Kota</th>
              <th class="align-middle">Phone Number</th>
              <th class="align-middle">Pic</th>
              <th class="align-middle">Aksi</th>
            </tr>
          </tfoot>
          <tbody class="">
            <?php $nomor = 1;
            foreach ($hotel as $htl) : ?>
              <tr>
                <td class="align-middle"><?= $nomor ?></td>
                <td class="align-middle"><?= $htl['hotelname'] ?></td>
                <td class="align-middle"><?= $htl['hoteldesc'] ?></td>
                <td class="align-middle"><?= $htl['hotelstar'] ?></td>
                <td class="align-middle"><?= $htl['location'] ?></td>
                <td class="align-middle"><?= $htl['phonenumber'] ?></td>
                <td><?= '<img src="' . base_url('uploads/hotel/') . $htl['hotelpict'] . '" width="300px" height="200px"/>';
                    $nomor++ ?></td>
                <td class="align-middle text-center"> <a href="<?= base_url(); ?>Dashboard/hapus/<?= $htl['IDhotel']; ?>" class="text-danger mr-2" onclick="return confirm('yakin?');"><i class="far fa-trash-alt"></i></a>
                  <a href="" id="ubah" class="text-primary" data-toggle="modal" data-target="#RubahModal" data-id="<?= $htl['IDhotel']; ?>" data-nama="<?= $htl['hotelname']; ?>" data-desc="<?= $htl['hoteldesc']; ?>" data-loc="<?= $htl['location']; ?>" data-gbr="<?= $htl['hotelpict']; ?>" data-star="<?= $htl['hotelstar']; ?>" data-phone="<?= $htl['phonenumber']; ?>"><i class="fas fa-pencil-alt"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Hotel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Dashboard/do_upload') ?>" method="post" enctype="multipart/form-data">
          <div class="text-center">
            <img src="<?= base_url('assets/') ?>gambar/noimage" class="rounded mb-2" alt="..." width="200px" height="200px" id="image">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Hotel" name="nama">
          </div>
          <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsi Hotel" name="deskripsi"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Bintang</label>
            <select class="form-control" id="exampleFormControlSelect1" name="bintang">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Lokasi" name="lokasi">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Phone Number" name="phone">
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Upload Foto Hotel</label>
            <input type="file" name="imagee" class="form-control-file" id="exampleFormControlFile1" onchange="showImage2.call(this)">
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
        <h5 class="modal-title" id="exampleModalLabel">Rubah Data Hotel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-edit">
        <form action="<?= base_url('Dashboard/edit') ?>" method="post" enctype="multipart/form-data" id="ubahdata">
          <div class="text-center">
            <img src="<?= base_url('uploads/hotel/') ?>gambar/noimage" class="rounded mb-2" alt="..." width="200px" height="200px" id="pict">
          </div>
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nama Hotel" name="nama" id="nama">
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="3" placeholder="Deskripsi Hotel" name="deskripsi" id="desc"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Bintang</label>
            <select class="form-control" name="bintang" id="star">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Lokasi" name="lokasi" id="loc">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Phone Number" name="phone" id="phone">
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Upload Foto Hotel</label>
            <input type="file" name="imageubah" class="form-control-file" id="exampleFormControlFile1" onchange="showImage.call(this)">
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
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var desc = $(this).data('desc');
    var star = $(this).data('star');
    var kota = $(this).data('loc');
    var phone = $(this).data('phone');
    var gambar = $(this).data('gbr');
    
    $("#ubahdata #id").val(id);
    $("#ubahdata #nama").val(nama);
    $("#ubahdata #desc").val(desc);
    $("#ubahdata #star").val(star);
    $("#ubahdata #loc").val(kota);
    $("#ubahdata #phone").val(phone);
    $("#ubahdata #pict").attr("src", "<?= base_url('uploads/hotel/') ?>"+gambar);
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
        pict.src = data.target.result;

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
        image.src = data.target.result;

      }
      obj.readAsDataURL(this.files[0]);
    }
  }
</script>

<!-- Function Show Image Modal Tambah -->