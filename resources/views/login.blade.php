<h1>Login</h1>
<form action="login_check" method="post">
    @csrf
    Email : <input type="email" name="e1">
    <br><br>
    Password : <input type="password" name="p1">
    <br><br>
    <input type="submit" value="Login">
</form>
