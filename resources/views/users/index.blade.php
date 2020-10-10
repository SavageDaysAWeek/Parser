@extends('layouts.app')

@section('content')
<table class="table table-striped">
    <thead>
        <th>Имя</th>
        <th>Эл.почта</th>
        <th>Права</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->is_admin ? 'Администратор' : 'Менеджер' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection
