<x-app-layout>
    
        @php
        $userType = Auth::user()->user_type;

        switch ($userType) {
            case \App\Models\User::TYPE_ENTERPRISE:
                $dashboardRoute = route('enterprise.welcome');
                break;
            case \App\Models\User::TYPE_INTERN:
                $dashboardRoute = route('intern.dashboard');
                break;
            case \App\Models\User::TYPE_COORDINATOR:
                $dashboardRoute = route('coordinator.dashboard');
                break;
            default:
                $dashboardRoute = route('dashboard');
                break;
        }
    @endphp

    @if ($userType == \App\Models\User::TYPE_ENTERPRISE)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Conteúdo da página de boas-vindas para empresas -->
                <x-welcome/>
            </div>
        </div>
    @else
        <script>window.location.href = "{{ $dashboardRoute }}";</script>
    @endif
    
</x-app-layout>
