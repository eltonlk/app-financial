<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <header>
            @if (Auth::check())
                <?php $menuConfig = [
                    'username' => Auth::user()->name,
                    'menus'    => [
                        [
                            'text'   => 'Bancos',
                            'url'    => route('admin.banks.index'),
                            'active' => isRouteActive('admin.banks.index')
                        ],
                        [
                            'text'      => 'Contas a pagar',
                            'subMenuId' => 'teste'
                        ],
                    ],
                    'subMenus' => [
                        [
                            'id'    => 'teste',
                            'items' => [
                                [
                                    'text'   => 'Bancos',
                                    'url'    => route('admin.banks.index'),
                                    'active' => isRouteActive('admin.banks.index')
                                ],
                                [
                                    'text' => 'Listar Contas',
                                    'url'  => '/listar',
                                ],
                            ],
                        ],
                    ],
                    'urlLogout' => env('URL_ADMIN_LOGOUT'),
                    'csrfToken' => csrf_token()
                ];
                ?>

                <admin-menu :config="{{ json_encode($menuConfig) }}"></admin-menu>
            @endif
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                    @ {{ date('Y') }} <a class="grey-text text-lighten-4" href="https://github.com/eltonlk">Elton Luis Kolling</a>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('build/admin.bundle.js') }}"></script>
</body>
</html>
