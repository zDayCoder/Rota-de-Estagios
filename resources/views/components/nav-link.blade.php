@props(['active'])

@php
    $user = Auth::user();
    $navLinkActive = '';
    $navLinkInative = '';

    if ($user) {
        switch ($user->user_type) {
            case \App\Models\User::TYPE_COORDINATOR:
                $navLinkActive = '';
                $navLinkInative = '';
                break;
            case \App\Models\User::TYPE_INTERN:
                $navLinkActive = '';
                $navLinkInative = '';
                break;
            case \App\Models\User::TYPE_ENTERPRISE:
                $navLinkActive = 'link-active-enterprise';
                $navLinkInative = 'link-active-enterprise';
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
