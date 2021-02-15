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
    <script type="text/javascript" src="js/lerolero.js"></script>

</head>
<body class="bg-info" style="overflow: scroll">
    <div class="container bg-light border rounded mt-5 mb-5 pt-5 pb-5">
        <div class="row">
            <h1 class="text-center mb-5">Typer Game <i class="fas fa-keyboard"></i></h1>
        </div>
        <div class="row">
            <div class="col col-lg-8 offset-lg-2">
                <p class="text-justify" id="texto"></p>
            </div>
        </div>

        <div class="row">
            <div class="col col-lg-8 offset-lg-2">
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
            <div class="col col-lg-8 offset-lg-2">
                <textarea class="w-100 mt-3 mb-3" id="textarea" rows="10"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col col-lg-6 offset-lg-2">
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
                    <li class="list-group-item" id="segundosDigitados">
                        <span id="segundos">0</span> Segundos
                    </li>
                    <li class="list-group-item list-group-item-success" id="sucesso" hidden>
                        <i class="fas fa-check"></i>
                    </li>
                </ul>
            </div>

            <div class="col col-lg-2 d-flex justify-content-end">
                <form action="/" method="POST" id="formNome" hidden>
                    @csrf
                    <input type="text" name="nome" id="inputNome" style="width: 75%" placeholder="Seu Nome" required>
                    <button id="btnSubmit" class="btn btn-outline-success" style="height: 100%">
                        <i id="iconSave" class="fas fa-save"></i>
                    </button>
                </form>
                <button id="btnSave" class="btn btn-outline-success" hidden>
                    <i id="iconSave" class="fas fa-save"></i>
                </button>
                <button id="btnRefresh" class="btn btn-outline-danger" hidden>
                    <i class="fas fa-redo"></i>
                </button>
            </div>
        </div>

        @if (!$players->isEmpty())
        <div class="row mt-3">
            <div class="col col-2 offset-5 text-center">
                <button id="seta" class="btn btn-lg btn-primary rounded-circle" onclick="exibicaoPlacar()" data-toggle="tooltip" data-placement="top" title="Ocultar Placar">
                    <i id="iconSeta" class="fas fa-arrow-up"></i>
                </button>
            </div>

        </div>

        <div id="placar">
            <hr class="mt-5 mb-5">

            <div class="row">
                <div class="col col-12 text-center">
                    <h1>Placar <i class="fas fa-star"></i></h1>
                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 offset-lg-2 mt-3">
                    <ul class="list-group">
                        <li class="list-group-item active"> <b>Nome</b> </li>
                        @foreach ($players as $player)
                        <li class="list-group-item">{{ $player->nome }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col col-lg-2 mt-3">
                    <ul class="list-group">
                        <li class="list-group-item active"> <b>Tempo</b> </li>
                        @foreach ($players as $player)
                        <li class="list-group-item">{{ $player->tempo }} segundos</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        @endif
    </div>

    <script>

        var texto = leroLero(2);
        $("#texto").text(texto);
        $("#texto").append($('<i onclick="mudarFrase()" class="fas fa-random p-1 float-left"></i>'));

        $(document).ready(function (){

            $('[data-toggle="tooltip"]').tooltip();

            $("#seta").mouseenter(function(){
                $("#seta").tooltip('show');
            });
            $("#iconSeta").mouseenter(function(){
                $("#seta").tooltip('show');
            });

            contadoresTexto();
            contadoresTextArea();
            contadoresTempo();

            $("#btnRefresh").click(function(){
                refresh();
            });

            $("#btnSave").click(function(){
                save();
            });
            $("#btnSave").one("click", function(){
                criar();
            });

            $("#textarea").bind('paste', function(e) {
                e.preventDefault();
            });

        });

        function contadoresTexto(){
            $("#palavras").text(texto.split(/\S+/).length - 1 + " Palavras");
            $("#caracteres").text(texto.length + " Caracteres");
        }

        function contadoresTextArea(){
            $("#palavrasDigitadas").text("0 Palavras");
            $("#caracteresDigitados").text("0 Caracteres");

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
        }

        function contadoresTempo(){
            $("#textarea").one('focus', function(){
                var tempo = $("#segundos").text();
                var interval = setInterval(() => {
                    if($("#textarea").val() == texto){
                        clearInterval(interval);
                    } else {
                        $("#segundos").text(++tempo);
                    }
                }, 1000);
            });
        }

        function hidden(id) { $(`#${id}`).attr('hidden', true) }
        function unHidden(id) { $(`#${id}`).removeAttr('hidden') }
        function readOnly(id, option) { $(`#${id}`).prop('readonly', option); }

        function refresh(){
            readOnly("textarea", false);
            $("#textarea").val("");
            hidden('sucesso');
            hidden("btnSave");
            hidden("btnRefresh");
            hidden("inputNome");
            $("#segundos").text(0)
            contadoresTexto();
            contadoresTextArea();
            contadoresTempo();
        }

        function save(){
            hidden("btnRefresh")
            unHidden("inputNome");
            $("#iconSave").toggleClass("fa-save");
            $("#iconSave").toggleClass("fa-check");
            hidden("btnSave");
            unHidden("formNome");
        }

        function criar(){
            var inputTempo = $("<input>").attr("name", "tempo").attr("hidden", true).attr("value", $("#segundos").text());
            $("#formNome").append(inputTempo);
        }

        function scrollPlacar(){
            $(window).scrollTop($("#placar").offset().top);
        }

        function exibicaoPlacar(){
            $("#placar").stop().slideToggle(1000);
            $("#iconSeta").toggleClass("fa-arrow-up");
            $("#iconSeta").toggleClass("fa-arrow-down");
            $('#seta').attr("data-bs-original-title", ($('#seta').attr('data-bs-original-title') == "Exibir Placar") ? "Ocultar Placar" : "Exibir Placar" );
        }

        function mudarFrase(){
            texto = leroLero(2);
            $("#texto").text(texto)
            refresh();
            $("#texto").append($('<i onclick="mudarFrase()" class="fas fa-random p-1 float-left"></i>'));
        };

    </script>

    @if ($_SERVER["REQUEST_METHOD"] == "POST")
        {!! "<script> scrollPlacar() </script>" !!}
    @endif

</body>
</html>
