<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Typer Game</title>
    <script src="https://kit.fontawesome.com/8411b7fba2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body class="bg-info">
    <div class="container bg-light border rounded mt-5 pb-3">
        <div class="row">
            <h1 class="text-center mt-3 mb-5">Typer Game <i class="fas fa-keyboard"></i></h1>
        </div>
        <div class="row">
            <div class="col col-8 offset-2">
                <p class="text-justify" id="texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, autem nisi repellat reiciendis, maiores beatae obcaecati odio illum culpa nam eligendi ex quam cupiditate vel? Quisquam veritatis eaque architecto quaerat!</p>
            </div>
        </div>

        <div class="row">
            <div class="col col-8 offset-2">
                <ul class="list-group list-group-horizontal d-flex justify-content-end">
                    <li class="list-group-item list-group-item-info">
                        Texto:
                    </li>
                    <li class="list-group-item" id="palavras">
                        Palavras
                    </li>
                    <li class="list-group-item" id="caracteres">
                        Caracteres
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col col-8 offset-2">
                <textarea class="w-100 mt-3 mb-3" id="textarea" rows="10"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col col-6 offset-2">
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item list-group-item-info">
                        Digitado:
                    </li>
                    <li class="list-group-item" id="palavrasDigitadas">
                        0 Palavras
                    </li>
                    <li class="list-group-item" id="caracteresDigitados">
                        0 Caracteres
                    </li>
                    <li class="list-group-item list-group-item-success" id="sucesso" hidden>
                        <i class="fas fa-check"></i>
                    </li>
                </ul>
            </div>

            <div class="col col-2 d-flex justify-content-end">
                <button id="btnSave" class="btn btn-outline-success" hidden>
                    <i class="fas fa-save"></i>
                </button>
                <button id="btnRefresh" class="btn btn-outline-danger" hidden>
                    <i class="fas fa-redo"></i>
                </button>
            </div>
        </div>

    </div>

    <script>

        var texto = $("#texto").text()
        $("#palavras").text(texto.split(/\S+/).length - 1 + " Palavras");
        $("#caracteres").text(texto.length + " Caracteres");

        $("#textarea").on('input', function() {
            var textoDigitado = $("#textarea").val();
            $("#palavrasDigitadas").text(textoDigitado.split(/\S+/).length - 1 + " Palavras");
            $("#caracteresDigitados").text(textoDigitado.length + " Caracteres");
            if(texto == textoDigitado){
                readOnly("textarea", true);
                unHidden("sucesso");
                unHidden("btnSave");
                unHidden("btnRefresh");
            }
        })

        $("#btnRefresh").on('click', function(){
            refresh();
        });

        function hidden(id) { $(`#${id}`).attr('hidden', true) }
        function unHidden(id) { $(`#${id}`).removeAttr('hidden') }
        function readOnly(id, option) { $(`#${id}`).prop('readonly', option); }
        function refresh(){
            readOnly("textarea", false);
            //todo
            $("#texto").text("");
            $("#textarea").val("");
        }

    </script>

</body>
</html>
