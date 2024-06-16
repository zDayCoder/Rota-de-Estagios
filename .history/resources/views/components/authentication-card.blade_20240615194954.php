<style>

.bgd{
    background-image: url('/assets/img/background-abstract.png');
    background-size: cover;
    overflow: hidden;
    width: 100%;
    background-repeat: no-repeat;
    display: flex;
    justify-content: start;
    margin: 0;
}

</style>

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 bgd">
<x-back-button />
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        
        {{ $slot }}
    </div>

</div>
