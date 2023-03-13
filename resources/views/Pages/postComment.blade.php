@include('Layout.nav')


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment Page</title>
    <style>
input{
    background-color:rgb(121, 230, 230);
}
    </style>
</head>
<body>
    <br><br><br>
    <form >
        @csrf
        <label for="comment">Write Comment:</label>
        <input type="text" id="comment" name="comment" placeholder="اكتب تعليقك هنا"><br>
            <input type="submit" value="send">
    </form>

</body>
</html>



@include('Layout.footer')

