<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if ($tipoUser !== 'Coordinator')
            <div class="register-login-card" id="userTypeSelection">
                <div class="register-size">
                    <h1 class="type">Selecione o Tipo de Usuário</h1>
                    <div class="user-type-option internn" id="internOption">
                        <input type="radio" name="user_type" value="Intern">
                        <label for="internOption">Estagiário</label>
                        <div class="user-type-description">Opção para estudantes em busca de oportunidades de estágio.
                        </div>
                    </div>
                    <div class="user-type-option company" id="enterpriseOption">
                        <input type="radio" name="user_type" value="Enterprise">
                        <label for="enterpriseOption">Empresa/Recrutador</label>
                        <div class="user-type-description">Opção para empresas e recrutadores procurando candidatos.
                        </div>
                    </div>
                

                <div class="flex items-center justify-end mt-4" id="nextButtonContainer">
                    <x-button onclick="showSelectedForm()" id="nextButton">
                        {{ __('Próximo') }}
                    </x-button>
                </div>
        @endif

        <!-- Forms for each user type -->
        <form id="internForm"  method="POST" action="{{ route('register') }}"
            style="{{ $tipoUser === 'Intern' ? '' : 'display: none;' }}">
            @csrf
            Intern
            <div class="name">
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
            </div>
            <div class="mt-4 email">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>
            <div class="mt-4 password">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>
            <div class="mt-4 password2">
                <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="flex items-center justify-end mt-4 footer2">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Já possuí uma conta?') }} <span style="color: #28a745;">{{ __('Entrar.') }}</span>
                </a>
                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>

        <form id="enterpriseForm" method="POST" action="{{ route('register') }}"
            style="{{ $tipoUser === 'Enterprise' ? '' : 'display: none;' }}">
            @csrf
            Enterprise
            <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>
            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Já possuí uma conta?') }} <span style="color: #28a745;">{{ __('Entrar.') }}</span>
                </a>
                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>

        <form id="coordinatorForm" method="POST" action="{{ route('register') }}"
            style="{{ $tipoUser === 'Coordinator' ? '' : 'display: none;' }}">
            @csrf
            Coordinator
            <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>
            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Já possuí uma conta?') }} <span style="color: #28a745;">{{ __('Entrar.') }}</span>
                </a>
                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>

        @if ($tipoUser !== 'Coordinator')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Initially set the selected type based on tipoUser
                    var userType = '{{ $tipoUser }}';
                    document.querySelector('input[value="' + userType + '"]').checked = true;
                    showForm(null); // Hide all forms initially
                });

                function showForm(userType) {
                    document.getElementById('internForm').style.display = 'none';
                    document.getElementById('enterpriseForm').style.display = 'none';
                    document.getElementById('coordinatorForm').style.display = 'none';
                    document.getElementById('internOption').classList.remove('selected');
                    document.getElementById('enterpriseOption').classList.remove('selected');
                    if (document.getElementById('coordinatorOption')) {
                        document.getElementById('coordinatorOption').classList.remove('selected');
                    }

                    if (userType === 'Intern' || userType === '0') {
                        document.getElementById('internForm').style.display = 'block';
                        document.getElementById('internOption').classList.add('selected');
                    } else if (userType === 'Enterprise' || userType === '1') {
                        document.getElementById('enterpriseForm').style.display = 'block';
                        document.getElementById('enterpriseOption').classList.add('selected');
                    } else if (userType === 'Coordinator' || userType === '2') {
                        if (document.getElementById('coordinatorForm')) {
                            document.getElementById('coordinatorForm').style.display = 'block';
                            document.getElementById('coordinatorOption').classList.add('selected');
                        }
                    }
                }

                function showSelectedForm() {
                    const selectedType = document.querySelector('input[name="user_type"]:checked');
                    if (selectedType) {
                        const userType = selectedType.value;
                        updateUserType(userType);
                        // Hide the user type selection and show the selected form
                        document.getElementById('userTypeSelection').style.display = 'none';
                        document.getElementById('nextButtonContainer').style.display = 'none';
                        showForm(userType);
                    }
                }

                function updateUserType(userType) {
                    // Send AJAX request to update the user type
                    fetch('{{ route('update-user-type') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                tipo_user: userType
                            })
                        })
                        .then(response => {
                            if (response.ok) {
                                // Atualizar a variável $tipoUser na página sem recarregar
                                document.getElementById('tipoUser').innerText = userType;
                                // Esconder a seleção de tipo de usuário
                                document.getElementById('userTypeSelection').style.display = 'none';
                                document.getElementById('nextButtonContainer').style.display = 'none';
                                // Mostrar o formulário correto
                                showForm(userType);
                            } else {
                                console.error('Failed to update user type');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            </script>
        @endif
    </x-authentication-card>
</x-guest-layout>
