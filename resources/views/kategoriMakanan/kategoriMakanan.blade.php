@extends('template.navbar')
@section('bagan')
<div class="container-fluid py-4">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-6 col-7">
              <h6>Kategori Makanan</h6>
              <p class="text-sm mb-0">
                <a href="{{ url('/kategori-makanan/tambah') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M454.04-454.54H228.08v-51.92h225.96v-225.96h51.92v225.96h225.96v51.92H505.96v225.96h-51.92v-225.96Z"/></svg>
                   Tambah Kategori Makanan</a>
                   @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                      <span class="text-sm">{{ session('success') }}</span>
                      <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                  @endif
                  @if (session()->has('edit'))
                    <div class="alert alert-warning alert-dismissible text-white" role="alert">
                      <span class="text-sm">{{ session('edit') }}</span>
                      <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                  @endif
                  @if (session()->has('danger'))
                    <div class="alert alert-primary alert-dismissible text-white" role="alert">
                      <span class="text-sm">{{ session('danger') }}</span>
                      <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                  @endif
              </p>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
            <div class="mt-3">
              {{ $categories->links() }}
            </div>
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kode Kategori</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $kategori)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center" style="margin-left: 8px;">
                        <span class="text-xs font-weight-bold"> {{ $loop->iteration }} </span>
                      </div>
                    </div>
                  </td>                                    
                  <td>
                    <span class="text-xs font-weight-bold"> {{ $kategori->kode }} </span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-xs font-weight-bold"> {{ $kategori->nama }} </span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-xs font-weight-bold"> {{ $kategori->keterangan }} </span>
                  </td>
                  <td class="align-middle text-center">
                    <form action="/kategori-makanan/delete" method="post">
                      @csrf
                      <a href="/kategori-makanan/{{ $kategori->id }}/ubah" class="btn btn-warning btn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                      </a>
                        <button type="submit" value="{{  $kategori->id  }}" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">
                          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                        </button>
                      </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>  
@endsection