<style>

.bgd{
    background: radial-gradient(circle, transparent 21%, #333 115%), url('{{ asset('assets/img/bgd.jpg') }}');
    background-repeat: no-repeat;
    background-size:cover;
}

</style>

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 bgd">
<x-back-button />
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        
        {{ $slot }}
    </div>

</div>
