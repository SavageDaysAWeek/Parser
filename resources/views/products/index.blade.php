@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products</li>
    </ol>
</nav>
@if (Auth::user()->is_admin)
<div class="text-right mb-3">
    <a href="/dashboard/products/create" class="btn btn-primary">Добавить товар</a>
</div>
@endif
<table class="table table-striped table-hover">
    <thead>
        <th>Фото</th>
        <th>Название</th>
        <th>Бренд</th>
        <th>Стоимость</th>
        <th>Размеры</th>
        <th>Наличие</th>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr role="button"
        @if (Auth::user()->is_admin)
            onclick="document.location.href = '/dashboard/products/{{ $product->id }}/edit'"
        @else
            onclick="document.location.href = '/dashboard/products/{{ $product->id }}'"
        @endif
        >
            <td>
                <img height="50" src="/storage/{{ $product->image }}" alt="{{ $product->name }}">
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->brand->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->dimensions }}</td>
            <td>{{ $product->in_stock ? 'В наличии' : 'Нет в наличии' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>
@endsection
