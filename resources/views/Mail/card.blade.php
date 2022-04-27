<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Информация о карте</title>
    <style>
        body{
            background: #f4f4f4
        }
        h2, h3, h4{
            color: #143B57;
};
        }
    </style>
</head>
<body style="text-align: center; background: #f4f4f4; color: #143B57; padding-top: 30px">
    <h2 class="text-center" style="text-align: center">Здравствуйте!</h2>
    <div class="my-2">
        <p></p>
       <h3 >{!! html_entity_decode($cardData['body']) !!} </h3>

    </div>

    <div style="padding-top: 20px">
       <h3>С уважением Администрация {{ $cardData['name']}} </h3>
    </div>
</body>
</html>
