@extends('layouts.main')

@section('title', 'dashboard Petugas')
@section('text', 'Halaman Transaksi')

@section('content')

@if (auth()->user()->role == 'admin')
       <div class="card">
        <div class="card-header">
            <h4>Data Transaksi</h4>
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

                    @if ($students->count() > 0)
                    @foreach ($students as $student )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$student->user->nama_lengkap}}</td>
							<td>{{$student->user->nis}}</td>
                            <td>{{$student->bulan}}</td>
                            <td>{{$student->tanggal_pembayaran}}</td>
                            <td>{{$student->nominal}}</td>
                            <td>
                                @if ($student->status == 'Menunggu Verfikasi')
                                 <a href="/admin/detail/{{$student->id}}" class="btn btn-primary mt-2">Detail</a>
                                @else
                                    <a href="/export/pdf/{{$student->id}}" class="btn btn-danger mt-2">Unduh</a>
                                @endif
                                  
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <td colspan="7">
                            <div class="badge text-danger d-flex justify-content-center" style="text-decoration: none;">Data Kosong</div>
                        </td>
                        @endif
                </table>
            </div>
        </div>
    </div>
@endif

<div>
    {{ $students->links() }}
</div>
    

@endsection
