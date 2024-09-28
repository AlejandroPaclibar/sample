<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1 class="text-4xl">Log In</h1>

   <form action="{{route('login.sud')}}" method="POST">
    @csrf

  <div class="mb-2">
    <label for="">Username</label>
    <input type="text" class='border-2 border-black' name="user">
  </div>
  <div>
    <label for="">Password</label>
    <input type="password" class='border-2 border-black' name="password">
  </div>

  <button class="bg-blue-600 text-white py-2 px-2" type="submit">Login</button>
   </form>
</body>
</html>