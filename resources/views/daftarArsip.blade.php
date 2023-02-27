@extends('layouts.app')
@section('title','Daftar Arsip')
@section('arsip','active')

@section('content')
<div class="container-fluid">
  @if(session()->has('berhasil'))
  <div class="alert alert-success la la-thumbs-up"> {{session()->get('berhasil')}} </div>
  @endif
  
    <section class="bg-light p-5">
        <h3 class="pb-2">Daftar Arsip</h3>
        <hr size="10" width="25%" align="left" color="white">
        
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'user')
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="{{Route('daftarArsipBuat')}}" button  class="btn btn-primary me-md-2" type="button">Tambah Arsip</a>
          </div>
        @endif

          <br>
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="mb-3 mt-4">
              <label for="dari" class="form-label">Dari</label>
              <select id="select_dari" name="dari" class="form-control selectpicker" data-live-search="true" onchange="dari()">
                  <option value=""></option>
                  @foreach ($dariArsips as $index)
                      <option value="{{$index->nama}}" @if(old('dari') == $index->nama) selected @endif>{{$index->nama}}</option>    
                  @endforeach
              </select>
          </div>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead align="center">
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Dari</th>
                    <th>Tahun</th>
                    <th>File</th>
                    <th>Dibuat Oleh</th>
                    @if(Auth::user()->role != 'user')
                      <th>Terakhir Di Edit</th>
                      <th>Terakhir Di Buat</th>
                    @endif
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'user')<th>Aksi</th>@endif
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1 @endphp
                  @foreach ($daftarArsip as $index)
                  <tr>
                    <td data-title="No">{{$no++}}</td>
                    <td data-title="Judul">{{$index->nama}}</td>
                    <td data-title="Dari">{{$index->dari}}</td>
                    <td data-title="Tahun">@php $tahun = substr($index->tanggal,0,4) @endphp {{$tahun}}</td>
                    <td data-title="File"><a href="{{$index->file}}">Lihat File</a></td>
                    <td data-title="Dibuat Oleh">{{$index->name}}</td>
                    @if(Auth::user()->role != 'user')
                      <td data-title="Terakhir Di Edit">{{$index->updated_at}}</td>
                      <td data-title="Terakhir Di Buat">{{$index->created_at}}</td>
                    @endif
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'user')
                      <td data-title="Aksi" align="center">
                        <a href="{{Route('daftarArsipEdit',['id'=>$index->id])}}"><i class="fas fa-edit"></i></a> | <a onclick="return confirm('Apakah anda yakin?')" href="{{Route('daftarArsipDelete',['id'=>$index->id])}}"><i class="fas fa-trash" style="color: red"></i></a>
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