<!---- MODAL PESANAN ---->

<form action="{{url('tambah-pesanan')}}" method="POST" id="form-pesanan">
    @csrf
    <div class="modal fade text-left" id="ModalPesanan" tabindex="-1" role="dialog" aria-hidden="true"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Pesanan</h3>
                        <button type="button" class="close" onclick="javascript:window.location.reload()"
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-body">

                            <div class="row p-t-18">

                            <input type="hidden" value="{{Auth::user()->id}}" name="iduser">

                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label">Nama Pelanggan</label>
                                        <select name="id_pelanggan" class="form-control ">
                                            <option value="">Nama Pelanggan</option>
                                            @foreach ($pelanggan as $pl)

                                                <option value="{{$pl->id}}">{{ $pl->nama }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label">Jenis Pembayaran</label>
                                        <select name="jenisbayar" class="form-control" id="metode">

                                            <option value="Cash">Cash</option>
                                            <option value="Transfer">Transfer</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label">Metode Pembayaran</label>
                                        <select name="id_metode" class="form-control" id="metodepembayaran">
                                            <option value="0">Cash</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label">Kode Bank</label>
                                        <input type="text" value="-" name="kodebank" id="kodebank" class="form-control"
                                            readonly>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label">Status Pembayaran</label>
                                        <select name="statuspembayaran" class="form-control" id="">
                                            <option readonly value="">Status Pemabayaran</option>
                                            <option value="Belum Bayar">Belum Bayar</option>
                                            <option value="Sudah Bayar">Sudah Bayar</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label">Jenis</label>
                                        <select name="id_jenis" id="autojenis" class="form-control ">
                                            <option value="0">Jenis Jasa</option>
                                            @foreach ($jenis as $j)
                                                <option value="{{$j->id}}">{{ $j->jenis }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label class="control-label">harga</label>
                                        <input type="text" name="harga" id="harga1" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="input-group">
                                        <label class="control-label">Berat Pakaian</label>
                                        <input type="text" name="jumlah" class="form-control">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label class="control-label">Pengiriman</label>
                                        <select name="pengiriman" class="form-control ">
                                            <option value="Ambil">Ambil</option>
                                            <option value="Kirim">Kirim</option>

                                        </select>

                                    </div>
                                </div>

                            </div>

                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                Tambah Data</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change', '#autojenis', function () {

            var id = $(this).val();

            $.ajax({
                type: "get",
                url: '{!!URL::to('getharga')!!}',
                data: { 'id': id, },
                dataType: 'json',
                success: function (data) {

                    $("#harga1").val(data.harga);
                    $("#total").val(data.harga * jumlah);

                },
                error: function (data) {

                }
            });
        });
    });

    $(document).ready(function () {
        $(document).on('change', '#metode', function () {
            var jenis = $(this).val();
            console.log(jenis);

            if (jenis) {
                $.ajax({
                    url: 'getmetode/' + jenis,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) {
                        console.log(data);
                        $('#metodepembayaran').empty();
                        $.each(data, function (key, value) {

                            $('#metodepembayaran').append('<option value="' + value.id + '">' + value.namabank + '</option>');
                        });

                    }
                });
            } else {

                $('#metodepembayaran').append('<option value="0"></option>');
            }

        });

    });


    $(document).ready(function () {
        $(document).on('change', '#metodepembayaran', function () {
            var id = $(this).val();
            console.log(id);

            $.ajax({
                url: '{!!URL::to('getkodebank')!!}',
                type: "GET",
                data: { 'id': id, },
                dataType: "JSON",
                success: function (data) {
                    console.log(data.kodebank);
                    $('#kodebank').val(data.kodebank);
                }

            });

        });

    });
</script>


<!-- MODAL UBAH STATUS -->