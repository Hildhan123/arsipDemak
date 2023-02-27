@extends('layouts.app')
@section('title','Daftar Akun')
@section('user','active')

@section('content')
<div class="container-fluid">
    @if(session()->has('berhasil'))
    <div class="alert alert-success la la-thumbs-up"> {{session()->get('berhasil')}} </div>
    @endif

    <section class="bg-light p-5">
        <h3 class="pb-2 text-bold">Daftar Akun</h3>
        <hr size="10" width="25%" align="left" color="white">

        @if(Auth::user()->role == 'admin')
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{Route('daftarBuat')}}" button class="btn btn-primary me-md-2" type="button">Tambah Akun</a>
            </div>
        @endif
            <br>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive" id="no-more-tables">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead align="center">
                        <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Terakhir Di Edit</th>
                        <th>Terakhir Di Buat</th>
                        @if(Auth::user()->role == 'admin')<th>Aksi</th>@endif
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 @endphp
                        @foreach ($daftarUser as $index)
                            <tr>
                                <td data-title="No">{{$no++}}</td>
                                <td data-title="Username">{{$index->name}}</td>
                                <td data-title="Email">{{$index->email}}</td>
                                <td data-title="Role">{{$index->role}}</td>
                                <td data-title="Terakhir Di Edit">{{$index->updated_at}}</td>
                                <td data-title="Terakhir Di Buat">{{$index->created_at}}</td>
                                @if(Auth::user()->role == 'admin')
                                    <td data-title="Aksi" align="center">
                                        <a href="{{Route('daftarEdit',['id'=>$index->id])}}"><i class="fas fa-edit"></i></a> | <a onclick="return confirm('Apakah anda yakin?')" href="{{Route('daftarDelete',['id'=>$index->id])}}"><i class="fas fa-trash" style="color: red"></i></a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection