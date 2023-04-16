@props(['name'])

<label for="{{ $name }}" class="block mb-2 font-bold text-xs text-grey-700">{{ Str::ucfirst($name) }}</label>
