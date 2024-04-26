@extends('layouts.main')

@section('title', 'Create User')

@section('text', 'Tambah data User')
    

@section('content')

<section class="section">
    <div class="section-body">
      <h2 class="section-title">Tambah User Baru</h2>
      <p class="section-lead">
        Di halaman ini Anda dapat menambahkan data user baru
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
                  <input type="text" placeholder="Masukan Nama" name="name" class="form-control">
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

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                <div class="col-sm-12 col-md-7">
                  <select name="role" id="role" class="custom-select w-100 mt-3">
                    <option value="1">Administrator</option>
                    <option value="2">petugas</option>
                </select>
                </div>
              </div>

          
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button type="submit" class="btn btn-primary">Create</button>
                  <a href="/User" class="btn btn-primary">Kembali</a>
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