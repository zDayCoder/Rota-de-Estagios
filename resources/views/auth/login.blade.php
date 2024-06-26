<x-guest-layout>
    <x-authentication-card>

        <x-slot name="logo">

        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" class="form-size" action="{{ route('login') }}">
            @csrf
            <div class="title">
                <x-rest-title />
            </div>

            <div class="email">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" class="block mt-1 w-full input-styles" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4 senha">
                <div class="flex justify-between">
                    <x-label for="password" value="{{ __('Senha') }}" />

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif
                </div>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4 flex items-center justify-between lembre">
                <!-- Adicione a classe 'flex' e 'justify-between' para alinhar na mesma linha -->
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Lembre de mim') }}</span>
                </label>

                <x-button>
                    {{ __('Entrar') }}
                </x-button>

            </div>


            <div class="flex flex-col items-center mt-4">
                <a class="underline mt-4 text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('register') }}">
                    {{ __('Ainda não tem cadastro?') }} <span
                        style="color: #28a745;">{{ __('Cadastre-se aqui.') }}</span>
                </a>
            </div>

        </form>
    </x-authentication-card>
</x-guest-layout>
