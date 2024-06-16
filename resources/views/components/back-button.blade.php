<style>
    .arrow-container {
        margin: 10px;
        width: 50px;
        /* Largura da div redonda */
        height: 50px;
        /* Altura da div redonda */
        background-color: #9D1221;
        /* Cor de fundo da div redonda */
        border-radius: 50%;
        /* Transforma a div em um círculo */
        display: flex;
        position: fixed;
        justify-content: center;
        align-items: center;
        position: relative;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        /* Efeito de sombra */
        cursor: pointer;
        transition: 0.4s;
    }

    .arrow-container:hover {
        background-color: white;
    }

    .arrow-svg {
        transition: 0.5s;
        width: 24px;
        /* Largura do ícone de seta */
        fill: white;
        /* Cor do ícone de seta */
    }



    .arrow-container:hover .arrow-svg {
        fill: #9D1221;
        /* Cor do ícone ao passar o mouse na div */
    }
</style>

<div class="arrow-container" title="voltar" onclick="window.history.back()">
    <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" fill="none" height="24" viewBox="0 0 24 24"
        width="24">
        <path
            d="M8.96216 6.34317L10.3731 7.76069L7.10283 11.0157L20.7079 11.0293L20.7059 13.0293L7.13814 13.0157L10.3533 16.2459L8.93571 17.6568L3.29211 11.9868L8.96216 6.34317Z" />
    </svg>
</div>
