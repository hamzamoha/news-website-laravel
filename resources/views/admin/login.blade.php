<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login | Man News</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <script>const togglePassword = async (checked)=> document.querySelector("input[name='password']#password").setAttribute("type", checked?"text":"password")</script>
</head>
<body>
    <div class="min-h-screen pt-40 bg-slate-700 text-slate-200 relative">
        @if ($errors->has("error"))
        <div class="absolute top-5 left-1/2 -translate-x-1/2 border p-1 border-red-200 text-red-700 bg-red-100">{{ $errors->first("error") }}</div>
        @endif
        <form class="w-[650px] max-w-full mx-auto" action="{{ route('admin.index') }}" method="POST">
            @csrf
            <h3 class="pb-5 text-4xl text-center font-bold">Admin Login</h3>
            <div class="relative flex border rounded bg-slate-800 border-slate-600 my-6">
                <label class="text-slate-500 h-14 py-2 leading-10 w-12 text-center" for="username"><i class="fa-solid fa-user"></i></label>
                <input type="text" value="{{ old('username') }}" name="username" id="username" placeholder="Username" class="flex-1 h-14 py-2 leading-10 px-1 block bg-transparent outline-none">
                @if ($errors->has("username"))
                <div class="absolute text-sm leading-4 top-full left-0 w-full text-red-400">{{ $errors->first("username") }}</div>
                @endif
            </div>
            <div class="relative flex border rounded bg-slate-800 border-slate-600 my-6">
                <label class="text-slate-500 h-14 py-2 leading-10 w-12 text-center" for="password"><i class="fa-solid fa-key"></i></label>
                <input type="password" name="password" id="password" placeholder="Password" class="flex-1 h-14 py-2 leading-10 px-1 block bg-transparent outline-none">
                <label for="show" class="text-slate-500 h-14 py-2 leading-10 w-12 text-center">
                    <input onchange="togglePassword(this.checked)" class="peer hidden" type="checkbox" id="show">
                    <i class="peer-checked:inline-block hidden fa-regular fa-eye"></i>
                    <i class="peer-checked:hidden inline-block fa-regular fa-eye-slash"></i>
                </label>
                @if ($errors->has("password"))
                <div class="absolute text-sm leading-4 top-full left-0 w-full text-red-400">{{ $errors->first("password") }}</div>
                @endif
            </div>
            <div class="my-4">
                <button class="py-3 px-1 text-center text-sm rounded bg-emerald-800 hover:bg-emerald-700 block w-full">Login</button>
            </div>
        </form> 
    </div>
</body>
</html>