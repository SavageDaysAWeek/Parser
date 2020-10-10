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
    @if ($product->image)
    <img width="300" class="mx-auto" src="/storage/{{ $product->image }}" alt="{{ $product->name }}">
    @endif
    <form action="/dashboard/products/{{ $product->id }}" enctype="multipart/form-data" method="POST" class="card-body">
        @csrf
        @if ($product->id)
        @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" required class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $product->name }}">
            @error('name')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="brand">Бренд</label>
            <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id" id="brand">
                @foreach ($brands as $brand)
                <option
                    @if ($product->brand_id === $brand->id)
                    selected
                    @endif
                    value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
            @error('brand_id')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Стоимость</label>
            <input type="number" required class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ $product->price }}">
            @error('price')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="dimensions">Размеры</label>
            <input type="text" required class="form-control @error('dimensions') is-invalid @enderror" name="dimensions" id="dimensions" value="{{ $product->dimensions }}">
            @error('dimensions')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" value="1"
            @if ($product->in_stock)
            checked
            @endif
            id="inStock1" name="in_stock" class="custom-control-input">
            <label class="custom-control-label" for="inStock1">В наличии</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" value="0"
            @if (!$product->in_stock)
            checked
            @endif
            id="inStock2" name="in_stock" class="custom-control-input">
            <label class="custom-control-label" for="inStock2">Нет в наличии</label>
        </div>
        <div class="form-group mt-3">
            <label for="image">Изображение</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="image" placeholder="Выберите файл">
            @error('image')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
    @if ($product->id)
    <form class="text-center mb-3" action="/dashboard/products/{{ $product->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
    @endif
</div>
@endsection
