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
            @if(session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
        </div>
        <form class="forms" method="post" action="{{route('rawMaterialsStore')}}">
            @csrf
            @method('post')
            <div class="form-group">
                <label>Name</label>
                <x-input type="text" name="item_name" placeholder="Item Name" />
            </div>
            <div class="form-group">
                <label>Qty</label>
                <x-input type="number" name="qty" placeholder="Quantity" />
            </div>
            <div class="form-group">
                <label>Description</label>
                <x-input type="text" name="description" placeholder="Description" />
            </div>
            <div class="form-group">
                <label>Supplier</label>
                <x-input type="text" name="supplier" placeholder="Supplier" />
            </div>
            <div class="form-group">
                <label>Expiry Date</label>
                <x-input type="date" name="expiry_date" placeholder="Expiry Date" />
            </div>
            <div class="form-group">
                <label>Storage Condition</label>
                <x-input type="text" name="storage_condition" placeholder="Storage Condition" />
            </div>
            <div class="form-group">
                <label>Measurement</label>
                <x-input type="text" name="measurement" placeholder="Measurement" />
            </div>
            <div class="form-group">
                <label>Cost</label>
                <x-input type="number" name="cost" placeholder="Cost" step="any" />
            </div>
            <div class="form-group">
                <x-button>
                    <input type="submit" value="Store Item">
                </x-button>
            </div>
        </form>
    </x-app-layout>
</body>
</html>