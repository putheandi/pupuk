<div class="form-group row">
    <label for="" class="col-xl-2 col-form-label">Nama</label>
    <div class="col-xl-8">
        <input name="nama" type="text" value="{{ old('nama') ?? $user->nama }}" class="form-control"
               id="" placeholder="Nama" required autofocus>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
        <input name="username" type="text" value="{{ old('username') ?? $user->username }}"
               class="form-control" id="" required placeholder="username">
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">password</label>
    <div class="col-sm-10">
        <input name="password" type="password" value=""
               class="form-control" id="" required placeholder="password">
    </div>
</div>
