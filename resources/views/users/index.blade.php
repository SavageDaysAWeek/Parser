@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
</nav>
<table class="table table-striped table-hover">
    <thead>
        <th>Имя</th>
        <th>Эл.почта</th>
        <th>Права</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr role="button"
        @if (Auth::user()->is_admin)
            onclick="document.location.href = '/dashboard/users/{{ $user->id }}/edit'"
        @else
            onclick="document.location.href = '/dashboard/users/{{ $user->id }}'"
        @endif
        >
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->is_admin ? 'Администратор' : 'Менеджер' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection
