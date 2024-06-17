@props(['active'])

@php
    $user = Auth::user();
    $navLinkActive = '';
    $navLinkInative = '';

    if ($user) {
        switch ($user->user_type) {
            case \App\Models\User::TYPE_COORDINATOR:
            $navLinkActive = 'link-active-cordenador';
            $navLinkInative = 'link-inative-cordenador';
                break;
            case \App\Models\User::TYPE_INTERN:
                $navLinkActive = 'link-config-active';
                $navLinkInative = 'link-config-inative';
                break;
            case \App\Models\User::TYPE_ENTERPRISE:
                $navLinkActive = 'link-active-enterprise';
                $navLinkInative = 'link-inative-enterprise';
                break;
            default:
                $navLinkActive = 'link-config-active';
                $navLinkInative = 'link-config-inative';

                break;
        }
    }
    $classes = $active ?? false ? $navLinkActive : $navLinkInative;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
