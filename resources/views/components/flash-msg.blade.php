@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left bg-laravel transform px-48 py-4 left-1/2 -translate-x-1/2 text-white">
        <p>{{session('message')}}</p>
    </div>
@endif

