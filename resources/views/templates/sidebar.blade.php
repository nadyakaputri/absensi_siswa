<ul class="nav nav-secondary">
    <li class="nav-item">
        <a class="nav-link {{ $menu == 'dashboard' ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $menu == 'jurusan' ? '' : 'collapsed' }}" href="{{ route('jurusan.index') }}">
            <i class="fas fa-graduation-cap"></i>
            <p>Jurusan</p>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $menu == 'guru' ? '' : 'collapsed' }}" href="{{ route('guru') }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <p>Guru</p>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $menu == 'siswa' ? '' : 'collapsed' }}" href="{{ route('siswa') }}">
            <i class="fas fa-portrait"></i>
            <p>Siswa</p>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $menu == 'lokal' ? '' : 'collapsed' }}" href="{{ route('lokal.index') }}">
            <i class="fas fa-school"></i>
            <p>Kelas</p>
        </a>
    </li>
    
</ul>
