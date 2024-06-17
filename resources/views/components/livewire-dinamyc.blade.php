@php
    $userType = Auth::user()->user_type;

@endphp

@if ($userType == \App\Models\User::TYPE_ENTERPRISE)
    <x-welcome />
@elseif ($userType == \App\Models\User::TYPE_INTERN)
    <x-dashboard-vagas />
@elseif($userType == \App\Models\User::TYPE_COORDINATOR)
    <x-dash-coordinator />

@endif
