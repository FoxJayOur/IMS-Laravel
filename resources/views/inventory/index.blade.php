<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inventory</h1>
    <div>
        index
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link href="{{ route('visualization/inventory/create') }}" :active="request()->routeIs('visualization/inventory/create')">
            {{ __('Create') }}
        </x-nav-link>
    </div>
</body>
</html>