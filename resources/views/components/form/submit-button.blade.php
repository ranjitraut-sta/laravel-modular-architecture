@props([
    'label' => 'Submit',
    'class' => 'btn btn-primary px-4',
])

<div class="form-group">
    <button type="submit" class="{{ $class }}">{{ $label }}</button>
</div>
