<div class="form-head d-flex align-items-center">
    <div class="mr-auto">
        <h2 class="text-black font-w600"><?php echo $judul ?></h2>
    </div>
</div>


<div class="card rounded shadow h-50">
    <div class="card-header bg-primary border-b-0">
        <div class="dropdown mt-sm-0 mt-3">
            <button type="button" class="btn bg-light text-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                PA Jakarta Timur Kelas I A
            </button>
            <button type="button" class="btn bg-primary text-white border tambah_panggilan_sidang">
                Tambah
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="javascript:void(0);">PA Jakarta Timur Kelas I A</a>
            </div>
        </div>
        <div class="input-group search-area d-lg-inline-flex border">
            <input type="text" class="form-control wd-sm-100" placeholder="Search here...">
            <div class="input-group-append">
                <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive border rounded">
            <table class="table table-hover table-striped table-borderless">
                <thead class="bg-primary text-white text-center align-middle">
                    <tr>
                        <th>No</th>
                        <th>Waktu Pelaksanaan</th>
                        <th>Kode Alat</th>
                        <th>Kelurahan</th>
                        <th>Nomor Perkara</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center text-primary">
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            Rabu, 12 Oktober 2022
                        </td>
                        <td>
                            DEV_400647 _1
                        </td>
                        <td>
                            <p>Cijantung</p>
                            <p>Pasar Rebo</p>
                        </td>
                        <td>
                            <button class="btn btn-outline-primary list_perkara">List Perkara</button>
                        </td>
                        <td>
                            <a href="#" class="btn btn-info shadow btn-xs sharp mr-1" data-toggle="tooltip" data-placement="bottom" title="Cetak Surat Ijin Keluar"><i class="fa fa-file"></i></a>
                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger shadow btn-xs sharp mr-1" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $('.tambah_panggilan_sidang').on('click', function(e) {
        $(".modal-dialog").removeClass("modal-lg").addClass("modal-xl");
        var url = '<?php echo base_url(); ?>main/form_panggilan_sidang';
        var form_data = new FormData();
        open_ajax({
            jenis: 'modal',
            title: 'Tambah Panggilan Sidang',
            url: url,
            form_data: form_data
        });
    });
    $('.list_perkara').on('click', function(e) {
        $(".modal-dialog").removeClass("modal-xl").addClass("modal-lg");
        var url = '<?php echo base_url(); ?>main/list_perkara';
        var form_data = new FormData();
        open_ajax({
            jenis: 'modal',
            title: 'List Perkara',
            url: url,
            form_data: form_data
        });
    });
</script>