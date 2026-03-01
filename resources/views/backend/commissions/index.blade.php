@extends('backend.layouts.app')

@section('title', 'Commissions - FIRAPE')
@section('page-title', '🤝 Gestion des Commissions')

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
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .commissions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .commission-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
            border-left: 4px solid #10b981;
        }

        .commission-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .commission-header {
            background: linear-gradient(135deg, #10b981 0%, #14b8a6 100%);
            color: white;
            padding: 20px;
        }

        .commission-header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }

        .commission-badge {
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

        .commission-body {
            padding: 20px;
        }

        .commission-info {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .info-item {
            margin-bottom: 12px;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-label {
            font-size: 12px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .info-value {
            font-weight: 600;
            color: #1f2937;
        }

        .members-list {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .member-tag {
            display: inline-flex;
            align-items: center;
            background: #ecfdf5;
            color: #065f46;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
            width: fit-content;
        }

        .member-count {
            display: inline-block;
            background: #d1fae5;
            color: #047857;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .commission-actions {
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
            background-color: #d1fae5;
            color: #047857;
        }

        .btn-view:hover {
            background-color: #a7f3d0;
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
            background: linear-gradient(135deg, #10b981 0%, #14b8a6 100%);
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
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
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
            background: linear-gradient(135deg, #10b981, #14b8a6);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .commissions-grid {
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
        <h2>Commissions</h2>
        <button class="btn btn-primary" id="openModal" style="cursor: pointer;">
            ➕ Ajouter une Commission
        </button>
    </div>

    <!-- Search Section -->
    <div class="search-section">
        <input
            type="text"
            class="search-input"
            id="searchCommission"
            placeholder="🔍 Rechercher une commission..."
        >
    </div>

    <!-- Commissions Grid -->
    @if(isset($commissions) && $commissions->count() > 0)
        <div class="commissions-grid">
            @foreach($commissions as $commission)
                <div class="commission-card" data-commission-name="{{ $commission->nom_commission }}">
                    <div class="commission-header">
                        <h3>{{ $commission->nom_commission }}</h3>
                        <span class="commission-badge">🤝 Commission</span>
                    </div>

                    <div class="commission-body">
                        <div class="commission-info">
                            <div class="info-item">
                                <div class="info-label">Membres</div>
                                <span class="member-count">
                                    👥 {{ $commission->countMembres() }}
                                </span>
                            </div>

                            @if($commission->hasMembres())
                                <div class="info-item">
                                    <div class="info-label">Liste des Membres</div>
                                    <div class="members-list">
                                        @foreach($commission->personnes as $personne)
                                            <span class="member-tag">
                                                {{ $personne->nom }} {{ $personne->prenoms ?? '' }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="info-item">
                                    <div class="info-label">Status</div>
                                    <div class="info-value">Aucun membre</div>
                                </div>
                            @endif
                        </div>

                        <div class="commission-actions">
                            <a href="{{ route('commissions.show', $commission->id_commission) }}" class="action-btn btn-view">
                                👁 Voir
                            </a>
                            <a href="{{ route('commissions.edit', $commission->id_commission) }}" class="action-btn btn-edit">
                                ✏ Modifier
                            </a>
                            <form action="{{ route('commissions.destroy', $commission->id_commission) }}" method="POST" style="display: inline; flex: 1;">
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
            <div class="empty-icon">🤝</div>
            <div class="empty-title">Aucune commission trouvée</div>
            <p class="empty-text">Commencez par créer une nouvelle commission pour organiser vos collaborateurs.</p>
            <button class="btn btn-primary" id="openModalEmpty" style="cursor: pointer;">
                ➕ Créer la première commission
            </button>
        </div>
    @endif

    <!-- ===== MODAL ===== -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal">
            <div class="modal-header">
                <h2>Ajouter une nouvelle commission</h2>
                <button class="modal-close" id="closeModal">&times;</button>
            </div>

            <form action="{{ route('commissions.store') }}" method="POST">
                <div class="modal-body">
                    @csrf

                    <!-- Nom de la Commission -->
                    <div class="form-group">
                        <label class="form-label">Nom de la Commission *</label>
                        <input
                            type="text"
                            name="nom_commission"
                            class="form-control"
                            placeholder="Ex: Commission de Développement"
                            required
                        >
                        @error('nom_commission')
                            <span style="color: #dc2626; font-size: 12px; margin-top: 4px; display: block;">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelModal">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        ✓ Créer la Commission
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
        document.getElementById('searchCommission').addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.commission-card');

            cards.forEach(card => {
                const title = card.dataset.commissionName.toLowerCase();
                const matches = title.includes(searchTerm);
                card.style.display = matches ? 'block' : 'none';
            });
        });
    </script>
@endsection
