<div class="modal fade text-left" id="ModalEditPelanggan" tabindex="-1" role="dialog" aria-hidden="true"
    aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
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
                        @foreach ($pelanggan as $p)


                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group has-success">
                                    <label class="control-label">Nama Pelanggan</label>
                                    <input type="text" name="nama" value="{{$p->nama}}"
                                        class="form-control @error('nama') is-invalid @enderror" placeholder=""
                                        autocomplete="off">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-success">
                                    <label class="control-label">Alamat Pelanggan</label>
                                    <input type="text" class="form-control form-control-danger" name="alamat" value="{{$p->alamat}}"
                                        placeholder="Tambahkan Alamat Pelanggan" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group has-success">
                                    <label class="control-label">No Hp</label>
                                    <input type="text"
                                        class="form-control form-control-danger @error('harga') is-invalid @enderror format_harga"
                                        name="nohp" value="{{$p->nohp}}" placeholder="Tambahkan No HP" autocomplete="off">

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-success">
                                    <label class="control-label">Jenis Kelamin</label>
                                    <select name="kelamin" class="form-control @error('user_id') is-invalid @enderror">
                                        <option value="{{$p->kelamin}}">{{$p->kelamin}}</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>

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

                    @endforeach
                </div>
            </div>
        </div>
</div>