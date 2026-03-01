@extends('backend.layouts.app')

@section('title', 'Ligues - FIRAPE')
@section('page-title', '🏆 Gestion des Ligues')

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
            border-color: #1e40af;
            box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
        }

        .ligues-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .ligue-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
            border-left: 4px solid #1e40af;
        }

        .ligue-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .ligue-header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            padding: 20px;
        }

        .ligue-header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }

        .ligue-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.25);
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            margin-top: 8px;
            font-weight: 500;
        }

        .ligue-body {
            padding: 20px;
        }

        .ligue-info {
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

        .ligue-actions {
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
            background-color: #e0e7ff;
            color: #1e40af;
        }

        .btn-view:hover {
            background-color: #c7d2fe;
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
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
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
            border-color: #1e40af;
            box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
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
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(30, 64, 175, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .ligues-grid {
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
        <h2>Ligues Sportives</h2>
        <button class="btn btn-primary" id="openModal" style="cursor: pointer;">
            ➕ Ajouter une Ligue
        </button>
    </div>

    <!-- Search Section -->
    <div class="search-section">
        <input
            type="text"
            class="search-input"
            id="searchLigue"
            placeholder="🔍 Rechercher une ligue..."
        >
        <select class="search-input" id="filterType" style="flex: 0 1 200px;">
            <option value="">Tous les types</option>
            <option value="Professionnelle">Professionnelle</option>
            <option value="Semi-Professionnelle">Semi-Professionnelle</option>
            <option value="Amateurs">Amateurs</option>
            <option value="Jeunesse">Jeunesse</option>
        </select>
    </div>

    <!-- Ligues Grid -->
    @if(isset($ligues) && $ligues->count() > 0)
        <div class="ligues-grid">
            @foreach($ligues as $ligue)
                <div class="ligue-card" data-ligue-name="{{ $ligue->nom_ligue }}" data-ligue-type="{{ $ligue->type_ligue ?? '' }}">
                    <div class="ligue-header">
                        <h3>{{ $ligue->nom_ligue }}</h3>
                        @if($ligue->type_ligue)
                            <span class="ligue-badge">{{ $ligue->type_ligue }}</span>
                        @endif
                    </div>

                    <div class="ligue-body">
                        <div class="ligue-info">
                            <div class="info-item">
                                <div class="info-label">Zone</div>
                                <div class="info-value">{{ $ligue->zone ?? 'N/A' }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Clubs</div>
                                <div class="info-value">{{ $ligue->clubs->count() ?? 0 }}</div>
                            </div>
                        </div>

                        <div class="ligue-actions">
                            <a href="{{ route('ligues.show', $ligue->id_ligue) }}" class="action-btn btn-view">
                                👁 Voir
                            </a>
                            <a href="{{ route('ligues.edit', $ligue->id_ligue) }}" class="action-btn btn-edit">
                                ✏ Modifier
                            </a>
                            <form action="{{ route('ligues.destroy', $ligue->id_ligue) }}" method="POST" style="display: inline; flex: 1;">
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
            <div class="empty-icon">🏆</div>
            <div class="empty-title">Aucune ligue trouvée</div>
            <p class="empty-text">Commencez par créer une nouvelle ligue pour organiser vos compétitions.</p>
            <button class="btn btn-primary" id="openModalEmpty" style="cursor: pointer;">
                ➕ Créer la première ligue
            </button>
        </div>
    @endif

    <!-- ===== MODAL ===== -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal">
            <div class="modal-header">
                <h2>Ajouter une nouvelle ligue</h2>
                <button class="modal-close" id="closeModal">&times;</button>
            </div>

            <form action="{{ route('ligues.store') }}" method="POST">
                <div class="modal-body">
                    @csrf

                    <!-- Nom de la Ligue -->
                    <div class="form-group">
                        <label class="form-label">Nom de la Ligue *</label>
                        <input
                            type="text"
                            name="nom_ligue"
                            class="form-control"
                            placeholder="Ex: Ligue Nationale de Football"
                            required
                        >
                    </div>

                    <!-- Type de Ligue -->
                    <div class="form-group">
                        <label class="form-label">Type de Ligue</label>
                        <select name="type_ligue" class="form-control">
                            <option value="">Sélectionner un type</option>
                            <option value="Professionnelle">Professionnelle</option>
                            <option value="Semi-Professionnelle">Semi-Professionnelle</option>
                            <option value="Amateurs">Amateurs</option>
                            <option value="Jeunesse">Jeunesse</option>
                            <option value="Féminines">Féminines</option>
                        </select>
                    </div>

                    <!-- Zone -->
                    <div class="form-group">
                        <label class="form-label">Zone Géographique</label>
                        <input
                            type="text"
                            name="zone"
                            class="form-control"
                            placeholder="Ex: Région Académique d'Abidjan"
                        >
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelModal">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        ✓ Créer la Ligue
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
        document.getElementById('searchLigue').addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.ligue-card');

            cards.forEach(card => {
                const title = card.dataset.ligueName.toLowerCase();
                const matches = title.includes(searchTerm);
                card.style.display = matches ? 'block' : 'none';
            });
        });

        document.getElementById('filterType').addEventListener('change', function(e) {
            const filterType = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.ligue-card');

            cards.forEach(card => {
                const type = card.dataset.ligueType.toLowerCase();
                const matches = !filterType || type.includes(filterType);
                card.style.display = matches ? 'block' : 'none';
            });
        });
    </script>
@endsection
