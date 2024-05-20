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
                        <th>Nominal</th>
                        <th>Tanggal Bayar</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>

                    
                    @foreach ($students as $student )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$student->user->nama_lengkap}}</td>
							<td>{{$student->user->nis}}</td>
                            <td>{{$student->bulan}}</td>
                            <td>{{$student->user->nominal_perjanjian}}</td>
                            <td>
                                @if ($student->status == 'Belum dibayar')
                                    <p class="text-center">-</p>
                                @endif
                                {{$student->tanggal_pembayaran}}</td>
                            <td> 
                                @if ($student->status == 'Belum dibayar')
                                <a href="#" class="badge bg-danger text-white"  style="text-decoration: none;">{{$student->status}}</a>
                             @elseif ($student->status == 'Menunggu Verfikasi')
                               <a href="#" class="badge bg-warning text-white"  style="text-decoration: none;">{{$student->status}}</a>

                           @elseif ($student->status == 'Lunas')
                                <a href="#" class="badge bg-primary text-white"  style="text-decoration: none;">{{$student->status}}</a>
                            @else
                                <a href="#" class="badge bg-secondary text-white"  style="text-decoration: none;">{{$student->status}}</a>
                           @endif
                            </td>
                            <td>
                                @if ($student->status == 'Belum dibayar')
                                <a href="/admin/transaksi/create/{{$student['id']}}" class="btn btn-primary mt-2">Bayar</a>
                                @elseif ($student->status == 'Menunggu Verfikasi')
                                <a href="/admin/detail/{{$student['id']}}" class="btn btn-warning mt-2">Detail</a>

                                @elseif ($student->status == 'Verifikasi ditolak')
                                    <a href="/admin/transaksi/create/{{$student['id']}}" class="btn btn-primary mt-2">Bayar Ulang</a>
                                @else 
                                <a href="/export/pdf/{{$student['id']}}" target="_blank" class="btn btn-danger mt-2">Unduh</a>

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
