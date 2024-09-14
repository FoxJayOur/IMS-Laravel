<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <a class="header-group" href="{{ route('visualization/inventory/create') }}">
                {{ __('Raw Materials') }}
            </a>
            <a class="header-group" href="{{ route('visualization/inventory/create') }}">
                {{ __('WIPs') }}
            </a>
            <a class="header-group" href="{{ route('visualization/inventory/create') }}">
                {{ __('Supplies') }}
            </a>
            <a class="header-group" href="{{ route('visualization/inventory/create') }}">
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
        <div class="table-group">
            <table border="1">
                <tr class="title-group">
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Supplier</th>
                    <th>Expiry Date</th>
                    <th>Storage Condition</th>
                    <th>Measurement</th>
                    <th>Cost</th>
                </tr>
                @foreach($rawmaterials as $rawmaterial)
                    <tr class="data-group">
                        <td>{{$rawmaterial->id}}</td>
                        <td>{{$rawmaterial->item_name}}</td>
                        <td>{{$rawmaterial->qty}}</td>
                        <td>{{$rawmaterial->description}}</td>
                        <td>{{$rawmaterial->supplier}}</td>
                        <td>{{$rawmaterial->expiry_date}}</td>
                        <td>{{$rawmaterial->storage_condition}}</td>
                        <td>{{$rawmaterial->measurement}}</td>
                        <td>{{$rawmaterial->cost}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </x-app-layout>
</body>
</html>