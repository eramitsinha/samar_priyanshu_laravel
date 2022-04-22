<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Registration</h1>
    <form action="" method="post">
        @csrf
        Name : <input type="text" name="n1" required>
        <br><br>
        Email : <input type="email" name="e1" id="">
        <br><br>
        Password : <input type="password" name="p1" id="">
        <br><br>
        Mobile No. : <input type="text" name="m1">
        <br><br>
        <input type="submit" name="submit" value="Register">
    </form>

    @if(isset($message))
        {{$message}}
    @endif

    <!-- validation error -->

        @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif


</body>
</html>
