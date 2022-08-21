<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{var_dump($orders)}}
    
    <p style="color: red">{{var_dump($orders[0]['order_details'][0]['product_id'])}}</p>
    
    
</body>
</html>