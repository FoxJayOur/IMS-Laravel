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
        <div style="margin-left: 80px; margin-top: 10px">
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
            @endif
            @if (session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
            @if (session()->has('delete'))
                <div>
                    {{session('delete')}}
                </div>
            @endif
        </div>
        <div class="inventory-area">
            Finished Goods
        </div>
        <div class="table-group">
            <table border="1">
                <tr class="title-group">
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>SKU</th>
                    <th>Total Sold</th>
                    <th>Cost</th>
                </tr>
                @foreach($finishedgoods as $finishedgood)
                    <tr class="data-group">
                        <td>{{$finishedgood->id}}</td>
                        <td>{{$finishedgood->item_name}}</td>
                        <td>{{$finishedgood->qty}}</td>
                        <td>{{$finishedgood->description}}</td>
                        <td>{{$finishedgood->sku}}</td>
                        <td>{{$finishedgood->total_sold}}</td>
                        <td>{{$finishedgood->cost}}</td>
                        <td>
                            <x-button class="butn">
                                <a href="{{route('finishedGoodsUpdate', ['finishedgood'=>$finishedgood])}}">
                                    Update
                                </a>
                            </x-button>
                            <x-button class="butn">
                                <form method="post" action="{{route('finishedGoodsDelete', ['finishedgood'=>$finishedgood])}}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="DELETE">
                                </form>
                            </x-button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="create">
            <x-button>
                <a href="{{route('finishedGoodsCreate')}}">
                    Create
                </a>
            </x-button>
        </div>
    </x-app-layout>
</body>
</html>