<div>
    <button {{ $attributes->merge(['class' => "px-5 py-2 text-white font-bold flex items-center bg-purple-400 rounded-2xl"]) }}>
        {{ $slot }}
    </button>
</div>
