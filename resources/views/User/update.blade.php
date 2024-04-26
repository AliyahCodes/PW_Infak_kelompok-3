@extends('layouts.main')

@section('title', 'Data Produk')

@section('text', 'Edit data user')
    

@section('content')


<section class="section">
    <div class="section-body">
      <h2 class="section-title">Edit data user</h2>
      <p class="section-lead">
        Di halaman ini Anda dapat melakukan update data user    </p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

                <form action="{{route('update.user', $data['id'])}}" method="post">
                  @method('PATCH')
                  @csrf
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="name" value="{{$data->name}}" class="form-control">
                </div>
              </div>

           
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                <div class="col-sm-12 col-md-7">
                  <input type="email" name="email" value="{{$data->email}}"  class="form-control inputtags">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                <div class="col-sm-12 col-md-7">
                  <input type="password" name="password" value="" class="form-control">
                </div>
              </div>

              
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                <div class="col-sm-12 col-md-7">
                  <select name="role" id="role" class="custom-select w-100 mt-3">
                    <option value="admin">Administrator</option>
                    <option value="petugas">petugas</option>
                </select>
                </div>
              </div>


          
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button type="submit" class="btn btn-primary">Update</button>
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