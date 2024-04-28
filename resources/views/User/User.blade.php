@extends('layouts.main')

@section('title', 'Data Petugas')

@section('text', 'Data Petugas')
    

@section('content')

<div class="card">
    <div class="card-header">
      <h4>User</h4>
      <div class="card-header-action">
        <a href="/user/create" class="btn btn-danger">Tambah Data <i class="fas fa-chevron-right"></i></a>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive table-invoice">
        <table class="table table-striped">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
          </tr>

          @foreach ($data as $item)
            <tr>
            <td>{{$loop->iteration}}</a></td>
            <td>{{$item->nama_lengkap}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->role}}</td>
            <td>
              <div class="btn-group">
                <a href="/user/{{$item->id}}/edit" class="btn btn-primary mt-2">Edit</a>
                <form action="{{ route('delete.user', $item->id) }}" method="POST" class="mt-2">
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
