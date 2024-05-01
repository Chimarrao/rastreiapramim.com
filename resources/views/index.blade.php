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

            <article class="message is-warning">
                <div class="message-body">
                    O Rastreamento rastreiapramim.com é uma ferramenta online sem custo, oferecida para facilitar a localização de encomendas usando o código identificador. Com ela, você pode verificar o status da entrega, saber onde sua encomenda está e entender as razões de eventuais atrasos.
                </div>
            </article>

            <article class="message is-info">
                <div class="message-body">
                    Utilize o Rastreamento rastreiapramim.com para uma maneira fácil e rápida de rastrear suas encomendas. Essa plataforma se conecta diretamente aos sistemas dos Correios para fornecer informações detalhadas de rastreamento, beneficiando tanto vendedores quanto consumidores finais.
                </div>
            </article>

            <article class="message is-info">
                <div class="message-body">
                    Para usar o Rastreamento rastreiapramim.com, insira o código de rastreamento fornecido pela loja no campo de busca e clique em "Consultar". Você será redirecionado para uma página que mostra a posição atual da sua encomenda em tempo real.
                </div>
            </article>

            <article class="message is-info">
                <div class="message-body">
                    Os Correios são uma instituição com longa história no Brasil, datando de 1663. Evoluíram de uma autarquia para uma empresa pública, modernizando o serviço postal brasileiro e introduzindo serviços como o SEDEX. Hoje, são responsáveis por uma vasta gama de produtos e serviços, presentes em todos os municípios brasileiros.
                </div>
            </article>

        </div>
    </section>
    <script src="{{ asset('js/bundle.js') }}"></script>
</body>

</html>
