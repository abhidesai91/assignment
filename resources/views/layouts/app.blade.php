<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Contact List')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    @if(session('success'))
        <div id="success-message" class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                let message = document.getElementById("success-message");
                if (message) {
                    message.style.display = "none";
                }
            }, 3000);
        </script>
    @endif
    @yield('content')

</body>
</html>
