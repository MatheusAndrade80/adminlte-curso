@extends('layouts.default')
@section('page-title', 'Adicionar Usuário')
@section('content')
<form action="{{route('users.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome</label>
        <input value="{{old('name')}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input value="{{old('email')}}" type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        <div id="emailHelp" class="form-text"></div>
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Senha</label>
        <input  type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('password')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        <div id="emailHelp" class="form-text"></div>
      </div>

    <button type="submit" class="btn btn-primary">Criar</button>
  </form>
@endsection