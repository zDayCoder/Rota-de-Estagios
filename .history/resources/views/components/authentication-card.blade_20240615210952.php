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

    .input-styles {
        color: #510101;
        border: #6a0000 solid 1.5px !important;
        border-radius: 8px;

    }

    .input-styles:focus {
        border: #510101 solid 1.5px !important;

    }

    .custom-button {
        display: inline-flex;
        align-items: center;
        padding-left: 1.2rem;
        padding-right: 1.2rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        background-color: #000;
        border: 1px solid transparent;
        border-radius: 0.375rem;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #ffffff;
        transition: background-color 0.15s ease-in-out;
    }

    .custom-button:hover {
        background-color: #171717;
    }

    .custom-button:focus {
        background-color: #171717;
        outline: none;
        box-shadow: 0 0 0 2px rgba(110, 7, 7, 0.5), 0 0 0 2px rgba(229, 231, 235, 1);
    }

    .custom-button:active {
        background-color: #1a202c;
    }
    .custom-text {
    display: block; /* block */
    font-weight: 500; /* font-medium */
    font-size: 0.875rem; /* text-sm (14px) */
    color: #4a5568; /* text-gray-700 */
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
