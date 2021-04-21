<div class="container py-3">
<center><h3>Pengajuan Surat Keterangan Penghasilan</h2></center>
    <div class="line"></div>
    @include('notification.unggah')
    <!-- content -->
    <form method="post" action="" enctype="multipart/form-data" id="mainform" wire:submit.prevent="store">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Bukti Usaha/Slip Gaji <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_slip_gaji')?'is-invalid':''}}"
                        name="file_slip_gaji" id="file_slip_gaji" wire:model="file_slip_gaji"
                        accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_slip_gaji'))
                    <small class="text-danger">{{$errors->first('file_slip_gaji')}}</small>
                    @endif
                </div>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pernyataan <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_surat_pernyataan')?'is-invalid':''}}"
                        name="file_surat_pernyataan" id="file_surat_pernyataan" wire:model="file_surat_pernyataan"
                        accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_surat_pernyataan'))
                    <small class="text-danger">{{$errors->first('file_surat_pernyataan')}}</small>
                    @endif
                </div>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="nik" class="col-sm-4 col-form-label">NIK <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nik')?'is-invalid':''}}" id="nik" name="nik"
                    placeholder="NIK" value="" wire:model="nik" readonly>
                @if($errors->has('nik'))
                <small class="text-danger">{{$errors->first('nik')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nama')?'is-invalid':''}}" id="nama" name="nama"
                    placeholder="Nama Lengkap" wire:model="nama" readonly>
                @if($errors->has('nama'))
                <small class="text-danger">{{$errors->first('nama')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tempat Lahir <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('tempat_lahir')?'is-invalid':''}}" id=""
                    name="tempat_lahir" placeholder="Silahkan memasukan kota/kab tempat lahir"
                    value="{{old('tempat_lahir')}}" wire:model="tempat_lahir">
                @if($errors->has('tempat_lahir'))
                <small class="text-danger">{{$errors->first('tempat_lahir')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="date" class="form-control {{$errors->has('tgl_lahir')?'is-invalid':''}}" name="tgl_lahir"
                    wire:model="tgl_lahir" readonly />
                @if($errors->has('tgl_lahir'))
                <small class="text-danger">{{$errors->first('tgl_lahir')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="pt-2">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="laki-laki">
                            <input type="radio" class="form-check-input" id="laki-laki" name="jk" value="laki-laki"
                                wire:model="jk">Laki-laki
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="perempuan">
                            <input type="radio" class="form-check-input" id="perempuan" name="jk" value="perempuan"
                                wire:model="jk">Perempuan
                        </label>
                    </div>
                </div>
                @if($errors->has('jk'))
                <small class="text-danger">{{$errors->first('jk')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Pekerjaan <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="pekerjaan_id" name="pekerjaan_id"
                    class="form-control {{$errors->has('pekerjaan_id')?'is-invalid':''}}" wire:model="pekerjaan_id">
                    <option value="">-- Pilih Salah Satu --</option>
                    @foreach($pekerjaan as $data)
                    <option value="{{$data->id}}">{{$data->nama}}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('pekerjaan_id'))
                <small class="text-danger">{{$errors->first('pekerjaan_id')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Alamat Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea class="form-control {{$errors->has('alamat')?'is-invalid':''}}" rows="3" id="" name="alamat"
                    placeholder="Masukkan alamat lengkap beserta RT/RW nya" wire:model="alamat" readonly></textarea>
                @if($errors->has('alamat'))
                <small class="text-danger">{{$errors->first('alamat')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Jumlah Tanggungan Keluarga <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="number" min="0" class="form-control {{$errors->has('jumlah_tanggungan')?'is-invalid':''}}"
                    id="" name="jumlah_tanggungan" placeholder="Jumlah orang yang ditanggung dalam keluarga"
                    value="{{old('jumlah_tanggungan')}}" wire:model="jumlah_tanggungan">
                @if($errors->has('jumlah_tanggungan'))
                <small class="text-danger">{{$errors->first('jumlah_tanggungan')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nominal Penghasilan Perbulan <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="number" min="0" class="form-control {{$errors->has('nominal')?'is-invalid':''}}" id=""
                    name="nominal" placeholder="Nominal angka" value="{{old('nominal')}}" wire:model="nominal">
                @if($errors->has('nominal'))
                <small class="text-danger">{{$errors->first('nominal')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="col-lg-12">
                <small class="w-100"> Keterangan: <span class="text-danger">*</span>) inputan wajib diisi </small>
                @if($user->unggahDokumen)
                <div class="spinner-grow text-dark float-right" role="status" wire:loading wire:target="store">
                </div>
                <button type="submit" id="tes" class="btn btn-gelap float-right" wire:click="store"
                    wire:loading.attr="disabled">KIRIM</button>
            </div>
            @endif
            <!-- <button id="reset" class="btn btn-danger" style="margin-left:5px;margin-right:5px;">Reset</button> -->
        </div>
    </form>
    @if($errors->all())
    <br>
    <div class="col-sm-12 alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss='alert'>
                <span>X</span>
            </button>
            Silahkan untuk cek kembali data yang anda masukan
        </div>
    </div>
    @endif
    <div class="line"></div>
</div>
