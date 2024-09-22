<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body class="antialiased">
    <div>
        <button onclick="get()">GET</button>
    </div>
    <div id="ergebnis"></div>
    
    <script>
        function get(){
            var ergebnis = document.querySelector('#ergebnis');

            fetch('http://127.0.0.1:8000/api/cors', {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                }
            })
            .then(function(response) {
                response.headers.forEach(function(val, key) {
                    console.log(key + ' -> ' + val);
                });
                return response.json();
            })
            .then(function(myJson) {
                ergebnis.innerHTML = myJson.message;
            })
            .catch(function() {
                ergebnis.innerHTML = 'Zugriff verweigert!';
            });
        }
    </script>
</body>
</html>
