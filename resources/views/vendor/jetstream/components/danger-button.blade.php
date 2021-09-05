<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-medium text-sm text-white  tracking-widest transform hover:scale-105 transition-all hover:bg-red-600 active:bg-red-600 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
