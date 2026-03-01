{{-- resources/views/components/sidebar.blade.php --}}

<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('frontend/assets/img/firape/firape.png') }}" alt="Logo" style="width: 70px;">
    </div>
    <ul class="nav-menu">
        <!-- Tableau de bord -->
        <li>
            <a href="{{ route('dashboard') }}"
               class="nav-link @if(request()->routeIs('dashboard')) active @endif">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 12h18M3 6h18M3 18h18M5 3v18M19 3v18"/>
                </svg>
                <span>Tableau de bord</span>
            </a>
        </li>

        <!-- Ligues -->
        <li class="@if(request()->routeIs('ligues.*')) active @endif">
            <a href="{{ route('ligues.index') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="1"></circle>
                    <path d="M12 1v6M12 17v6M4.22 4.22l4.24 4.24M15.54 15.54l4.24 4.24M1 12h6M17 12h6M4.22 19.78l4.24-4.24M15.54 8.46l4.24-4.24"/>
                </svg>
                <span>Ligues</span>
            </a>
        </li>

        <!-- Clubs -->
        <li class="@if(request()->routeIs('clubs.*')) active @endif">
            <a href="{{ route('clubs.index') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9h18v12c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2V9z"/>
                    <path d="M3 9V7c0-1.1.9-2 2-2h14c1.1 0 2 .9 2 2v2"/>
                    <rect x="7" y="2" width="10" height="2" rx="1"/>
                </svg>
                <span>Clubs</span>
            </a>
        </li>

        <!-- Événements --> href="{{ route('evenements.index') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <span>Événements</span>
            </a>
        </li>

        <!-- Personnes -->
        <li class="@if(request()->routeIs('personnes.*')) active @endif">
            <a href="{{ route('personnes.index') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>Personnes</span>
            </a>
        </li>

        <!-- Commissions -->
        <li class="@if(request()->routeIs('commissions.*')) active @endif">
            <a href="{{ route('commissions.index') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Commissions</span>
            </a>
        </li>

        <!-- Déconnexion -->
        <li style="margin-top: 30px; padding-top: 20px; border-top: 1px solid rgba(255, 255, 255, 0.2);">
            <a href="#"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2z"></path>
                    <polyline points="16 8 12 12 16 16"></polyline>
                    <line x1="12" y1="12" x2="3" y2="12"></line>
                </svg>
                <span>Déconnexion</span>
            </a>
        </li>
    </ul>

    <!-- Form logout caché -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<style>
    .sidebar {
        background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
        color: white;
        padding: 20px;
        height: 100vh;
        overflow-y: auto;
        position: fixed;
        left: 0;
        top: 0;
        width: 250px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }

    .sidebar .logo {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar .logo img {
        width: 70px;
        height: auto;
        transition: all 0.3s ease;
    }

    .sidebar .logo img:hover {
        transform: scale(1.05);
    }

    .nav-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .nav-menu li {
        margin-bottom: 8px;
        transition: all 0.3s ease;
        border-radius: 8px;
        position: relative;
    }

    /* État actif du Li */
    .nav-menu li.active {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 8px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
        border-left: 3px solid transparent;
    }

    .nav-link:hover {
        color: white;
        background: rgba(255, 255, 255, 0.1);
        padding-left: 18px;
    }

    /* État actif du lien */
    .nav-menu li.active .nav-link {
        color: white;
        background: rgba(255, 255, 255, 0.15);
        border-left-color: #60a5fa;
        box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.05);
    }

    .nav-link svg {
        width: 20px;
        height: 20px;
        stroke: currentColor;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .nav-menu li.active .nav-link svg {
        color: #60a5fa;
    }

    .nav-link span {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Scroll bar personnalisée */
    .sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 3px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
            padding: 15px;
        }

        .nav-link {
            padding: 10px 12px;
            font-size: 13px;
        }

        .nav-link svg {
            width: 18px;
            height: 18px;
        }
    }

    @media (max-width: 480px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
            border-radius: 0 0 12px 12px;
        }

        .nav-menu {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .nav-menu li {
            flex: 1;
            min-width: 100px;
            margin-bottom: 0;
        }

        .nav-link {
            flex-direction: column;
            justify-content: center;
            text-align: center;
            padding: 8px 6px;
            font-size: 11px;
            gap: 6px;
        }

        .nav-link svg {
            width: 16px;
            height: 16px;
        }

        .nav-link span {
            white-space: normal;
        }
    }
</style>
