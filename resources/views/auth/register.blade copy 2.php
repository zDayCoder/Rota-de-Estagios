<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <h1>Select User Type</h1>
        <div id="userTypeSelection">
            <label class="user-type-option" id="internOption">
                <input type="radio" name="user_type" value="Intern" onclick="updateUserType('Intern')">
                <div>Intern</div>
            </label>
            <label class="user-type-option" id="enterpriseOption">
                <input type="radio" name="user_type" value="Enterprise" onclick="updateUserType('Enterprise')">
                <div>Enterprise</div>
            </label>
            <label class="user-type-option" id="coordinatorOption">
                <input type="radio" name="user_type" value="Coordinator" onclick="updateUserType('Coordinator')">
                <div>Coordinator</div>
            </label>
        </div>
<hr/>
        <form id="internForm" method="POST" action="{{ route('register') }}">
            @csrf
            Intern
            <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Já possuí uma conta?') }} <span style="color: #28a745;">{{ __('Entrar.') }}</span>
                </a>
                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>

        <form id="enterpriseForm" method="POST" action="{{ route('register') }}">
            @csrf
            Enterprise
            <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Já possuí uma conta?') }} <span style="color: #28a745;">{{ __('Entrar.') }}</span>
                </a>
                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>

        @if ($tipoUser === 'Coordinator')
        <form id="coordinatorForm" method="POST" action="{{ route('register') }}">
            @csrf
            Coordinator
            <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Já possuí uma conta?') }} <span style="color: #28a745;">{{ __('Entrar.') }}</span>
                </a>
                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>

        </form>
        @endif

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var userType = '{{ $tipoUser }}';
                showForm(userType);
            });

            function showForm(userType) {
                document.getElementById('internForm').style.display = 'none';
                document.getElementById('enterpriseForm').style.display = 'none';
                document.getElementById('coordinatorForm').style.display = 'none';
                document.getElementById('internOption').classList.remove('selected');
                document.getElementById('enterpriseOption').classList.remove('selected');
                document.getElementById('coordinatorOption').classList.remove('selected');

                if (userType === 'Intern' || userType === '0') {
                    document.getElementById('internForm').style.display = 'block';
                    document.getElementById('internOption').classList.add('selected');
                    document.querySelector('input[value="Intern"]').checked = true;
                } else if (userType === 'Enterprise' || userType === '1') {
                    document.getElementById('enterpriseForm').style.display = 'block';
                    document.getElementById('enterpriseOption').classList.add('selected');
                    document.querySelector('input[value="Enterprise"]').checked = true;
                } else if (userType === 'Coordinator' || userType === '2') {
                    document.getElementById('coordinatorForm').style.display = 'block';
                    document.getElementById('coordinatorOption').classList.add('selected');
                    document.querySelector('input[value="Coordinator"]').checked = true;
                }
            }

            function updateUserType(userType) {
                // Send AJAX request to update user type
                fetch('{{ route('update-user-type') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ user_type: userType })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        showForm(userType);
                    } else {
                        console.error('Failed to update user type');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        </script>

    </x-authentication-card>
</x-guest-layout>
