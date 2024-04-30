@extends('layouts.main')

@section('title', 'dashboard Petugas')
@section('text', 'Halaman Transaksi')

@section('content')

@if (auth()->user()->role == 'admin')
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
                        <th>Action</th>
                    </tr>
                    @foreach ($students as $student )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$student->user->nama_lengkap}}</td>
							<td>{{$student->user->nis}}</td>
                            <td>{{$student->bulan}}</td>
                            <td>{{$student->tanggal_pembayaran}}</td>
                            <td>{{$student->nominal}}</td>
                            <td>
                                    <a href="/admin/detail/{{$student->user_id}}" class="btn btn-primary mt-2">Detail</a>
                                    {{-- <a href="/User/edit" class="btn btn-primary mt-2">Batal</a>
                                    <form action="/User/delete" method="POST" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-2">Unduh</button>
                                    </form> --}}
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@endif

@endsection
