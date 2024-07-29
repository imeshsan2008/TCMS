<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p id="text"></p>
    <script>
       let num = 0;
        let p = document.getElementById('text').innerHTML;

        while (num < 100) {
            p=num;
            num++;
        }
    </script>
</body>
</html>