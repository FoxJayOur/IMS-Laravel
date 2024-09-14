<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ route('visualization/inventory/create') }}" :active="request()->routeIs('visualization/inventory/create')">
                    {{ __('Inventory') }}
                </a>
            </h2>
        </x-slot>
        <div class="card">
            <a class="card-group" href="{{route('visualization/inventory/create')}}">
                {{ __('Create') }}
            </a>
        </div>
        <div class="card">
            <a class="card-group" href="{{route('visualization/inventory/view')}}">
                {{ __('View') }}
            </a>
        </div>
        <div class="card">
            <a class="card-group" href="{{route('visualization/inventory/update')}}">
                {{ __('Update') }}
            </a>
        </div>
        <div class="card">
            <a class="card-group" href="{{route('visualization/inventory/delete')}}">
                {{ __('Delete') }}   
            </a>
        </div>
    </x-app-layout>
</body>
</html>