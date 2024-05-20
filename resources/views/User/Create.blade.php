@extends('layouts.main')

@section('title', 'Create Petugas')

@section('text', 'Tambah data Petugas')
    

@section('content')

<section class="section">
    <div class="section-body">
      <h2 class="section-title">Tambah Petugas Baru</h2>
      <p class="section-lead">
        Di halaman ini Anda dapat menambahkan data petugas baru
    </p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

                <form action="{{route('create.user')}}" method="POST">
                  @csrf
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama </label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" placeholder="Masukan Nama" name="nama_lengkap" class="form-control">
                </div>
              </div>
           
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                <div class="col-sm-12 col-md-7">
                  <input type="email" placeholder="Masukan Email" name="email" class="form-control inputtags">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                <div class="col-sm-12 col-md-7">
                  <input type="password" name="password" placeholder="Masukan Password" class="form-control">
                </div>
              </div>

              {{-- <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="role" disabled value="admin" class="form-control">
                </div>
              </div> --}}

          
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button type="submit" class="btn btn-primary">Create</button>
                  <a href="/data-user" class="btn btn-primary">Kembali</a>
                </div>
              </div>

            </form>

         
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
