<div class="header">
    <h2>@yield('page-title', 'Accueil')</h2>

    <div class="header-right">
        <div class="search-box">
            <input type="text" placeholder="Rechercher..." id="global-search">
        </div>

        <!-- User Profile avec Dropdown -->
        <div class="user-profile-container">
            <!-- Bouton Profile (Avatar + Nom) -->
            <button class="user-profile-button" id="profileButton">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'User', 0, 1)) }}
                </div>
                <div class="user-info">
                    <strong class="user-name">{{ Auth::user()->name ?? 'Utilisateur' }}</strong>
                    <span class="user-role">Admin</span>
                </div>
                <svg class="chevron-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu" id="dropdownMenu">
                <!-- Header du Dropdown -->
                <div class="dropdown-header">
                    <div class="dropdown-avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'User', 0, 1)) }}
                    </div>
                    <div class="dropdown-user-info">
                        <div class="dropdown-user-name">{{ Auth::user()->name ?? 'Utilisateur' }}</div>
                        <div class="dropdown-user-email">{{ Auth::user()->email ?? 'user@example.com' }}</div>
                    </div>
                </div>

                <div class="dropdown-divider"></div>

                <!-- Menu Items -->

                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <span class="dropdown-item-icon">👤</span>
                    <span class="dropdown-item-text">Mon Profil</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- Bouton Déconnexion -->
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="dropdown-item logout-item">
                        <span class="dropdown-item-icon">🚪</span>
                        <span class="dropdown-item-text">Se déconnecter</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* ========== HEADER BASE ========== */
    .header {
        background: white;
        padding: 20px 40px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #e5e7eb;
        position: relative;
        z-index: 100;
    }

    .header h2 {
        font-size: 26px;
        color: #1f2937;
        font-weight: 700;
        margin: 0;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    /* ========== SEARCH BOX ========== */
    .search-box {
        position: relative;
        flex: 0 1 280px;
    }

    .search-box input {
        width: 100%;
        padding: 10px 16px 10px 40px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .search-box input:focus {
        outline: none;
        border-color: #1e40af;
        box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
        background-color: #f0f7ff;
    }

    .search-box::before {
        content: "🔍";
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
    }

    /* ========== USER PROFILE BUTTON ========== */
    .user-profile-container {
        position: relative;
    }

    .user-profile-button {
        background: linear-gradient(135deg, rgba(30, 64, 175, 0.05), rgba(124, 58, 237, 0.05));
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 8px 12px;
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
        position: relative;
        text-wrap: nowrap;
    }

    .user-profile-button:hover {
        background: linear-gradient(135deg, rgba(30, 64, 175, 0.1), rgba(124, 58, 237, 0.1));
        border-color: #1e40af;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.15);
    }

    .user-profile-button.active {
        border-color: #1e40af;
        background: linear-gradient(135deg, rgba(30, 64, 175, 0.15), rgba(124, 58, 237, 0.15));
    }

    /* Avatar */
    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #1e40af 0%, #7c3aed 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 16px;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(30, 64, 175, 0.2);
    }

    /* User Info */
    .user-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 2px;
    }

    .user-name {
        font-size: 13px;
        color: #1f2937;
        font-weight: 600;
        line-height: 1;
    }

    .user-role {
        font-size: 11px;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        font-weight: 500;
        line-height: 1;
    }

    /* Chevron Icon */
    .chevron-icon {
        width: 16px;
        height: 16px;
        color: #6b7280;
        transition: transform 0.3s ease;
        flex-shrink: 0;
    }

    .user-profile-button.active .chevron-icon {
        transform: scaleY(-1);
    }

    /* ========== DROPDOWN MENU ========== */
    .dropdown-menu {
        position: absolute;
        top: 55px;
        right: 0;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        box-shadow: 0 10px 32px rgba(0, 0, 0, 0.12);
        min-width: 300px;
        z-index: 1000;
        overflow: hidden;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .dropdown-menu.active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* Dropdown Header */
    .dropdown-header {
        padding: 16px;
        background: linear-gradient(135deg, rgba(30, 64, 175, 0.05), rgba(124, 58, 237, 0.05));
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .dropdown-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, #1e40af 0%, #7c3aed 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 20px;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(30, 64, 175, 0.2);

    }

    .dropdown-user-info {
        flex: 1;
        min-width: 0;
    }

    .dropdown-user-name {
        font-size: 14px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 2px;
    }

    .dropdown-user-email {
        font-size: 12px;
        color: #6b7280;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Dropdown Divider */
    .dropdown-divider {
        height: 1px;
        background: #e5e7eb;
        margin: 8px 0;
    }

    /* Dropdown Items */
    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        color: #374151;
        text-decoration: none;
        font-size: 13px;
        cursor: pointer;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        transition: all 0.2s ease;
        font-family: inherit;
        font-weight: 500;
    }

    .dropdown-item:hover {
        background-color: #f9fafb;
        color: #1e40af;
        padding-left: 20px;
    }

    .dropdown-item-icon {
        font-size: 16px;
        flex-shrink: 0;
    }

    .dropdown-item-text {
        flex: 1;
    }

    /* Logout Item */
    .logout-item {
        color: #ef4444;
        border-top: 1px solid #e5e7eb;
        margin-top: 4px;
        padding-top: 12px;
    }

    .logout-item:hover {
        background-color: #fef2f2;
        color: #dc2626;
    }

    .logout-form {
        width: 100%;
        margin: 0;
        padding: 0;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 1024px) {
        .header {
            padding: 15px 30px;
        }

        .header h2 {
            font-size: 22px;
        }

        .search-box {
            flex: 0 1 200px;
        }

        .dropdown-menu {
            min-width: 280px;
        }
    }

    @media (max-width: 768px) {
        .header {
            flex-direction: column;
            gap: 15px;
            padding: 15px 20px;
        }

        .header h2 {
            font-size: 20px;
        }

        .header-right {
            width: 100%;
            justify-content: space-between;
            gap: 15px;
        }

        .search-box {
            flex: 1;
            min-width: 150px;
        }

        .user-info {
            display: none;
        }

        .user-profile-button {
            padding: 8px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1e40af, #7c3aed);
            border: 2px solid white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .user-profile-button:hover {
            background: linear-gradient(135deg, #1e3a8a, #6d28d9);
        }

        .chevron-icon {
            display: none;
        }

        .dropdown-menu {
            right: -10px;
            min-width: 250px;
        }
    }

    @media (max-width: 480px) {
        .header {
            padding: 12px 15px;
        }

        .header h2 {
            font-size: 18px;
        }

        .search-box {
            flex: 1;
            min-width: 120px;
        }

        .search-box input {
            font-size: 12px;
            padding: 8px 12px 8px 32px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            font-size: 14px;
        }

        .dropdown-avatar {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }

        .dropdown-menu {
            right: -20px;
            min-width: 240px;
        }

        .dropdown-header {
            padding: 12px;
        }

        .dropdown-item {
            padding: 10px 12px;
            font-size: 12px;
        }

        .dropdown-item:hover {
            padding-left: 18px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileButton = document.getElementById('profileButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        if (!profileButton || !dropdownMenu) return;

        // Toggle dropdown au clic sur le bouton
        profileButton.addEventListener('click', function(e) {
            e.stopPropagation();
            profileButton.classList.toggle('active');
            dropdownMenu.classList.toggle('active');
        });

        // Fermer le dropdown au clic sur un item
        const dropdownItems = dropdownMenu.querySelectorAll('.dropdown-item');
        dropdownItems.forEach(item => {
            item.addEventListener('click', function() {
                // Ne pas fermer si c'est un lien ou formulaire
                if (item.tagName !== 'A' || !item.getAttribute('href')) {
                    profileButton.classList.remove('active');
                    dropdownMenu.classList.remove('active');
                }
            });
        });

        // Fermer le dropdown au clic en dehors
        document.addEventListener('click', function(e) {
            if (!profileButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                profileButton.classList.remove('active');
                dropdownMenu.classList.remove('active');
            }
        });

        // Fermer le dropdown quand on appuie sur Échap
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                profileButton.classList.remove('active');
                dropdownMenu.classList.remove('active');
            }
        });
    });
</script>
