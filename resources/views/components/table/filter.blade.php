<form action="{{ $action }}" method="POST">
    @csrf
    <div class="row mb-3 align-items-center">
        <div class="col-md-6">
            <label class="form-label">
                Show
                <select name="length" class="form-select form-select-sm d-inline-block w-auto mx-1"
                    onchange="this.form.submit()">
                    @foreach ([10, 25, 50, 100] as $num)
                        <option value="{{ $num }}" {{ request('length') == $num ? 'selected' : '' }}>
                            {{ $num }}
                        </option>
                    @endforeach
                </select>
                entries
            </label>
        </div>
        <div class="col-md-6 text-md-end">
            <label class="form-label">
                Search:
                <input type="search" name="search" value="{{ request('search') }}"
                    class="form-control form-control-sm d-inline-block w-auto ms-1"
                    placeholder="{{ $placeholder ?? 'Search...' }}" onchange="this.form.submit()">
            </label>
        </div>
    </div>
</form>
