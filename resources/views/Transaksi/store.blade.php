@extends('layouts.main')

@section('title', 'Create User')

@section('text', 'Form Pembayaran')


@section('content')

    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Form Pembayaran</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat melakukan pembayaran
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route ('pembayaran.form')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Bank
                                            </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" placeholder="Masukan nama bank" name="nama_bank"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pemilik Bank</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" placeholder="Masukan nama pemilik bank" name="pemilik_bank"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nominal</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="number" placeholder="Masukan Nominal" name="nominal"
                                                    class="form-control inputtags">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Bukti Pembayaran
                                            </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input class="form-control" type="file" id="image" name="bukti_pembayaran">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Pembayaran
                                            </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input class="form-control" type="date"  name="tanggal_pembayaran">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bulan
                                            </label>
                                            <div class="col-sm-12 col-md-7">
                                                <select name="bulan" class="form-control">
                                                        @foreach ($semuaBulan as $nomorBulan => $namaBulan)
                                                            <option value="{{ $nomorBulan }}">{{ $namaBulan }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button type="submit" class="btn btn-primary">Bayar</button>
                                                <a href="/transaksi" class="btn btn-light">Kembali</a>
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
