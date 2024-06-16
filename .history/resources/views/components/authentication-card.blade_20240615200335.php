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
        
        width: 900px;
        height: 100VH;
        border-radius: 4px;
       
    }

    .form-login{
        display: flex;
        background-color: #FFF;
        justify-content: center;
        align-items: center
    }
</style>

<div class=" bgd ">

    <div class="card-login">
        <div class="botao-voltar">
            <x-back-button />
        </div>
        <div class="form-login">

            {{ $slot }}
        </div>
    </div>
</div>
