<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .container-header{
            padding: 20px;
            background-color: blue;
            color:white;
        }
        .text-center{
            text-align: center;
        }
        .container-body{
            padding: 10px;
        }
       
    </style>
</head>


<body>
<div class="container-header">
    <h3 class="text-center ">Manage Student Follow-Up</h3>
</div>
<div class="container-body">
    <p>{{ $data['body'] }}</p>
</div>

</body>
</html>