@props(['label' => null])
<div class="form-group basic">
    <div class="input-wrapper">
        @if ($label)
            <label class="label" for="">{{ $label }}</label>
        @endif
        <input {{ $attributes->merge(['class' => 'form-control', 'type' => 'text']) }} />
        <i class="clear-input">
            <ion-icon name="close-circle"></ion-icon>
        </i>
        @error($attributes->get('wire:model') ?? $attributes->get('name'))
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
