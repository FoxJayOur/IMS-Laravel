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
            <a class="header-group" href="{{ route('visualization/inventory/view') }}">
                {{ __('Raw Materials') }}
            </a>
            <a class="header-group" href="{{ route('visualization/inventory/view') }}">
                {{ __('WIPs') }}
            </a>
            <a class="header-group" href="{{ route('visualization/inventory/view') }}">
                {{ __('Supplies') }}
            </a>
            <a class="header-group" href="{{ route('visualization/inventory/view') }}">
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
        <form class="forms" method="post" action="{{route('visualization/inventory/save', ['rawmaterial' => $rawmaterial])}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <x-input type="text" name="item_name" placeholder="Item Name" value="{{$rawmaterial->item_name}}"/>
            </div>
            <div class="form-group">
                <label>Qty</label>
                <x-input type="number" name="qty" placeholder="Quantity" value="{{$rawmaterial->qty}}"/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <x-input type="text" name="description" placeholder="Description" value="{{$rawmaterial->description}}"/>
            </div>
            <div class="form-group">
                <label>Supplier</label>
                <x-input type="text" name="supplier" placeholder="Supplier" value="{{$rawmaterial->supplier}}"/>
            </div>
            <div class="form-group">
                <label>Expiry Date</label>
                <x-input type="date" name="expiry_date" placeholder="Expiry Date" value="{{$rawmaterial->expiry_date}}"/>
            </div>
            <div class="form-group">
                <label>Storage Condition</label>
                <x-input type="text" name="storage_condition" placeholder="Storage Condition" value="{{$rawmaterial->storage_condition}}"/>
            </div>
            <div class="form-group">
                <label>Measurement</label>
                <x-input type="number" name="measurement" placeholder="Measurement" value="{{$rawmaterial->measurement}}"/>
            </div>
            <div class="form-group">
                <label>Cost</label>
                <x-input type="number" name="cost" placeholder="Cost" step="any" value="{{$rawmaterial->cost}}"/>
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