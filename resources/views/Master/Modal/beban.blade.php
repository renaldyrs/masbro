<div class="modal fade text-left" id="ModalEditPelanggan" tabindex="-1" role="dialog" aria-hidden="true"
    aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Pesanan</h3>
                <button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">


                <div class="form-body">
                    @foreach ($pelanggan as $p)


                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group has-success">
                                        <label class="control-label">Nama Akun</label>
                                        <select name="idakun" id="kode" class="form-control ">
                                            <option value="">-Akun-</option>
                                            @foreach ($akun as $a)

                                                <option value="{{$a->id}}">{{ $a->kode_akun }} - {{ $a->nama_akun }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-success">
                                        <label class="control-label">Kode</label>
                                        <input type="text" name="kode" id="kodeakun" value="" class="form-control "
                                            placeholder="Kode" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group has-success">
                                        <label class="control-label">Keterangan</label>
                                        <input type="text" name="keterangan" id="keterangan" value="" class="form-control "
                                            placeholder="Tambahkan Keterangan" autocomplete="off" readonly>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-success">
                                        <label class="control-label">Biaya</label>
                                        <input type="text" class="form-control form-control-danger" name="biaya" value=""
                                            placeholder="biaya" autocomplete="off">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-success">
                                        <label class="control-label">Jumlah</label>
                                        <input type="text" class="form-control form-control-danger" name="jumlah" value=""
                                            placeholder="jumlah" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                Update Data</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>

                    @endforeach
            </div>
        </div>
    </div>
</div>