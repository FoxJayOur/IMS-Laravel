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
            Work in Progress
        </div>
        <div class="table-group">
            <table border="1">
                <tr class="title-group">
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Stage of Production</th>
                    <th>ETA</th>
                    <th>Total Cost</th>
                    <th>Raw Materials</th>
                </tr>
                @foreach($wips as $wip)
                    <tr class="data-group">
                        <td>{{$wip->id}}</td>
                        <td>{{$wip->item_name}}</td>
                        <td>{{$wip->qty}}</td>
                        <td>{{$wip->description}}</td>
                        <td>{{$wip->stage_of_production}}</td>
                        <td>{{$wip->eta}}</td>
                        <td>{{$wip->total_cost}}</td>
                        <td>{{$wip->raw_materials}}</td>
                        <td>
                            <x-button class="butn">
                                <a href="{{route('wipsUpdate', ['wip'=>$wip])}}">
                                    Update
                                </a>
                            </x-button>
                            <x-button class="butn">
                                <form method="post" action="{{route('wipsDelete', ['wip'=>$wip])}}">
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
                <a href="{{route('wipsCreate')}}">
                    Create
                </a>
            </x-button>
        </div>
    </x-app-layout>
</body>
</html>