@extends('layouts.app')
@section('title','Daftar Arsip')
@section('arsip','active')

@section('content')
<div class="container-fluid">
  @if(session()->has('berhasil'))
  <div class="alert alert-success la la-thumbs-up"> {{session()->get('berhasil')}} </div>
  @endif
  
    <section class="bg-light p-5">
        <h3 class="pb-2">Buat "Dari" Baru</h3>
        <hr size="10" width="25%" align="left" color="white">
        
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br/>
            @endforeach
        </div>
        @endif

        <form  method="POST" action="{{ route('dariArsipPost') }}">
            @csrf
            <div class="mb-3 mt-4">
                <label for="nama" class="form-label">Nama "Dari"</label>
                <input type="name" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Buat Baru</button>
            </div>
        </form>

        <br>
        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Perlihatkan semua daftar
        </button>
        <div class="collapse" id="collapseExample">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Dari</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1 @endphp
                        @foreach ($dariArsips as $index)
                        <tr>
                            <td data-title="No">{{$no++}}</td>
                            <td data-title="Judul">{{$index->nama}}</td>
                            <td data-title="Aksi" align="center">
                            <a onclick="return confirm('Apakah anda yakin?')" href="{{Route('dariArsipDelete',['id'=>$index->id])}}"><i class="fas fa-trash" style="color: red"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection