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
    <div class="">
        
        {{ $slot }}
    </div>

</div>
