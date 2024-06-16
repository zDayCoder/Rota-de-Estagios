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
        justify-content: center;
        width: 900px;
        height: 100VH;
        border-radius: 4px;
        align-items: center
    }

    .form-login{
        display: flex;
        background-color: #FFF;
        justify-content: center;
    }
</style>

<div class=" bgd ">

    <div class="card-login">
        <div class="botao-voltar">
            <x-back-button />
        </div>
        <div class="">

            {{ $slot }}
        </div>
    </div>
</div>
