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
        <form class="forms" method="post" action="{{route('wipsSave', ['wip' => $wip])}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <x-input type="text" name="item_name" placeholder="Item Name" value="{{$wip->item_name}}"/>
            </div>
            <div class="form-group">
                <label>Qty</label>
                <x-input type="number" name="qty" placeholder="Quantity" value="{{$wip->qty}}"/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <x-input type="text" name="description" placeholder="Description" value="{{$wip->description}}"/>
            </div>
            <div class="form-group">
                <div>
                    <label>Stage of Production</label>
                </div>
                <div>
                    Current stage of production: {{$wip->stage_of_production}}
                </div>
                <x-label>Preparation</x-label>
                <x-input type="radio" name="stage_of_production" value="Preparation"/>
                <x-label>Production</x-label>
                <x-input type="radio" name="stage_of_production" value="Production"/>
                <x-label>Quality Control</x-label>
                <x-input type="radio" name="stage_of_production" value="Quality Control"/>
                <x-label>Finishing and Distribution</x-label>
                <x-input type="radio" name="stage_of_production" value="Finishing and Distribution"/>
            </div>
            <div class="form-group">
                <label>ETA</label>
                <x-input type="date" name="eta" placeholder="ETA" value="{{$wip->eta}}"/>
            </div>
            <div class="form-group">
                <label>Total Cost</label>
                <x-input type="text" name="total_cost" placeholder="Total Cost" value="{{$wip->total_cost}}"/>
            </div>
            <div class="form-group">
                <label>Raw Materials</label>
                <x-input type="text" name="raw_materials" placeholder="Raw Materials" value="{{$wip->raw_materials}}"/>
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