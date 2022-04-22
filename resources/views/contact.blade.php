<h1>Contact Form</h1>
<form action="" method="post">
    @csrf
    Name : <input type="text" name="sname">
    <Br><Br>
    Course Interested :
    <select name="scourse">
        <option value="PHP">PHP</option>
        <option value="Laravel">Laravel</option>
    </select>
    <br><br>
    Message :
    <textarea name="smessage" id="" cols="30" rows="10"></textarea>
    <br><br>
    <input type="submit" name="submit" value="Send">
</form>
