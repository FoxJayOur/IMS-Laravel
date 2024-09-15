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
        <form class="forms" method="post" action="{{route('suppliesSave', ['supplies' => $supplies])}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <x-input type="text" name="item_name" placeholder="Item Name" value="{{$supplies->item_name}}"/>
            </div>
            <div class="form-group">
                <label>Qty</label>
                <x-input type="number" name="qty" placeholder="Quantity" value="{{$supplies->qty}}"/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <x-input type="text" name="description" placeholder="Description" value="{{$supplies->description}}"/>
            </div>
            <div class="form-group">
                <label>Usage Rates</label>
                <x-input type="text" name="usage_rates" placeholder="Usage Rates" value="{{$supplies->usage_rates}}"/>
            </div>
            <div class="form-group">
                <label>Cost</label>
                <x-input type="number" name="cost" placeholder="Cost" value="{{$supplies->cost}}"/>
            </div>
            <div class="form-group">
                <label>Storage Requirements</label>
                <x-input type="text" name="storage_requirements" placeholder="Storage Requirements" value="{{$supplies->storage_requirements}}"/>
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