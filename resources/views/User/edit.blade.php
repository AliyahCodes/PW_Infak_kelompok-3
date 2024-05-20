@extends('layouts.main')

@section('title', 'Edit User')

@section('text', 'Edit Data User')
    

@section('content')

<section class="section">
    <div class="section-body">
      <h2 class="section-title">Edit Data User</h2>
      <p class="section-lead">
        Di halaman ini Anda dapat mengedit data user 
    </p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

                <form action="{{ route('update.user', $user->id) }}" method="POST">
                  @method('PUT')
                  @csrf
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama </label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" placeholder="Masukan Nama" name="nama_lengkap" class="form-control" value="{{ $user->nama_lengkap }}">
                </div>
              </div>
           
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                <div class="col-sm-12 col-md-7">
                  <input type="email" placeholder="Masukan Email" name="email" class="form-control inputtags" value="{{ $user->email }}">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                <div class="col-sm-12 col-md-7">
                  <input type="password" name="password" placeholder="Masukan Password" class="form-control">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="role" value="{{$user->role}}" disabled placeholder="Masukan Password" class="form-control">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button type="submit" class="btn btn-primary">Update</button>
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
