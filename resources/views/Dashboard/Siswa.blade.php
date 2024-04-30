@extends('layouts.main')

@section('title', 'dashboard Petugas')
@section('text', 'Selamat Datang, ' .auth()->user()->nama_lengkap) 

@section('content')

<section class="section">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>No. Rekening SMK Wikrama Bogor</h4>
            </div>
            <div class="card-body">
               <h6>111-33-0927425-9</h6> 
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Nominal Infak perbulan anda</h4>
            </div>
            <div class="card-body">
            <h6>Rp. 20000</h6>           
 </div>
          </div>
        </div>
      </div>
{{--       
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
         
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>User yang melakukan transaksi </h4>
            </div>
            <div class="card-body">
              {{$pembayaran}}
            </div>
          </div>
        </div> --}}
      </div>
    </div>
</div>

@endsection