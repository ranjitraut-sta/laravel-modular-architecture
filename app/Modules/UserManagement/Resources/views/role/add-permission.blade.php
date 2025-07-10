@extends('admin.main.app')
@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>
                    Add Permission to Role:
                    <span class="text-primary" style="font-size: 30px; font-weight: bold;">
                        {{ $data['getRollName'] }}
                    </span>
                </h5>
                <a href="{{ route('role.index') }}" class="btn btn-light btn-sm">
                    <i class="fa-solid fa-angles-left"></i> Back
                </a>
            </div>

            <div class="card-body">
                <form action="{{ route('role.permission.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role_id" value="{{ $data['RoleId'] }}">

                    <div class="form-group mb-4">
                        <h6><strong>Give Access to Permissions</strong></h6>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="selectAll" onclick="selectAllPermissions()">
                                        <label class="form-check-label" for="selectAll">Select All</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mb-3 float-end">
                                        <input class="form-check-input" type="checkbox" id="deselectAll" onclick="deselectAllPermissions()">
                                        <label class="form-check-label" for="deselectAll">Deselect All</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div id="permissions" class="container">
                            @foreach ($data['permissions'] as $groupname => $permissionGroup)
                                <div class="permission-group mb-4 card">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="mt-3 py-2 ms-2">{{ $groupname }}</h5>
                                            <div class="form-check ms-2">
                                                <input class="form-check-input select-group" type="checkbox"
                                                       id="selectGroup_{{ \Illuminate\Support\Str::slug($groupname) }}"
                                                       data-group="{{ \Illuminate\Support\Str::slug($groupname) }}">
                                                <label class="form-check-label" for="selectGroup_{{ \Illuminate\Support\Str::slug($groupname) }}">
                                                    Select All in {{ $groupname }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                @foreach ($permissionGroup as $permission)
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input group-permission {{ \Illuminate\Support\Str::slug($groupname) }}"
                                                                   type="checkbox" name="permission_id[]"
                                                                   value="{{ $permission->id }}"
                                                                   id="permission_{{ $permission->id }}"
                                                                   @if (in_array($permission->id, $data['roleHasPermissions'])) checked @endif>
                                                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                                {{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Assign Permissions</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const selectAllCheckbox = document.getElementById("selectAll");
    const deselectAllCheckbox = document.getElementById("deselectAll");
    const permissionCheckboxes = document.querySelectorAll('input[name="permission_id[]"]');
    const groupCheckboxes = document.querySelectorAll('.select-group');

    function updateSelectAllCheckbox() {
        const allChecked = Array.from(permissionCheckboxes).every(chk => chk.checked);
        const noneChecked = Array.from(permissionCheckboxes).every(chk => !chk.checked);
        selectAllCheckbox.checked = allChecked;
        deselectAllCheckbox.checked = noneChecked;
    }

    function updateGroupCheckbox(groupClass) {
        const groupPermissions = document.querySelectorAll(`.${groupClass}`);
        const groupCheckbox = document.getElementById(`selectGroup_${groupClass}`);
        groupCheckbox.checked = Array.from(groupPermissions).every(chk => chk.checked);
        updateSelectAllCheckbox();
    }

    groupCheckboxes.forEach(groupCheckbox => {
        groupCheckbox.addEventListener("change", function () {
            const groupClass = this.getAttribute("data-group");
            const checkboxes = document.querySelectorAll(`.${groupClass}`);
            checkboxes.forEach(chk => chk.checked = this.checked);
            updateSelectAllCheckbox();
        });
    });

    permissionCheckboxes.forEach(chk => {
        chk.addEventListener("change", function () {
            const groupClass = Array.from(chk.classList).find(cls => cls !== "form-check-input" && cls !== "group-permission");
            if (groupClass) updateGroupCheckbox(groupClass);
        });
    });

    selectAllCheckbox.addEventListener("click", function () {
        permissionCheckboxes.forEach(chk => chk.checked = true);
        groupCheckboxes.forEach(chk => chk.checked = true);
        deselectAllCheckbox.checked = false;
    });

    deselectAllCheckbox.addEventListener("click", function () {
        permissionCheckboxes.forEach(chk => chk.checked = false);
        groupCheckboxes.forEach(chk => chk.checked = false);
        selectAllCheckbox.checked = false;
    });

    permissionCheckboxes.forEach(chk => {
        const groupClass = Array.from(chk.classList).find(cls => cls !== "form-check-input" && cls !== "group-permission");
        if (groupClass) updateGroupCheckbox(groupClass);
    });

    updateSelectAllCheckbox();
});

// Fallback functions for onclick
function selectAllPermissions() {
    document.getElementById("selectAll").click();
}
function deselectAllPermissions() {
    document.getElementById("deselectAll").click();
}
</script>
@endpush
