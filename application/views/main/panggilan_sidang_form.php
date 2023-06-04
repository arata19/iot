<div class="basic-form">
    <div class="row">
        <div class="col-md-6">
            <form>
                <div class="form-group">
                    <label>Tanggal Pelaksanaan:</label>
                    <input name="datepicker" class="datepicker-default form-control" role="button" id="datepicker" placeholder="Pilih Tanggal">
                </div>
                <div class="form-group">
                    <label>Kode Alat:</label>
                    <select class="form-control default-select" id="sel1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nomor Perkara:</label>
                    <input type="text" class="form-control input-default " placeholder="xxx/Pdt.G/xxxx/PA.JT">
                </div>
                <button class="btn btn-primary float-right">SIMPAN</button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="card rounded shadow">
                <div class="card-header bg-primary border-b-0">
                    <h5 class="text-white">Data Nomor Perkara Yang Sudah Ditambahkan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive overflow-scroll" style="max-height: 250px;">
                        <table class="table table-hover table-striped table-borderless">
                            <tbody class="text-primary">
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        123/Pdt.G/2022/PA.JT (P)
                                    </td>
                                    <td>
                                        Cijantung
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        124/Pdt.G/2022/PA.JT (P)
                                    </td>
                                    <td>
                                        Pasar Rebo
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        125/Pdt.G/2022/PA.JT (P)
                                    </td>
                                    <td>
                                        Ciracas
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        126/Pdt.G/2022/PA.JT (P)
                                    </td>
                                    <td>
                                        Rawamangun
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        5
                                    </td>
                                    <td>
                                        127/Pdt.G/2022/PA.JT (P)
                                    </td>
                                    <td>
                                        Ceger
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        6
                                    </td>
                                    <td>
                                        128/Pdt.G/2022/PA.JT (P)
                                    </td>
                                    <td>
                                        Cijantung
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        7
                                    </td>
                                    <td>
                                        129/Pdt.G/2022/PA.JT (P)
                                    </td>
                                    <td>
                                        Pasar Rebo
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        8
                                    </td>
                                    <td>
                                        130/Pdt.G/2022/PA.JT (P)
                                    </td>
                                    <td>
                                        Ciracas
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        9
                                    </td>
                                    <td>
                                        131/Pdt.G/2022/PA.JT (P)
                                    </td>
                                    <td>
                                        Rawamangun
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        132/Pdt.G/2022/PA.JT (P)
                                    </td>
                                    <td>
                                        Ceger
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function($) {
        "use strict"

        //date picker classic default
        $('.datepicker-default').pickadate();

    })(jQuery);
</script>