<div class="container py-3">
<center><h3>Pengajuan Surat Keterangan Riwayat Tanah</h2></center>
    <div class="line"></div>
    <!-- content -->
    @include('notification.unggah')
    @if($user->unggahDokumen)
    <form id="mainform" method="post" enctype="multipart/form-data" wire:submit.prevent="update">
        {{csrf_field()}}
        <h4>Lampiran Persyaratan</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Tanah <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_surat_tanah')?'is-invalid':''}} "
                        name="file_surat_tanah" id="file_surat_tanah" wire:model="file_surat_tanah"
                        accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_surat_tanah'))
                    <small class="text-danger">{{$errors->first('file_surat_tanah')}}</small>
                    @endif
                    @if($file_surat_tanah)
                    <img src="{{asset('storage/backend/images/dokumen/skrt/surat_tanah/'.$file_surat_tanah)}}" alt=""
                        width="200px" height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>

            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pajak Tanah <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_surat_pajak_tanah')?'is-invalid':''}} "
                        name="file_surat_pajak_tanah" id="file_surat_pajak_tanah" wire:model="file_surat_pajak_tanah"
                        accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_surat_pajak_tanah'))
                    <small class="text-danger">{{$errors->first('file_surat_pajak_tanah')}}</small>
                    @endif
                    @if($file_surat_pajak_tanah)
                    <img src="{{asset('storage/backend/images/dokumen/skrt/surat_pajak_tanah/'.$file_surat_pajak_tanah)}}"
                        alt="" width="200px" height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pengantar RT/RW <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_sp_rtrw')?'is-invalid':''}} "
                        name="file_sp_rtrw" id="file_sp_rtrw" wire:model="file_sp_rtrw"
                        accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_sp_rtrw'))
                    <small class="text-danger">{{$errors->first('file_sp_rtrw')}}</small>
                    @endif
                    @if($file_sp_rtrw)
                    <img src="{{asset('storage/backend/images/dokumen/skrt/rtrw/'.$file_sp_rtrw)}}" alt="" width="200px"
                        height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pernyataan <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_surat_pernyataan')?'is-invalid':''}} "
                        name="file_surat_pernyataan" id="file_surat_pernyataan" wire:model="file_surat_pernyataan"
                        accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_surat_pernyataan'))
                    <small class="text-danger">{{$errors->first('file_surat_pernyataan')}}</small>
                    @endif
                    @if($file_surat_pernyataan)
                    <img src="{{asset('storage/backend/images/dokumen/skrt/surat_pernyataan/'.$file_surat_pernyataan)}}"
                        alt="" width="200px" height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>

            </div>
        </div>
        <div class="line"></div>
        <h4>Data Pemilik</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">NIK <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="nik_pemilik" id="nik"
                    class="form-control {{$errors->has('nik_pemilik')?'is-invalid':''}} " value="{{old('nik_pemilik')}}"
                    placeholder="Silahkan masukan nik pemilik tanah" wire:model="nik_pemilik" />
                @if($errors->has('nik_pemilik'))
                <small class="text-danger">{{$errors->first('nik_pemilik')}}</small>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="nama_pemilik" id="nama"
                    class="form-control {{$errors->has('nama_pemilik')?'is-invalid':''}} "
                    value="{{old('nama_pemilik')}}" placeholder="Silahkan masukan nama lengkap pemilik tanah"
                    wire:model="nama_pemilik" />
                @if($errors->has('nama_pemilik'))
                <small class="text-danger">{{$errors->first('nama_pemilik')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <h4>Riwayat 1</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="date" name="tgl_riwayat1" id="date"
                    class="form-control {{$errors->has('tgl_riwayat1')?'is-invalid':''}} "
                    value="{{old('tgl_riwayat1')}}" placeholder="Silahkan masukan nik pemilik tanah"
                    wire:model="tgl_riwayat1" />
                @if($errors->has('tgl_riwayat1'))
                <small class="text-danger">{{$errors->first('tgl_riwayat1')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tercatat Atas Nama <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="atas_nama1" id="nama"
                    class="form-control {{$errors->has('atas_nama1')?'is-invalid':''}} " value="{{old('atas_nama1')}}"
                    placeholder="Tercatat atas nama" wire:model="atas_nama1" />
                @if($errors->has('atas_nama1'))
                <small class="text-danger">{{$errors->first('atas_nama1')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <h4>Riwayat 2</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="date" name="tgl_riwayat2" id="date"
                    class="form-control {{$errors->has('tgl_riwayat2')?'is-invalid':''}} "
                    value="{{old('tgl_riwayat2')}}" wire:model="tgl_riwayat2" />
                @if($errors->has('tgl_riwayat2'))
                <small class="text-danger">{{$errors->first('tgl_riwayat2')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Balik Nama Kepada <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="atas_nama2" id="nama"
                    class="form-control {{$errors->has('atas_nama2')?'is-invalid':''}} " value="{{old('atas_nama2')}}"
                    placeholder="Balik nama kepada" wire:model="atas_nama2" />
                @if($errors->has('atas_nama2'))
                <small class="text-danger">{{$errors->first('atas_nama2')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Berdasarkan <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="" name="berdasarkan2" class="form-control {{$errors->has('berdasarkan2')?'is-invalid':''}} "
                    wire:model="berdasarkan2">
                    <option value="">Pilih Salah Satu
                    </option>
                    <option value="jual beli">Jual Beli
                    </option>
                    <option value="hibah">Hibah</option>
                    <option value="waris">Waris</option>
                </select>
                @if($errors->has('berdasarkan2'))
                <small class="text-danger">{{$errors->first('berdasarkan2')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <h4>Riwayat 3</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="date" name="tgl_riwayat3" id="date"
                    class="form-control {{$errors->has('tgl_riwayat3')?'is-invalid':''}} "
                    value="{{old('tgl_riwayat3')}}" wire:model="tgl_riwayat3" />
                @if($errors->has('tgl_riwayat3'))
                <small class="text-danger">{{$errors->first('tgl_riwayat3')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Balik Nama Kepada <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="atas_nama3" id="nama"
                    class="form-control {{$errors->has('atas_nama3')?'is-invalid':''}} " value="{{old('atas_nama3')}}"
                    placeholder="Balik nama kepada" wire:model="atas_nama3" />
                @if($errors->has('atas_nama3'))
                <small class="text-danger">{{$errors->first('atas_nama3')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Berdasarkan <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="" name="berdasarkan3" class="form-control {{$errors->has('berdasarkan3')?'is-invalid':''}}"
                    wire:model="berdasarkan3">
                    <option value="">Pilih Salah Satu
                    </option>
                    <option value="jual beli">Jual Beli
                    </option>
                    <option value="hibah">Hibah
                    </option>
                    <option value="waris">Waris
                    </option>
                </select>
                @if($errors->has('berdasarkan3'))
                <small class="text-danger">{{$errors->first('berdasarkan3')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <h4>Riwayat 4</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="date" name="tgl_riwayat4" id="date"
                    class="form-control {{$errors->has('tgl_riwayat4')?'is-invalid':''}}"
                    value="{{old('tgl_riwayat4')}}" wire:model="tgl_riwayat4" />
                @if($errors->has('tgl_riwayat4'))
                <small class="text-danger">{{$errors->first('tgl_riwayat4')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Balik Nama Kepada <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="atas_nama4" id="nama"
                    class="form-control {{$errors->has('atas_nama4')?'is-invalid':''}}" value="{{old('atas_nama4')}}"
                    placeholder="Balik nama kepada" wire:model="atas_nama4" />
                @if($errors->has('atas_nama4'))
                <small class="text-danger">{{$errors->first('atas_nama4')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Berdasarkan <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="" name="berdasarkan4" class="form-control {{$errors->has('berdasarkan4')?'is-invalid':''}}"
                    wire:model="berdasarkan4">
                    <option value="">Pilih Salah Satu
                    </option>
                    <option value="jual beli">Jual Beli</option>
                    <option value="hibah">Hibah</option>
                    <option value="waris">Waris</option>
                </select>
                @if($errors->has('berdasarkan4'))
                <small class="text-danger">{{$errors->first('berdasarkan4')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <h4>Data Tanah</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nomor Sertifikat <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="no_sertifikat" id="sppt"
                    class="form-control {{$errors->has('no_sertifikat')?'is-invalid':''}}"
                    value="{{old('no_sertifikat')}}" placeholder="Silahkan masukan nomor sertifikat tanah"
                    wire:model="no_sertifikat" />
                @if($errors->has('no_sertifikat'))
                <small class="text-danger">{{$errors->first('no_sertifikat')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nomor SPPT <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="no_sppt" id="sppt"
                    class="form-control {{$errors->has('no_sppt')?'is-invalid':''}}" value="{{old('no_sppt')}}"
                    placeholder="Silahkan masukan nomor sppt tanah" wire:model="no_sppt" />
                @if($errors->has('no_sppt'))
                <small class="text-danger">{{$errors->first('no_sppt')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Blok <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="blok" id="blok" class="form-control {{$errors->has('blok')?'is-invalid':''}}"
                    value="{{old('blok')}}" placeholder="Silahkan masukan blok tanah" wire:model="blok" />
                @if($errors->has('blok'))
                <small class="text-danger">{{$errors->first('blok')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Persil <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="persil" id="persil"
                    class="form-control {{$errors->has('persil')?'is-invalid':''}}" value="{{old('persil')}}"
                    placeholder="Silahkan masukan persil tanah" wire:model="persil" />
                @if($errors->has('persil'))
                <small class="text-danger">{{$errors->first('persil')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">No. Kohir/Kikitir/Girik <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="no_kihir" id="kokigi"
                    class="form-control {{$errors->has('no_kihir')?'is-invalid':''}}" value="{{old('no_kihir')}}"
                    placeholder="Silahkan masukan nomor kihir/kikitir/girik tanah" wire:model="no_kihir" />
                @if($errors->has('no_kihir'))
                <small class="text-danger">{{$errors->first('no_kihir')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Luas <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="luas" id="sppt" class="form-control {{$errors->has('luas')?'is-invalid':''}}"
                    placeholder="ukuran dalam skala m&sup2;" value="{{old('luas')}}" wire:model="luas" />
                @if($errors->has('luas'))
                <small class="text-danger">{{$errors->first('luas')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Alamat <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea name="alamat" class="form-control {{$errors->has('alamat')?'is-invalid':''}}"
                    placeholder="Silahkan masukan alamat lokasi tanah" wire:model="alamat"></textarea>
                @if($errors->has('alamat'))
                <small class="text-danger">{{$errors->first('alamat')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <h4>Batasan-Batasan</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Sebelah Utara <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="sebelah_utara" id="batasutara"
                    class="form-control {{$errors->has('sebelah_utara')?'is-invalid':''}}"
                    value="{{old('sebelah_utara')}}" placeholder="Silahkan masukan batas utara tanah"
                    wire:model="sebelah_utara" />
                @if($errors->has('sebelah_utara'))
                <small class="text-danger">{{$errors->first('sebelah_utara')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Sebelah Timur <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="sebelah_timur" id="batastimur"
                    class="form-control {{$errors->has('sebelah_timur')?'is-invalid':''}} "
                    value="{{old('sebelah_timur')}}" placeholder="Silahkan masukan batas timur tanah"
                    wire:model="sebelah_timur" />
                @if($errors->has('sebelah_timur'))
                <small class="text-danger">{{$errors->first('sebelah_timur')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Sebelah Selatan <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="sebelah_selatan" id="batasselatan"
                    class="form-control {{$errors->has('sebelah_selatan')?'is-invalid':''}}"
                    value="{{old('sebelah_selatan')}}" placeholder="Silahkan masukan batas selatan tanah"
                    wire:model="sebelah_selatan" />
                @if($errors->has('sebelah_selatan'))
                <small class="text-danger">{{$errors->first('sebelah_selatan')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Sebelah Barat <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="sebelah_barat" id="batasbarat"
                    class="form-control {{$errors->has('sebelah_barat')?'is-invalid':''}}"
                    value="{{old('sebelah_barat')}}" placeholder="Silahkan masukan batas barat tanah"
                    wire:model="sebelah_barat" />
                @if($errors->has('sebelah_barat'))
                <small class="text-danger">{{$errors->first('sebelah_barat')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <h4>Data Saksi 1</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">NIK <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="nik_saksi1" id="nik_saksi1"
                    class="form-control {{$errors->has('nik_saksi1')?'is-invalid':''}}" value="{{old('nik_saksi1')}}"
                    placeholder="Silahkan masukan nik data saksi" wire:model="nik_saksi1" />
                @if($errors->has('nik_saksi1'))
                <small class="text-danger">{{$errors->first('nik_saksi1')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="nama_saksi1" id="nama_saksi1"
                    class="form-control {{$errors->has('nama_saksi1')?'is-invalid':''}}" value="{{old('nama_saksi1')}}"
                    placeholder="Silahkan masukan nama data saksi" wire:model="nama_saksi1" />
                @if($errors->has('nama_saksi1'))
                <small class="text-danger">{{$errors->first('nama_saksi1')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <h4>Data Saksi 2</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">NIK <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="nik_saksi2" id="nik_saksi2"
                    class="form-control {{$errors->has('nik_saksi2')?'is-invalid':''}}" value="{{old('nik_saksi2')}}"
                    placeholder="Silahkan masukan nik data saksi" wire:model="nik_saksi2" />
                @if($errors->has('nik_saksi2'))
                <small class="text-danger">{{$errors->first('nik_saksi2')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="nama_saksi2" id="nama_saksi2"
                    class="form-control {{$errors->has('nama_saksi2')?'is-invalid':''}}" value="{{old('nama_saksi2')}}"
                    placeholder="Silahkan masukan nama data saksi" wire:model="nama_saksi2" />
                @if($errors->has('nama_saksi2'))
                <small class="text-danger">{{$errors->first('nama_saksi2')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="col-lg-12">
                <small class="w-100"> Keterangan: <span class="text-danger">*</span>) inputan wajib diisi </small>
                <div class="spinner-grow text-dark float-right" role="status" wire:loading wire:target="update">
                </div>
                <button type="submit" id="tes" class="btn btn-gelap float-right" wire:click="update"
                    wire:loading.attr="disabled">KIRIM</button>
            </div>
            <!-- <button id="reset" class="btn btn-danger" style="margin-left:5px;margin-right:5px;">Reset</button> -->
        </div>
    </form>
    @endif
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
    <div class="line" id="content-mobile"></div>
</div>
