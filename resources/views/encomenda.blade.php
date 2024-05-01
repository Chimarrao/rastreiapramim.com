<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Buscador de encomendas nos Correios. Rastreie suas encomendas de forma rápida e segura.">
    <meta name="keywords" content="SRO, rastreio, Correios, rastreamento de encomendas, rastreador de pacotes, serviço de rastreamento">
    <meta name="author" content="Lucas Reolon">
    <title>Rastreador de Encomendas dos Correios</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar is-link" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <strong>Rastreador Correios</strong>
                </a>
                <a class="navbar-burger" data-target="navbarBasicExample" role="button" aria-label="menu" aria-expanded="false">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu" id="navbarBasicExample">
                <div class="navbar-start">
                    <a class="navbar-item" href="/">
                        Início
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="section">
        <div class="container">
            <h1 class="title">Rastreador de Encomendas dos Correios</h1>
            <p class="subtitle">
                Utilize nossa ferramenta para rastrear suas encomendas de forma rápida e segura.
            </p>

            <div class="field has-addons">
                <div class="control is-expanded">
                    <input class="input" id="codigoRastreio" type="text" placeholder="Digite o código de rastreio">
                </div>
                <div class="control">
                    <button class="button is-link" id="buscarBtn">Buscar</button>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="container" id="rastreio">

        </div>
    </section>
    <script src="{{ asset('js/bundle.js') }}"></script>
</body>

</html>
