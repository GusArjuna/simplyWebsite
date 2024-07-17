@extends('template.navbar')
@section('bagan')
<div class="container-fluid py-4">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-6 col-7">
              <h6>Tambah Makanan</h6>
              <p class="text-sm mb-0">
                {{-- <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">30 done</span> this month --}}
              </p>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <form action="/makanan/tambah" method="post">
            @csrf
            <div class="container">
              <div class="row g-3 input-group input-group-outline">
                  <div class="col-md-3">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Kode Makanan</label>
                        <input type="text" class="form-control" id="kode" placeholder="" name="kode" value="{{ old('kode') }}" onkeyup="this.value = this.value.toUpperCase()" required autofocus>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Nama Makanan</label>
                        <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="{{ old('nama') }}" onkeyup="this.value = this.value.toUpperCase()" required autofocus>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                      <div class="input-group input-group-outline">
                        <select class="form-control" aria-label=".form-select-sm example" name="kategori_makanan_id" id="kategori_makanan_id">
                          <option value="">- Pilih Kategori Makanan -</option>
                          @foreach ($foodCategories as $kategoriMakanan)
                          <option {{ (old('kategori_makanan_id')==$kategoriMakanan->id)?"selected":"" }} value="{{ $kategoriMakanan->id }}">{{ $kategoriMakanan->kode }} - {{ $kategoriMakanan->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" placeholder="" name="harga" value="{{ old('harga') }}" onkeyup="this.value = this.value.toUpperCase()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" placeholder="" name="keterangan" value="{{ old('keterangan') }}" onkeyup="this.value = this.value.toUpperCase()" required>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    <button type="reset" class="btn btn-secondary mb-3">Reset</button>
                  </div>
              </div>
            </div>
          </form>
        </div>
      </div>  
@endsection