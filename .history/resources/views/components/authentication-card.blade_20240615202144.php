<style>
    .bgd {
        background-image: url('/assets/img/background-abstract.png');
        background-size: cover;
        overflow: hidden;
        width: 100%;
        background-repeat: no-repeat;
        display: flex;
        justify-content: start;
        margin: 0;
    }

    .card-login {

        display: flex;
        background-color: #FFF;
        
        width: 1000px;
        height: 100VH;
        border-radius: 4px;
       
    }

    .form-login-card{
        width: 900px;
        display: grid;
        background-color: #FFF;
        place-items:  center;
        height: 100%;
    }

    .form-size{
        grid-template-rows: 50px 1fr 50px; /* Definindo as linhas do grid */
            grid-template-columns: 1fr; /* Definindo as colunas do grid */
            grid-template-areas: 
                "header"
                "content"
                "footer"; /* Definindo as áreas do grid */
            height: 100%;
    }
</style>

<div class=" bgd ">

    <div class="card-login">
        <div class="botao-voltar">
            <x-back-button />
        </div>
        <div class="form-login-card">

            {{ $slot }}
        </div>
    </div>
</div>
