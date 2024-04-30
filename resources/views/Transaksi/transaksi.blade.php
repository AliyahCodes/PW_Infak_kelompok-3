@extends('layouts.main')

@section('title', 'dashboard Petugas')
@section('text', 'Halaman Transaksi')

@section('content')

@if (auth()->user()->nominal_perjanjian == 0 && auth()->user()->role == 'user')
    <!-- Jika nominal perjanjian infak user adalah 0 -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="modal-dialog m-0" role="document">
                            <div class="modal-content">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Info !</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-2">Maaf, Anda belum mengisi nominal perjanjian infak Anda. Untuk
                                            melanjutkan, kami memerlukan informasi ini. Silakan lengkapi formulir dengan
                                            jumlah nominal yang ingin Anda janjikan sebagai infak untuk setiap bulannya.
                                            Terima kasih atas kerja sama Anda.</p>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal">Lengkapi Formulir Perjanjian Infak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal untuk mengisi formulir perjanjian infak -->
        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Isi form dibawah ini!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('nominal_form') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nominal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="text" name="nominal_perjanjian" class="form-control currency">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            @if (session('login_success')) // Periksa apakah login berhasil
                $('#exampleModal').modal('show'); // Munculkan modal jika login berhasil
            @endif
        };
    </script>
@else
    <!-- Jika nominal perjanjian infak user tidak sama dengan 0 -->
    <div class="card">
        <div class="card-header">
            <h4>Data Tagihan</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive table-invoice">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nis</th>
                        <th>Bulan</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>

                    
                    @foreach ($data as $monthNumber => $monthName)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{Auth::user()->nama_lengkap}}</td>
                            <td>{{ Auth::user()->nis }}</td>
                            <td>{{ $monthName }}</td>
                            <td>
                                @if ($loop->first)
                                    {{ $pembayaran->tanggal_pembayaran }}
                                @endif
                            </td>
                            <td>
                                {{ Auth::user()->nominal_perjanjian }}
                            </td>
                            <td>
                                @php
                                    $status = 'Belum dibayar';
                                @endphp
                                @foreach ($pembayarans as $pembayaran)
                                    @if ($pembayaran->status == 2)
                                        @php
                                            $status = 'Verifikasi di tolak';
                                        @endphp
                                    @elseif ($pembayaran->status == 1)
                                        @php
                                            $status = 'Lunas';
                                        @endphp

                                    @elseif ($pembayaran->status == 0)
                                        @php
                                            $status = 'Menunggu Verfikasi';
                                        @endphp
                                    @endif
                                @endforeach
                                {{ $status }}
                            </td>
                            <td>
                                @if ($status == 'Belum dibayar')
                                    <a href="/admin/transaksi/create" class="btn btn-primary mt-2">Bayar</a>
                                @elseif ($status == '1')
                                    <a href="/User/edit/{{ $monthNumber + 1 }}" class="btn btn-primary mt-2">Batal</a>
                                    {{-- <form action="/User/delete/{{ $monthNumber + 1 }}" method="POST" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-2">Download</button>
                                    </form> --}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endif

@endsection
