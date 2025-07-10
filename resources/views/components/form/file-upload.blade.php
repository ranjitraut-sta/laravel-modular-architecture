@props(['name', 'label', 'id' => $name, 'value' => old($name, session($name)), 'required' => false, 'fullpath' => null])

@php
    $previewId = $id . 'Preview';
    $removeId = 'remove' . ucfirst($id);
    $errorClass = $errors->has($name) ? 'is-invalid' : '';

    // Get image path either from old session, or from a temporary session path for validation failure
    $tempImage = session($name . '_temp_path') ?? null;
    $imagePath = $value ? asset('storage/' . $value) : ($tempImage ? asset('storage/' . $tempImage) : '');

  $isEditMode = !empty($value); // assuming $value छ भने edit mode हो

    if (!empty($tempImage) && !$isEditMode) {
        $imagePath = asset("storage/{$tempImage}");
    } elseif (!empty($fullpath) && !empty($value)) {
        $imagePath = asset('storage/' . $fullpath . '/' . $value);
    } elseif (!empty($value) && str_contains($value, '/')) {
        $imagePath = asset("storage/{$value}");
    } elseif (!empty($value)) {
        $imagePath = asset("storage/uploads/{$value}");
    } else {
        $imagePath = '';
    }
@endphp

<x-form.label :for="$id" :required="$required">{{ $label }}</x-form.label>

<div class="file-upload-wrapper" style="width: 200px; height: 200px;">
    <div class="upload-placeholder" style="{{ $imagePath ? 'display: none;' : '' }}">Click to upload</div>

    <input type="file" name="{{ $name }}" id="{{ $id }}" class="file-input {{ $errorClass }}"
        accept="image/*" data-preview-class="preview-in-field-{{ $id }}">

    <img src="{{ $imagePath }}" class="preview-img preview-in-field-{{ $id }}"
        style="{{ $imagePath ? '' : 'display: none;' }}">

    <button type="button" class="delete-btn" style="{{ $imagePath ? '' : 'display: none;' }}"
        onclick="removeImagePreview('{{ $id }}')">×</button>
</div>

@error($name)
    <div class="invalid-feedback d-block">
        {{ $message }}
    </div>
@enderror
