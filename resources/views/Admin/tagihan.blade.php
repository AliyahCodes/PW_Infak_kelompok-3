@extends('layouts.main')

@section('title', 'Tagihan Pembayaran')
@section('text', 'Tagihan Pembayaran all-user')

@section('content')

    
@if (auth()->user()->role == 'admin')
<div class="card">
 <div class="card-header">
     <h4>Tagihan Pembayaran</h4>
 </div>
 <div class="card-body p-0">
     <div class="table-responsive table-invoice">
         <table class="table table-striped">
             <tr>
                 <th>No</th>
                 <th>Nama</th>
                 <th>Nis</th>
                 <th>Rayon</th>
                 <th>Bulan</th>
                 <th>Nominal</th>
                 <th>status</th>
                 <th>Action</th>
             </tr>

             @if ($students->count ()>0)

             @foreach ($students as $student )
                 <tr>
                    <td>{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td>
                    <td>{{$student->user->nama_lengkap}}</td>
                     <td>{{$student->user->nis}}</td>
                     <td>{{$student->user->rayon}}</td>
                     <td>{{$student->bulan}}</td>
                     <td>{{$student->user->nominal_perjanjian}}</td>
                     <td>
                        <a href="#" class="badge bg-light"  style="text-decoration: none;">{{$student->status}}</a>
                     </td>
                     <td>
                          <a href="/admin/detail/{{$student->id}}" class="btn btn-primary mt-2">Detail</a>
                     </td>
                 </tr>
                 @endforeach

                 @else
                 <tr>
                    <td colspan="7">
                        <div class="badge text-danger d-flex justify-content-center" style="text-decoration: none;">Data Kosong</div>
                    </td>
                </tr>
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