<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Е-мэйл хаягаа баталгаажуулах.</h2>

        <div>
            Сайн байна уу? {{$name}}
            Манай системд бүртгүүлсэнд баярлалаа.
            Та доорх хаягаар орж баталгаажуулна уу.
            {{ URL::to('auth/confirm/' . $confirmation_code) }}.<br/>

        </div>

    </body>
</html>