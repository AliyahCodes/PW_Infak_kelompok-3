@extends('layouts.main')

@section('title', 'Create User')

@section('text', 'Tambah data User')


@section('content')

    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Tambah Data Siswa</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat menambahkan data siswa
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{route('create.siswa')}}" method="POST">
                                @csrf

                                <div class="row">

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nis
                                            </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="number" placeholder="Masukan Nis" name="nis"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                                Lengkap </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" placeholder="Masukan Nama Lengkap" name="nama_lengkap"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rombel</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" placeholder="Masukan Rombel" name="rombel"
                                                    class="form-control inputtags">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rayon
                                            </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" placeholder="Masukan Rayon" name="rayon"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                      <div class="form-group row mb-4">
                                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email
                                          </label>
                                          <div class="col-sm-12 col-md-7">
                                              <input type="email" placeholder="Masukan email" name="email"
                                                  class="form-control">
                                          </div>
                                      </div>
                                  </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Telepon Ayah/Ibu </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" placeholder="Masukan No Telepon Orang Tua"
                                                    name="no_phone_orang_tua" class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    {{-- <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                <div class="col-sm-12 col-md-7">
                  <select name="role" id="role" class="custom-select w-100 mt-3">
                    <option value="1">Administrator</option>
                    <option value="2">petugas</option>
                </select>
                </div>
              </div> --}}

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button type="submit" class="btn btn-primary">Create</button>
                                                <a href="/data-siswa" class="btn btn-light">Kembali</a>
                                            </div>
                                        </div>
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
