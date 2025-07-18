<ul class="metismenu" id="menu">
    @if (auth()->check())
        @foreach ($items as $item)
            @php

                $hasSubmenu = isset($item['submenu']);

                // Filter submenu by permissions
                $permittedSubmenu = collect($item['submenu'] ?? [])->filter(function ($sub) {
                    return !isset($sub['permission']) ||
                        auth()->user()->hasPermission($sub['permission']['controller'], $sub['permission']['method']);
                });

                // Determine if parent should be shown
                $shouldDisplayParent = !$hasSubmenu || $permittedSubmenu->isNotEmpty();

                $isActive =
                    $hasSubmenu &&
                    $permittedSubmenu->pluck('route')->contains(function ($route) {
                        return request()->routeIs($route);
                    });
            @endphp

            @if ($shouldDisplayParent)
                <li class="{{ $isActive ? 'mm-active' : '' }}">
                    <a href="{{ $hasSubmenu ? 'javascript:;' : route($item['route']) }}"
                        class="{{ $hasSubmenu ? 'has-arrow' : '' }}" {{ $isActive ? 'aria-expanded=true' : '' }}>
                        <div class="parent-icon {{ $item['iconColor'] ?? '' }}"><i class="{{ $item['icon'] }}"></i></div>
                        <div class="menu-title">{{ $item['title'] }}</div>
                    </a>

                    @if ($hasSubmenu)
                        <ul class="{{ $isActive ? 'mm-show' : '' }}">
                            @foreach ($permittedSubmenu as $sub)
                                <li>
                                    <a href="{{ route($sub['route']) }}">
                                        <i class="bx bx-right-arrow-alt"></i>{{ $sub['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
    @endif
</ul>
