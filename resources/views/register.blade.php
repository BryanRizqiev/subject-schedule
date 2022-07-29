<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="display: block;">   
    <form action="/storeReg" method="POST">
        @csrf
        <label for="class_id">Class_id</label>
        <input type="text" name="class-id" id="class_id">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="text" name="password" id="password">
        <button type="submit">Click</button>
        
    </form>
    </div>
</body>
</html>