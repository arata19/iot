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
            <button type="button" class="btn bg-primary text-white border tambah_pengaturan_yurisdiksi">
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
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Logitude,Latitude</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center text-primary">
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            Cijantung
                        </td>
                        <td>
                            Pasar Rebo
                        </td>
                        <td>
                            <p>Longitude : -6.32465149766958</p>
                            <p>Latitude : 106.73859686848921</p>
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a>
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

    $('.tambah_pengaturan_yurisdiksi').on('click', function(e) {
        var url = '<?php echo base_url(); ?>main/form_pengaturan_yurisdiksi';
        var form_data = new FormData();
        open_ajax({
            jenis: 'modal',
            title: 'Tambah Pengaturan Yurisdiksi',
            url: url,
            form_data: form_data
        });
    });
</script>