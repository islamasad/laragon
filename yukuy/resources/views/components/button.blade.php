<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2 border border-transparent rounded font-medium text-xs uppercase tracking-widest']) }}>
    {{ $slot }}
</button>
