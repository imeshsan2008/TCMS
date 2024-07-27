<!DOCTYPE html>
<html>
<head>
    <title>Exam Result Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        .result {
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <input type="number" id="score" placeholder="Enter your score" />
        <button onclick="generateResult()">Get Grade</button>
        <div id="result" class="result"></div>
    </div>

    <script>function generateResult() {
        var score = document.getElementById('score').value;
        var result = '';
    
        if (score >= 75) {
            result = 'A';
        } else 
        if (score >= 65) {
            result = 'B';
        }
         else if (score >= 55) {
            result = 'C';
        } else if (score >= 35) {
            result = 'S';
        } else {
            result = 'F';
        }
    
        document.getElementById('result').innerText = 'Your grade is: ' + result;
    }
    </script>
</body>
</html>
