<button {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-primary-500 text-white rounded-md hover:bg-primary-600']) }}>
    {{ $slot }}
</button>
