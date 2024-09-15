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
            Supplies
        </div>
        <div class="table-group">
            <table border="1">
                <tr class="title-group">
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Usage Rates</th>
                    <th>Cost</th>
                    <th>Storage Requirements</th>
                </tr>
                @foreach($supplies as $supply)
                    <tr class="data-group">
                        <td>{{$supply->id}}</td>
                        <td>{{$supply->item_name}}</td>
                        <td>{{$supply->qty}}</td>
                        <td>{{$supply->usage_rates}}</td>
                        <td>{{$supply->cost}}</td>
                        <td>{{$supply->storage_requirements}}</td>
                        <td>
                            <x-button class="butn">
                                <a href="{{route('suppliesUpdate', ['supplies'=>$supply])}}">
                                    Update
                                </a>
                            </x-button>
                            <x-button class="butn">
                                <form method="post" action="{{route('suppliesDelete', ['supplies'=>$supply])}}">
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
                <a href="{{route('suppliesCreate')}}">
                    Create
                </a>
            </x-button>
        </div>
    </x-app-layout>
</body>
</html>