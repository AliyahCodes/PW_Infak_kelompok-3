<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    {{-- <link rel="stylesheet" href="{{asset('admin/css/components.css')}}"> --}}

   
    <style>
      /* Style untuk tampilan sebelum mencetak */
      body {
      width: 70%; /* Mengatur lebar body menjadi 50% dari lebar halaman */
      margin: 0 auto; /* Pusatkan body di tengah halaman */
      font-size: 15px; /* Ukuran font */
    }

        @media print {
      body {
      width: 70%; 
      margin: 0 auto; 
      font-size: 13px; 
    }

    .no-print {
            display: none;
        }

    }
  </style>

<div class="section-body">
    <div class="invoice">
      <div class="invoice-print">
        <div class="row">
          <div class="col-lg-12">
            <div class="invoice-title">
              <h2>Invoice</h2>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <address>
                  <strong>Di Verifikasi Oleh : {{$user->nama_lengkap}}
                  </strong><br>
                </address>
              </div>
              <div class="col-md-6 text-md-right">
                <address>
                  <strong>Siswa:</strong><br>
                  Nama : {{$pem->user->nama_lengkap}} <br>
                   Nis : {{$pem->user->nis}}<br>
                   Email : {{$pem->user->email}} <br>
                  Rombel : {{$pem->user->rombel}}<br>
                  Rayon : {{$pem->user->rayon}}
                </address>
              </div>
            </div>
            <div class="row">
            
              <div class="col-md-6 text-md-right">
                <address>
                  <strong>Tanggal Pembayaran: {{$pem->tanggal_pembayaran}}</strong><br>
                 <br><br>
                </address>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="section-title"><strong>Riwayat Pembayaran </strong></div>
            <div class="table-responsive">
              <table class="table table-striped table-hover table-md mt-2">
                <tr>
                  <th data-width="40">#</th>
                  <th>Nama Bank</th>
                  <th class="text-center">Pemilik Bank</th>
                  <th class="text-center">Nominal</th>
                  <th class="text-right">Bulan</th>
                  <th class="text-right">Status</th>
                </tr>
                 @php
                    $nomor = 1;
                @endphp

                <tr>
                  <td>{{$nomor}}</td>
                  <td> {{$pem->nama_bank}}</td>
                  <td class="text-center">{{$pem->pemilik_bank}}</td>
                  <td class="text-center">{{$pem->nominal}}</td>
                  <td class="text-center">{{$pem->bulan}}</td>
                  <td class="text-center">{{$pem->status}}</td>
                </tr>
               
              </table>
            </div>
            <div class="row mt-2">
              <div class="col-lg-8">
                <div class="section-title">Cara Pembayaran
                </div>
                <p class="section-lead">Transfer</p>
              </div>
              <div class="col-lg-4 text-right">
                <div class="invoice-detail-item">
                  <div class="invoice-detail-name">Bukti Pembayaran {{$pem->user->nama_lengkap}}</div>
                  <img src="{{asset('storage/bukti_pembayaran/'.$pem->bukti_pembayaran)}}"   alt="" width="100px" srcset="">
                </div>
               
            </div>
            </div>

            <div class="d-flex-justify-content-end">
              <div class="mt-5">
                <a href="/transaksi" class="btn btn-info no-print"><i class="fas fa-arrow-right"></i>Selesai</a>
              </div>
            </div>
            

<script type="text/javascript">
    window.print();

</script>