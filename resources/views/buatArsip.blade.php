@extends('layouts.app')
@section('title','Buat Arsip Baru')
@section('arsip','active')

@section('content')
<div class="container-fluid">
    <section class="bg-light p-5">
        <h3 class="pb-2">Buat Arsip Baru</h3>
        
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br/>
            @endforeach
        </div>
        @endif
    
        <form  method="POST" action="{{ route('daftarArsipBuatPost') }}" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 mt-4">
                <label for="nama" class="form-label">Judul</label>
                <input type="name" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
            </div>
            <div class="mb-3 mt-4">
                <label for="dari" class="form-label">Dari</label>
                <a class="" href="{{Route('dariArsipBuat')}}" data-toggle="tooltip" data-placement="top" title="Buat daftar dari baru"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-plus-square"></i>
                    <span></span>
                </a>
                <select id="select_dari" name="dari" class="form-control selectpicker" data-live-search="true">
                    <option value=""></option>
                    @foreach ($dariArsips as $index)
                        <option value="{{$index->nama}}" @if(old('dari') == $index->nama) selected @endif>{{$index->nama}}</option>    
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-4">
                <label for="tanggal" class="form-label">Tanggal Di Buat</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{old('tanggal')}}">
            </div>

            <div class="mb-3 mt-4">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" class="form-control-file" id="file" name="file" value="{{old('file')}}">
                <li>Tipe file docx,doc,pdf,png,jpeg,jpg</li>
            </div>
            
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
</div>

@endsection