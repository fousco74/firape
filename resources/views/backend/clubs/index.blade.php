@extends('backend.layouts.app')

@section('title', 'Clubs - FIRAPE')
@section('page-title', '⚽ Gestion des Clubs')

@section('styles')
    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .search-section {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .search-input {
            padding: 10px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            flex: 1;
            min-width: 200px;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }

        .clubs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .club-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
            border-left: 4px solid #7c3aed;
        }

        .club-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .club-header {
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
            color: white;
            padding: 20px;
        }

        .club-header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }

        .club-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.25);
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            margin-top: 8px;
            font-weight: 500;
        }

        .club-body {
            padding: 20px;
        }

        .club-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .info-item {
            flex: 1;
        }

        .info-label {
            font-size: 12px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .info-value {
            font-weight: 600;
            color: #1f2937;
        }

        .club-actions {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-view {
            background-color: #ede9fe;
            color: #7c3aed;
        }

        .btn-view:hover {
            background-color: #ddd6fe;
        }

        .btn-edit {
            background-color: #fef3c7;
            color: #b45309;
        }

        .btn-edit:hover {
            background-color: #fde68a;
        }

        .btn-delete {
            background-color: #fee2e2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background-color: #fecaca;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 64px;
            margin-bottom: 20px;
        }

        .empty-title {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .empty-text {
            color: #6b7280;
            margin-bottom: 30px;
        }

        /* ===== MODAL ===== */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            animation: fadeIn 0.3s ease;
        }

        .modal-overlay.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .modal {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
        }

        .modal-close {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border-radius: 6px;
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .modal-body {
            padding: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #1f2937;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .modal-footer {
            padding: 20px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .btn-primary {
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .clubs-grid {
                grid-template-columns: 1fr;
            }

            .modal {
                width: 95%;
                max-height: 95vh;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h2>Clubs Sportifs</h2>
        <button class="btn btn-primary" id="openModal" style="cursor: pointer;">
            ➕ Ajouter un Club
        </button>
    </div>

    <!-- Search Section -->
    <div class="search-section">
        <input
            type="text"
            class="search-input"
            id="searchClub"
            placeholder="🔍 Rechercher un club..."
        >
        <select class="search-input" id="filterType" style="flex: 0 1 200px;">
            <option value="">Tous les types</option>
            <option value="Professionnel">Professionnel</option>
            <option value="Semi-Professionnel">Semi-Professionnel</option>
            <option value="Amateur">Amateur</option>
            <option value="Jeunesse">Jeunesse</option>
            <option value="Féminin">Féminin</option>
        </select>
    </div>

    <!-- Clubs Grid -->
    @if(isset($clubs) && $clubs->count() > 0)
        <div class="clubs-grid">
            @foreach($clubs as $club)
                <div class="club-card" data-club-name="{{ $club->nom_club }}" data-club-type="{{ $club->type_club ?? '' }}">
                    <div class="club-header">
                        <h3>{{ $club->nom_club }}</h3>
                        @if($club->type_club)
                            <span class="club-badge">{{ $club->type_club }}</span>
                        @endif
                    </div>

                    <div class="club-body">
                        <div class="club-info">
                            <div class="info-item">
                                <div class="info-label">Ligue</div>
                                <div class="info-value">{{ $club->ligue->nom_ligue ?? 'N/A' }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Localité</div>
                                <div class="info-value">{{ $club->localite ?? 'N/A' }}</div>
                            </div>
                        </div>

                        <div class="club-actions">
                            <a href="{{ route('clubs.show', $club->id_club) }}" class="action-btn btn-view">
                                👁 Voir
                            </a>
                            <a href="{{ route('clubs.edit', $club->id_club) }}" class="action-btn btn-edit">
                                ✏ Modifier
                            </a>
                            <form action="{{ route('clubs.destroy', $club->id_club) }}" method="POST" style="display: inline; flex: 1;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete" style="width: 100%;" onclick="return confirm('Êtes-vous sûr?')">
                                    🗑 Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <div class="empty-icon">⚽</div>
            <div class="empty-title">Aucun club trouvé</div>
            <p class="empty-text">Commencez par créer un nouveau club pour organiser vos équipes.</p>
            <button class="btn btn-primary" id="openModalEmpty" style="cursor: pointer;">
                ➕ Créer le premier club
            </button>
        </div>
    @endif

    <!-- ===== MODAL ===== -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal">
            <div class="modal-header">
                <h2>Ajouter un nouveau club</h2>
                <button class="modal-close" id="closeModal">&times;</button>
            </div>

            <form action="{{ route('clubs.store') }}" method="POST">
                <div class="modal-body">
                    @csrf

                    <!-- Nom du Club -->
                    <div class="form-group">
                        <label class="form-label">Nom du Club *</label>
                        <input
                            type="text"
                            name="nom_club"
                            class="form-control"
                            placeholder="Ex: AS Port-Bouët"
                            required
                        >
                    </div>

                    <!-- Type de Club -->
                    <div class="form-group">
                        <label class="form-label">Type de Club</label>
                        <select name="type_club" class="form-control">
                            <option value="">Sélectionner un type</option>
                            <option value="Professionnel">Professionnel</option>
                            <option value="Semi-Professionnel">Semi-Professionnel</option>
                            <option value="Amateur">Amateur</option>
                            <option value="Jeunesse">Jeunesse</option>
                            <option value="Féminin">Féminin</option>
                        </select>
                    </div>

                    <!-- Localité -->
                    <div class="form-group">
                        <label class="form-label">Localité</label>
                        <input
                            type="text"
                            name="localite"
                            class="form-control"
                            placeholder="Ex: Abidjan, Plateau"
                        >
                    </div>

                    <!-- Ligue -->
                    <div class="form-group">
                        <label class="form-label">Ligue *</label>
                        <select name="id_ligue" class="form-control" required>
                            <option value="">Sélectionner une ligue</option>
                            @if(isset($ligues))
                                @foreach($ligues as $ligue)
                                    <option value="{{ $ligue->id_ligue }}">{{ $ligue->nom_ligue }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelModal">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        ✓ Créer le Club
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal elements
        const modalOverlay = document.getElementById('modalOverlay');
        const openModalBtn = document.getElementById('openModal');
        const openModalEmptyBtn = document.getElementById('openModalEmpty');
        const closeModalBtn = document.getElementById('closeModal');
        const cancelModalBtn = document.getElementById('cancelModal');

        // Open modal
        function openModal() {
            modalOverlay.classList.add('show');
        }

        // Close modal
        function closeModalFunc() {
            modalOverlay.classList.remove('show');
        }

        // Event listeners
        openModalBtn.addEventListener('click', openModal);
        openModalEmptyBtn?.addEventListener('click', openModal);
        closeModalBtn.addEventListener('click', closeModalFunc);
        cancelModalBtn.addEventListener('click', closeModalFunc);

        // Close modal on overlay click
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === modalOverlay) {
                closeModalFunc();
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModalFunc();
            }
        });

        // Search and filter
        document.getElementById('searchClub').addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.club-card');

            cards.forEach(card => {
                const title = card.dataset.clubName.toLowerCase();
                const matches = title.includes(searchTerm);
                card.style.display = matches ? 'block' : 'none';
            });
        });

        document.getElementById('filterType').addEventListener('change', function(e) {
            const filterType = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.club-card');

            cards.forEach(card => {
                const type = card.dataset.clubType.toLowerCase();
                const matches = !filterType || type.includes(filterType);
                card.style.display = matches ? 'block' : 'none';
            });
        });
    </script>
@endsection
