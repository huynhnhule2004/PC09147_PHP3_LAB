<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('tieudetrang')</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container>header {
            height: 200px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
        }

        .container>nav {
            height: 60px;
        }

        .container>footer {
            height: 70px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container>main {
            display: flex;
            min-height: 500px;
            margin-top: 20px;
        }

        article {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        aside {
            padding: 20px;
            border-radius: 5px;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <span>WEBSITE TIN TỨC</span>
        </header>
        {{-- <nav class="bg-warning p-2"> --}}
            @include('client.menu')
        {{-- </nav> --}}
        <main>
            <article class="col-9">
                @yield('noidung')
            </article>
            <aside class="col-3 bg-info">
                <h5 class="text-white">THÔNG TIN BỔ SUNG</h5>
            </aside>
        </main>
        <footer class="bg-dark">
            PHÁT TRIỂN BỞI PC09147
        </footer>
    </div>
</body>

</html>
