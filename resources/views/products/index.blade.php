@extends('layouts.app')

@section('content')
<table class="table table-striped">
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
        <tr>
            <td>
                <img src="/storage/{{ $product->image }}" alt="{{ $product->name }}">
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->brand->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->dimensions }}</td>
            <td>{{ $product->in_stock }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $products->links() }}
@endsection
