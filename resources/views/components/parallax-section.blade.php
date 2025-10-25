<div 
    class="parallax-section d-flex align-items-center justify-content-center text-center text-white position-relative"
    style="background-image: url('{{ asset($imageUrl) }}'); height: {{ $height ?? '400px' }};"
>
    <div class="overlay position-absolute w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="content position-relative z-2 px-4">
        {{ $slot }}
    </div>
</div>

<style>
.parallax-section {
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
}
</style>
