import axios from 'axios';
import page from 'page';
import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', () => {
    const botaoBuscar = document.getElementById('buscarBtn') as HTMLButtonElement;
    const inputCodigo = document.getElementById('codigoRastreio') as HTMLInputElement;

    botaoBuscar.addEventListener('click', () => {
        const codigo = inputCodigo.value;
        if (codigo) {
            window.location.href = `/encomenda/${codigo}`;
        } else {
            Swal.fire({
                title: 'Atenção!',
                text: 'Por favor, digite um código de rastreio.',
                icon: 'warning',
                confirmButtonText: 'Ok'
            });
        }
    });
});

page('/encomenda/:codigo', async (ctx) => {
    const codigo = ctx.params.codigo;
    const rastreio = (document.getElementById('rastreio') as HTMLDivElement);

    rastreio.innerHTML = `<img src="/images/carteiro2.gif"></img>`
    setTimeout(async () => {
        const resultado = await buscarEncomenda(codigo);
        rastreio.innerHTML = ``;

        if (resultado.erro) {
            Swal.fire({
                title: 'Atenção!',
                text: resultado.erro,
                icon: 'warning',
                confirmButtonText: 'Ok'
            });

            return;
        }

        Object.values(resultado.resultado).forEach(movimentacao => {
            rastreio.innerHTML = rastreio.innerHTML +
                `<div class="card mt-3">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image is-48x48">
                                <img src="${(movimentacao as any).icone}" alt="Ícone de carteiro">
                            </figure>
                        </div>
                        <div class="media-content">
                            <p class="title is-5">${(movimentacao as any).status}</p>
                            <p class="subtitle is-6 mb-1">${(movimentacao as any).subStatus1}</p>
                            <p class="subtitle is-6">${(movimentacao as any).subStatus2}</p>
                            <p class="is-size-7">${(movimentacao as any).data} - ${(movimentacao as any).hora}</p>
                        </div>
                    </div>
                </div>
            </div>`;
        });
    }, 1000);
});

page.start()

async function buscarEncomenda(codigo: string) {
    let retorno;

    await axios.get(`/api/encomenda/${codigo}`)
        .then(response => {
            retorno = response.data;
        })
        .catch(error => {
            console.error('Erro ao buscar encomenda:', error);
        });

    return retorno;
}