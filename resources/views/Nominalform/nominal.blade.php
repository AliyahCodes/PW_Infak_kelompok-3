{{-- @extends('Layouts.main')

@section('title', 'Nominal Perjanjian')

@section('content')

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
                                        <p class="mb-2">Maaf, Anda belum mengisi nominal perjanjian infak Anda. Untuk melanjutkan, kami memerlukan informasi ini. Silakan lengkapi formulir dengan jumlah nominal yang ingin Anda janjikan sebagai infak untuk setiap bulannya. Terima kasih atas kerja sama Anda.</p>
                                      </p>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Lengkapi Formulir Perjanjian Infak</button>
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
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
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
    </script>

@endsection --}}
