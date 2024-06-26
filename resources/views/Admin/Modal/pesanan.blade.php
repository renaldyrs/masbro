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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                            <div class="form-body">

                                <div class="row p-t-18">

                                    <div class="col-md-3">
                                        <div class="form-group has-success">
                                            <label class="control-label">Nama Pelanggan</label>
                                            <select name="nama_pelanggan" class="form-control ">
                                                <option value="">--Nama Pelanggan--</option>
                                                @foreach ($pelanggan as $p)

                                                    <option value="{{$p->id}}">{{ $p->nama }}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group has-success">
                                            <label class="control-label">Jenis Pembayaran</label>
                                            <select name="status" class="form-control" id="">
                                                <option value="">--Jenis Pemabayaran--</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Transfer">Transfer</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group has-success">
                                            <label class="control-label">Status Pembayaran</label>
                                            <select name="statuspembayaran" class="form-control" id="">
                                                <option value="">--Status Pemabayaran--</option>
                                                <option value="Belum Bayar">Belum Bayar</option>
                                                <option value="Sudah Bayar">Sudah Bayar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group has-success">
                                            <label class="control-label">Jenis</label>
                                            <select name="jenis" id="autojenis" class="form-control ">
                                                <option value="0">--Jenis Jasa--</option>
                                                @foreach ($jenis as $j)
                                                    <option value="{{$j->id}}">{{ $j->jenis }}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group has-success">
                                            <label class="control-label">harga</label>
                                            <input type="text" name="harga" id="harga" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group has-success">
                                            <label class="control-label">Berat Pakaian</label>
                                            <input type="text" name="jumlah" class="form-control">
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-2">
                                        <div class="form-group has-success">
                                            <label class="control-label">Total Bayar</label>
                                            <input type="text" name="total" class="form-control">
                                        </div>
                                    </div> -->


                                </div>

                                <div class="row">

                                </div>



                            </div>



                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                    Tambah Data</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type='text/javascript'>
    $(document).ready(function(){

        // Department Change
        $('#autojenis').change(function(){

             // Department id
             var id = $(this).val();

             // Empty the dropdown
             $('#harga').find('input').not(':first').remove();

             // AJAX request 
             $.ajax({
                 url: 'getharga/'+ $id,
                 type: 'get',
                 dataType: 'json',
                 success: function(response){

                     var len = 0;
                     if(response['data'] != null){
                          len = response['data'].length;
                     }

                     if(len > 0){
                          // Read data and create <option >
                          for(var i=0; i<len; i++){

                               var id = response['data'][i].id;
                               var jenis = response['data'][i].jenis;

                               var input = "<input type="'text'" name="'harga'" id="'harga'" value="harga" class="'form-control'">";
                                            
                                     

                               $("#harga").append(input); 
                          }
                     }

                 }
             });
        });
    });
    </script>


<!-- MODAL UBAH STATUS -->