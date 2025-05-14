<ul class="nav nav-secondary">
    <li class="nav-item">
        <a class="nav-link {{ $menu == 'dashboard' ? '' : 'collapsed' }}" href="{{ route('dashboard-guru') }}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $menu == 'absen' ? '' : 'collapsed' }}" href="{{ route('absen.index') }}">
            <i class="fas fa-calendar-check"></i>
            <p>Absen</p>
        </a>
    </li>
    
</ul>
