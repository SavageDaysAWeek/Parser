@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/products">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product</li>
    </ol>
</nav>
<div class="card col-12 col-md-8 col-lg-6 col-xl-4 mx-auto">
    <div class="card-body">
        @if ($product->image)
        <img width="300" class="mx-auto" src="/storage/{{ $product->image }}" alt="{{ $product->name }}">
        @endif
        <h5 class="text-center my-3">{{ $product->name }}</h5>
        <ul class="list-group">
            <li class="list-group-item">Бренд: <strong>{{ $product->brand->name }}</strong></li>
            <li class="list-group-item">Стоимость: <strong>{{ $product->price }} &#8381;</strong></li>
            <li class="list-group-item">Размеры: <strong>{{ $product->dimensions }}</strong></li>
            <li class="list-group-item">Наличие: <strong>{{ $product->in_stock ? 'В наличии' : 'Отсутствует' }}</strong></li>
        </ul>
    </div>
</div>
@endsection
