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

    .form-login-card {
        width: 900px;
        display: grid;
        background-color: #FFF;
        place-items: center;
        height: 100%;
    }

    .form-size {
        grid-template-rows: 50px 1fr 50px;
        grid-template-columns: 1fr;
        grid-template-areas:
            "email"
            "senha"
            "lembre";
        gap: 10px;
        height: 100%;
        padding-top: 250px;
        max-width: 800px;
    }

    .email {
        grid-area: email;
        background-color: lightblue;
        width: 700px;
        height: 100px;


    }

    .senha {
        grid-area: senha;
        background-color: lightcoral;
        width: 700px;
        height: 100px;
    }

    .lembre {
        grid-area: lembre;
        background-color: lightgreen;
    }

    .input-styles{
        border: #6a0000 solid 1.5px !important;
        border-radius: 8px;
        
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
