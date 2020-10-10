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
    <div class="card-body">
        <h5 class="text-center my-3">{{ $user->name }}</h5>
        <ul class="list-group">
            <li class="list-group-item">Эл.почта: <strong>{{ $user->email }}</strong></li>
            <li class="list-group-item">Права: <strong>{{ $user->is_admin ? 'Администратор' : 'Менеджер' }}</strong></li>
        </ul>
    </div>
</div>
@endsection
