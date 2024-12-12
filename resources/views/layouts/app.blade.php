<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .boton {
        @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }
        .enlace {
        @apply font-medium text-gray-700 underline decoration-pink-500
        }
        label{
            @apply block uppercase text-slate-700 mb-2
        }
        input,textarea{
            @apply shadow-sm appearance-none border w-full py-1 px-3 text-slate-700 leading-tight focus:outline-none
        }
        .errores{
            @apply text-red-500
        }
    </style>
    {{-- blade-formatter-enable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="mb-4 text-2xl">@yield('title')</h1>
    <div>
        @yield('content')
    </div>
    @yield('js')
</body>
</html>
