@extends('backend.layouts.app')

@section('title', 'Événements - FIRAPE')
@section('page-title', '📅 Gestion des Événements')

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
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
        }

        .evenements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .evenement-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
            border-left: 4px solid #f59e0b;
        }

        .evenement-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .evenement-header {
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
            color: white;
            padding: 20px;
        }

        .evenement-header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }

        .evenement-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.25);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            margin-top: 8px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            margin-left: 8px;
        }

        .status-futur {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-encours {
            background: #dcfce7;
            color: #166534;
        }

        .status-passee {
            background: #f3f4f6;
            color: #6b7280;
        }

        .evenement-body {
            padding: 20px;
        }

        .evenement-info {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            align-items: center;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .info-label {
            font-size: 12px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .info-value {
            font-weight: 600;
            color: #1f2937;
            text-align: right;
        }

        .evenement-actions {
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
            background-color: #fef3c7;
            color: #b45309;
        }

        .btn-view:hover {
            background-color: #fde68a;
        }

        .btn-edit {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .btn-edit:hover {
            background-color: #bfdbfe;
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
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 550px;
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
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
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
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
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
            background: linear-gradient(135deg, #f59e0b, #f97316);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .evenements-grid {
                grid-template-columns: 1fr;
            }

            .modal {
                width: 95%;
                max-height: 95vh;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .info-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-value {
                text-align: left;
                margin-top: 4px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h2>Événements Sportifs</h2>
        <button class="btn btn-primary" id="openModal" style="cursor: pointer;">
            ➕ Ajouter un Événement
        </button>
    </div>

    <!-- Search Section -->
    <div class="search-section">
        <input
            type="text"
            class="search-input"
            id="searchEvenement"
            placeholder="🔍 Rechercher un événement..."
        >
        <select class="search-input" id="filterActivite" style="flex: 0 1 200px;">
            <option value="">Toutes les activités</option>
            @if(isset($activites))
                @foreach($activites as $activite)
                    <option value="{{ $activite->id_activite }}">{{ $activite->libelle ?? 'N/A' }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <!-- Événements Grid -->
    @if(isset($evenements) && $evenements->count() > 0)
        <div class="evenements-grid">
            @foreach($evenements as $evenement)
                <div class="evenement-card"
                     data-evenement-name="{{ $evenement->nom }}"
                     data-evenement-activite="{{ $evenement->id_activite }}">
                    <div class="evenement-header">
                        <h3>
                            {{ $evenement->nom }}
                            @if($evenement->isFutur())
                                <span class="status-badge status-futur">À venir</span>
                            @elseif($evenement->isEnCours())
                                <span class="status-badge status-encours">En cours</span>
                            @else
                                <span class="status-badge status-passee">Passé</span>
                            @endif
                        </h3>
                        @if($evenement->activite)
                            <span class="evenement-badge">{{ $evenement->activite->libelle ?? 'N/A' }}</span>
                        @endif
                    </div>

                    <div class="evenement-body">
                        <div class="evenement-info">
                            <div class="info-row">
                                <span class="info-label">📅 Début</span>
                                <span class="info-value">{{ $evenement->date_debut->format('d/m/Y') }}</span>
                            </div>
                            @if($evenement->date_fin)
                                <div class="info-row">
                                    <span class="info-label">📅 Fin</span>
                                    <span class="info-value">{{ $evenement->date_fin->format('d/m/Y') }}</span>
                                </div>
                            @endif
                            @if($evenement->lieu)
                                <div class="info-row">
                                    <span class="info-label">📍 Lieu</span>
                                    <span class="info-value">{{ $evenement->lieu }}</span>
                                </div>
                            @endif
                            <div class="info-row">
                                <span class="info-label">👥 Participants</span>
                                <span class="info-value">{{ $evenement->countParticipants() }}</span>
                            </div>
                        </div>

                        <div class="evenement-actions">
                            <a href="{{ route('evenements.show', $evenement->id_evenement) }}" class="action-btn btn-view">
                                👁 Voir
                            </a>
                            <a href="{{ route('evenements.edit', $evenement->id_evenement) }}" class="action-btn btn-edit">
                                ✏ Modifier
                            </a>
                            <form action="{{ route('evenements.destroy', $evenement->id_evenement) }}" method="POST" style="display: inline; flex: 1;">
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
            <div class="empty-icon">📅</div>
            <div class="empty-title">Aucun événement trouvé</div>
            <p class="empty-text">Commencez par créer un nouvel événement pour organiser vos activités sportives.</p>
            <button class="btn btn-primary" id="openModalEmpty" style="cursor: pointer;">
                ➕ Créer le premier événement
            </button>
        </div>
    @endif

    <!-- ===== MODAL ===== -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal">
            <div class="modal-header">
                <h2>Ajouter un nouvel événement</h2>
                <button class="modal-close" id="closeModal">&times;</button>
            </div>

            <form action="{{ route('evenements.store') }}" method="POST">
                <div class="modal-body">
                    @csrf

                    <!-- Nom de l'Événement -->
                    <div class="form-group">
                        <label class="form-label">Nom de l'Événement *</label>
                        <input
                            type="text"
                            name="nom"
                            class="form-control"
                            placeholder="Ex: Championnat National de Football"
                            required
                        >
                    </div>

                    <!-- Dates -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Date de Début *</label>
                            <input
                                type="date"
                                name="date_debut"
                                class="form-control"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label class="form-label">Date de Fin</label>
                            <input
                                type="date"
                                name="date_fin"
                                class="form-control"
                            >
                        </div>
                    </div>

                    <!-- Lieu -->
                    <div class="form-group">
                        <label class="form-label">Lieu</label>
                        <input
                            type="text"
                            name="lieu"
                            class="form-control"
                            placeholder="Ex: Stade Félix Houphouët-Boigny"
                        >
                    </div>

                    <!-- Activité -->
                    <div class="form-group">
                        <label class="form-label">Activité *</label>
                        <select name="id_activite" class="form-control" required>
                            <option value="">Sélectionner une activité</option>
                            @if(isset($activites))
                                @foreach($activites as $activite)
                                    <option value="{{ $activite->id_activite }}">{{ $activite->libelle }}</option>
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
                        ✓ Créer l'Événement
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

        // Search functionality
        document.getElementById('searchEvenement').addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.evenement-card');

            cards.forEach(card => {
                const title = card.dataset.evenementName.toLowerCase();
                const matches = title.includes(searchTerm);
                card.style.display = matches ? 'block' : 'none';
            });
        });

        // Filter by activite
        document.getElementById('filterActivite').addEventListener('change', function(e) {
            const filterActivite = e.target.value;
            const cards = document.querySelectorAll('.evenement-card');

            cards.forEach(card => {
                const activite = card.dataset.evenementActivite;
                const matches = !filterActivite || activite === filterActivite;
                card.style.display = matches ? 'block' : 'none';
            });
        });

        // Date validation - ensure end date >= start date
        const dateDebutInput = document.querySelector('input[name="date_debut"]');
        const dateFinInput = document.querySelector('input[name="date_fin"]');

        if (dateDebutInput && dateFinInput) {
            dateDebutInput.addEventListener('change', function() {
                dateFinInput.min = this.value;
            });
        }
    </script>
@endsection
