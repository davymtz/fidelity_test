<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/assets/css/bootstrap.css">
    <title>Login Catalogs</title>
</head>
<body>
    <div class="container">
        <div class="card mx-auto mt-5" style="width: 25rem;">
            <div class="card-header">Login</div>
            <div class="card-body">
            <div class="mb-3">
                    <label for="inputKind" class="form-label">Número de usuario</label>
                    <input type="text" class="form-control" id="inputKind" value="99" />
                </div>
                <div class="mb-3">
                    <label for="inputUser" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="inputUser" value="opHolcimMXWeb" />
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="inputPassword" value="0pV3W3bH0lMX%" />
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-success" id="submit_btn">Enviar</button>
            </div>
        </div>
    </div>
    <script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
    <script src="src/assets/js/bootstrap.js"></script>
    <script>
        $(document).ready(() => {
            $("#submit_btn").click(() => {
                let form = {
                    kind: $("#inputKind").val().trim(),
                    userName: $("#inputUser").val().trim(),
                    password: $("#inputPassword").val().trim()
                }
                console.log(form);
                $.post("login",form).done((data) => {
                    console.log(data);
                    if(data.message == "successfull") {
                        location.replace("/fidelity_test");
                    }
                }).fail((fail) => {
                    console.error(fail);
                });
            });
        });
    </script>
</body>
</html>