<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <a class="header-group" href="{{ route('rawMaterialsView') }}">
                {{ __('Raw Materials') }}
            </a>
            <a class="header-group" href="{{ route('wipsView') }}">
                {{ __('WIPs') }}
            </a>
            <a class="header-group" href="{{ route('suppliesView') }}">
                {{ __('Supplies') }}
            </a>
            <a class="header-group" href="{{ route('finishedGoodsView') }}">
                {{ __('Finished Goods') }}
            </a>
        </x-slot>
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
        <form class="forms" method="post" action="{{route('finishedGoodsSave', ['finishedgood' => $finishedgood])}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <x-input type="text" name="item_name" placeholder="Item Name" value="{{$finishedgood->item_name}}"/>
            </div>
            <div class="form-group">
                <label>Qty</label>
                <x-input type="number" name="qty" placeholder="Quantity" value="{{$finishedgood->qty}}"/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <x-input type="text" name="description" placeholder="Description" value="{{$finishedgood->description}}"/>
            </div>
            <div class="form-group">
                <label>SKU</label>
                <x-input type="text" name="sku" placeholder="SKU" value="{{$finishedgood->sku}}"/>
            </div>
            <div class="form-group">
                <label>Total Sold</label>
                <x-input type="number" name="total_sold" placeholder="Total Sold" value="{{$finishedgood->total_sold}}"/>
            </div>
            <div class="form-group">
                <label>Cost</label>
                <x-input type="number" name="cost" placeholder="Cost" step="any" value="{{$finishedgood->cost}}"/>
            </div>
            <div class="form-group">
                <x-button>
                    <input type="submit" value="Save Item">
                </x-button>
            </div>
        </form>
    </x-app-layout>
</body>
</html>