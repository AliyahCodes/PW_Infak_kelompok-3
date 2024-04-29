@extends('layouts.main')

@section('title', 'Edit Siswa')

@section('text', 'Edit Data Siswa')

@section('content')

    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Edit Data Siswa</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat mengedit data siswa
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('update.siswa', $siswa->id) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input type="number" class="form-control" name="nis" value="{{ $siswa->nis }}" placeholder="Masukkan NIS">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap" value="{{ $siswa->nama_lengkap }}" placeholder="Masukkan Nama Lengkap">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Rombel</label>
                                            <input type="text" class="form-control" name="rombel" value="{{ $siswa->rombel }}" placeholder="Masukkan Rombel">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Rayon</label>
                                            <input type="text" class="form-control" name="rayon" value="{{ $siswa->rayon }}" placeholder="Masukkan Rayon">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $siswa->email }}" placeholder="Masukkan Email">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>No Telepon Orang Tua</label>
                                            <input type="text" class="form-control" name="no_phone_orang_tua" value="{{ $siswa->no_phone_orang_tua }}" placeholder="Masukkan No Telepon Orang Tua">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="/data-siswa" class="btn btn-light">Kembali</a>
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
