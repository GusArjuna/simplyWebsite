@extends('template.navbar')
@section('bagan')
<div class="container-fluid py-4">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-6 col-7">
              <h6>List Semua Makanan</h6>
              <p class="text-sm mb-0">
                <i class="fa fa-solid fa-arrow-up text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">Top 15</span> Makanan Terenak
              </p>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
            <div class="mt-3">
              {{ $foods->links() }}
            </div>
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kode Makanan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Makanan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori Makanan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Makanan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($foods as $makanan)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center" style="margin-left: 8px;">
                          <span class="text-xs font-weight-bold"> {{ $loop->iteration }} </span>
                        </div>
                      </div>
                    </td>                                    
                    <td>
                      <span class="text-xs font-weight-bold"> {{ $makanan->kode }} </span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> {{ $makanan->nama }} </span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-xs font-weight-bold"> {{ $makanan->kategoriMakanan->nama }} </span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-xs font-weight-bold"> {{ $makanan->harga }} </span>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>  
@endsection