@extends('layouts.main')

@section('title', 'dashboard Petugas')
@section('text', 'Halaman Transaksi')

@section('content')


    @if (auth()->user()->nominal_perjanjian == 0)

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
                                            </p>
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
                                                Rp <span class="rupiah"></span>
                                            </div>
                                        </div>
                                        <input type="text" name="nominal_perjanjian" class="form-control currency">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            window.onload = function() {
                @if (session('login_success')) // Periksa apakah login berhasil
                    $('#myModal').modal('show'); // Munculkan modal jika login berhasil
                @endif
            };

            function formatRibuan(angka) {
                return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

<<<<<<< HEAD
            document.querySelector('input[name="nominal_perjanjian"]').addEventListener('input', function() {
                let nominal = this.value;
=======
          @foreach ($data as $monthNumber => $monthName)
          <tr>
            <td>{{ $loop->iteration }}</td>
                <td></td>
                <td>{{ $monthName }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <a href="/admin/transaksi/store" class="btn btn-primary mt-2">Bayar</a>
              {{-- <form action="/User/delete/" method="POST"  class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-2">Hapus</button>
            </form> --}}
            </td>
          </tr>
          @endforeach
>>>>>>> 0d9ff5f5662ad81dd79c63387c38060fd4af40d5

                nominal = nominal.replace(/\./g, '');

                if (!isNaN(nominal)) {
                    this.value = formatRibuan(nominal);
                }
            });
        </script>
    @else
        <div class="card">
            <div class="card-header">
                <h4>User</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
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
                                <td></td>
                                <td>{{ $monthName }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="/User/edit/" class="btn btn-primary mt-2">Edit</a>
                                    <form action="/User/delete/" method="POST" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach



                    </table>
                </div>
            </div>

    @endif





@endsection
