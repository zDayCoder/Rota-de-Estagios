<style>
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

    .custom-label {
        display: block;
        font-weight: 500;
        font-size: 0.875rem;
        color: #000000;
        font-size: 20px;
        font-family: 'Courier New', Courier, monospace;
        font-weight: bold;
        text-decoration: uppercase;
        
    }

    input:-webkit-autofill {
        font-family: 'Courier New', Courier, monospace;

        background-color: #8d060692 !important;
        color: #510101 !important;
        border: 1px solid #ccc;
        transition: background-color 5000s ease-in-out 0s;
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
