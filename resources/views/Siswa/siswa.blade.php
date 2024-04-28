@extends('layouts.main')

@section('title', 'Data Siswa')
@section('text', 'Data Siswa')

@section('content')

<div class="card">
    <div class="card-header">
      <h4>User</h4>
      <div class="card-header-action">
        <a href="/siswa/create" class="btn btn-danger">Tambah Data <i class="fas fa-chevron-right"></i></a>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive table-invoice">
        <table class="table table-striped">
          <tr>
            <th>No</th>
            <th>Nisn</th>
            <th>Nama</th>
            <th>Rombel</th>
            <th>Rayon</th>
            <th>Nominal Infak</th>
            <th>Action</th>
          </tr>

          @foreach ($data as $item)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->nis}}</a></td>
            <td>{{$item->nama_lengkap}}</td>
            <td>{{$item->rombel}}</td>
            <td>{{$item->rayon}}</td>
            <td>{{$item->nominal_perjanjian}}</td>
            <td>
              <div class="btn-group">
                <a href="/siswa/{{$item->id}}/edit" class="btn btn-primary mt-2">Edit</a>
                <form action="{{ route('delete.siswa', $item->id) }}" method="POST" class="mt-2">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
</div>

@endsection
