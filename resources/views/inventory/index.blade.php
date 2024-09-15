<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ route('inventory') }}" :active="request()->routeIs('inventory')">
                    {{ __('Inventory') }}
                </a>
            </h2>
        </x-slot>
        <div class="row">
            <div class="card">
                <i class="fa-solid fa-truck-ramp-box"></i>
                <div class="container">
                    <a href="{{route('rawMaterialsView')}}">
                        <h4><b>Allinal Productions Company</b></h4>
                        <p>Import and exportation of various materials and goods</p>
                    </a>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-truck-ramp-box"></i>
                <div class="container">
                    <h4><b>Czech Exportation</b></h4>
                    <p>Exportation of various materials and goods</p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-truck-ramp-box"></i>
                <div class="container">
                    <h4><b>Lance's Delivery Systems</b></h4>
                    <p>Point to point delivery of lance's amazing delivery systems</p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-truck-ramp-box"></i>
                <div class="container">
                    <h4><b>Pinkai POS</b></h4>
                    <p>POS company for friendly sari-sari stores in the Philippines</p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-truck-ramp-box"></i>
                <div class="container">
                    <h4><b>Ivan's Production Company</b></h4>
                    <p>Any and all goods produced locally for best results</p>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>