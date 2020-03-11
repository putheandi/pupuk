<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Nama Jenis Paket</label>
    <div class="col-sm-10">
        <input name="nama" type="text" value="{{ old('nama') ?? $jenisPaket->nama }}" class="form-control"
               id="" placeholder="Nama Jenis Paket">
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Jumlah Isi</label>
    <div class="col-sm-10">
        <input name="jumlah_isi" type="text" value="{{ old('jumlah_isi') ?? $jenisPaket->jumlah_isi }}"
               class="form-control" id="" placeholder="Jumlah">
    </div>
</div>
