@extends('layouts.app')
@section('title','Buat Akun Baru')
@section('user','active')

@section('content')
<div class="container-fluid">
    <section class="bg-light p-5">
        <h3 class="pb-2">Buat Akun Baru</h3>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br/>
            @endforeach
        </div>
        @endif

        <form method="POST" action="{{Route('daftarBuatPost')}}">
          @csrf
            <div class="mb-3 mt-4">
                <label for="exampleInputUsername1" class="form-label">Username</label>
                <input type="name" name="name" id="name" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="{{ old('name') }}">
              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
              <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Role</label>
              <select name="role" id="role" class="form-control">
                <option value=""></option>
                <option value="admin" @if(old('role') == 'admin') selected @endif>Admin</option>
                <option value="bupati" @if(old('role') == 'bupati') selected @endif>Bupati</option>
                <option value="user" @if(old('role')  == 'user') selected @endif>User</option>
              </select>
              <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" id="password" required autocomplete="current-password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" id="password_confirmation" required autocomplete="current-password">
              </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
</div>
@endsection