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
        border: #6a0000 solid 1.5px !important;
        border-radius: 8px;

    }

    .input-styles:focus {
        border: #510101 solid 1.5px !important;

    }

    .custom-button {
        display: inline-flex;
        align-items: center;
        padding-left: 1rem;
        padding-right: 1rem;
        /* px-4 (16px) */
        padding-top: 0.5rem;
        /* py-2 (8px) */
        padding-bottom: 0.5rem;
        /* py-2 (8px) */
        background-color: #2d3748;
        /* bg-gray-800 */
        border: 1px solid transparent;
        /* border border-transparent */
        border-radius: 0.375rem;
        /* rounded-md */
        font-weight: 600;
        /* font-semibold */
        font-size: 0.75rem;
        /* text-xs */
        text-transform: uppercase;
        /* uppercase */
        letter-spacing: 0.1em;
        /* tracking-widest */
        color: #ffffff;
        /* text-white */
        transition: background-color 0.15s ease-in-out;
        /* transition ease-in-out duration-150 */
    }

    .custom-button:hover {
        background-color: #4a5568;
        /* hover:bg-gray-700 */
    }

    .custom-button:focus {
        background-color: #4a5568;
        /* focus:bg-gray-700 */
        outline: none;
        /* focus:outline-none */
        box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.5), 0 0 0 2px rgba(229, 231, 235, 1);
        /* focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 */
    }

    .custom-button:active {
        background-color: #1a202c;
        /* active:bg-gray-900 */
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
