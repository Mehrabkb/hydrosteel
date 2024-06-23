<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خطای 419 - انقضای جلسه</title>
    <style>
        body {
            background-color: #f3f4f6;
            color: #2d3748;
            font-family: 'Vazir', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 3em;
            margin-bottom: 0.5em;
            color: #e53e3e;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 1.5em;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4299e1;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #2b6cb0;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v26.0.2/dist/font-face.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
    <h1>خطای 419</h1>
    <p>جلسه شما منقضی شده است. لطفاً صفحه را تازه‌سازی کرده و مجدداً تلاش کنید.</p>
    <a href="{{ url()->previous() }}">بازگشت</a>
</div>
</body>
</html>
