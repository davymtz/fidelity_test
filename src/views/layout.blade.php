<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/assets/css/bootstrap.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <title>Fidelity Test</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Catálogos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-4">
                        <select class="form-select" aria-label="Todos los catálogos" id="get_catalogs">
                            <option value="">Todos los catálogos</option>
                        </select>
                    </li>
                    <li class="nav-item me-4">
                        <select class="form-select" aria-label="Todos los catálogos" id="get_prize_categories">
                            <option value="">Todas las categorías</option>
                        </select>                        
                    </li>
                    <li class="nav-item me-4">
                        <label for="amount">
                            Price range:
                            <span id="amount" style="border:0; color:#f6931f; font-weight:bold;"></span>
                        </label>
                        <div id="slider-range"></div>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>
                <!-- <button class="btn btn-outline-success" type="submit">Cerrar sesión</button> -->
            </div>
            </div>
        </nav>
        @yield("content")
    </div>
    <script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"
    integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c="
    crossorigin="anonymous"></script>
    <script src="src/assets/js/bootstrap.js"></script>
    @stack('dynamic_script')
</body>
</html>