<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="/css/app.css" rel="stylesheet">

</head>

<body>
    <div class="w-screen h-screen flex justify-center items-center bg-gray-100">
        <div class="p-8 w-1/2 bg-white border-2 border-gray-600 rounded-lg">
            <form action="/login" method="POST">
                @csrf
                <div class="flex flex-col items-stretch  justify-center mb-4 ">
                    <div class="flex flex-row items-baseline">
                        <label class="pb-1 text-lg" for="emil-input"> Email </label>
                        @error('email')
                        <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="text" value="{{ old('email') }}" id="email-input" name="email">
                </div>
                <div class="flex flex-col items-stretch  justify-center mb-4 ">
                    <div class="flex flex-row items-baseline">
                        <label class="pb-1 text-lg" for="password-input"> Password </label>
                        @error('password')
                        <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="password" id="password-input" name="password">
                </div>
                <div class="w-full flex flex-row items-center  justify-around mt-6 ">
                    <button class="w-1/3 py-2 rounded-lg bg-yellow-400" type="submit"> Login </button>
                    <a href="/register" class=" flex items-center  justify-around  w-1/3 text-yellow-600  py-2 rounded-lg border-2  border-yellow-400">
                        Register
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>