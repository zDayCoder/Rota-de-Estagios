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
        width: 10px;
        height: 100VH;
        border-radius: 4px;
    }
</style>

<div class="card-login">
    <x-back-button />
    <div class="">

        {{ $slot }}
    </div>

</div>
