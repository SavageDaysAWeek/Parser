@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/users">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">User</li>
    </ol>
</nav>
<div class="card col-12 col-md-8 col-lg-6 col-xl-4 mx-auto">
    <form action="/dashboard/users/{{ $user->id }}" method="POST" class="card-body">
        @csrf
        @if ($user->id)
        @method('PUT')
        @endif
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" required class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $user->name }}">
            @error('name')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Эл.почта</label>
            <input type="email" required class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $user->email }}">
            @error('email')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" value="1"
            @if ($user->is_admin)
            checked
            @endif
            id="is_admin1" name="is_admin" class="custom-control-input">
            <label class="custom-control-label" for="is_admin1">Администратор</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" value="0"
            @if (!$user->is_admin)
            checked
            @endif
            id="is_admin2" name="is_admin" class="custom-control-input">
            <label class="custom-control-label" for="is_admin2">Менеджер</label>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>
@endsection
