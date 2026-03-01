@extends('backend.layouts.app')

@section('title', 'Personnes - FIRAPE')
@section('page-title', '👥 Gestion des Personnes')

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
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
        }

        .personnes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .personne-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
            border-left: 4px solid #8b5cf6;
        }

        .personne-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .personne-header {
            background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .personne-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
            flex-shrink: 0;
        }

        .personne-header-info h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
        }

        .personne-header-info p {
            margin: 4px 0 0 0;
            font-size: 12px;
            opacity: 0.9;
        }

        .personne-body {
            padding: 20px;
        }

        .contact-section {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            font-size: 13px;
        }

        .contact-item:last-child {
            margin-bottom: 0;
        }

        .contact-label {
            color: #6b7280;
            font-weight: 500;
            min-width: 60px;
        }

        .contact-value {
            color: #1f2937;
            word-break: break-all;
        }

        .relations-section {
            margin-bottom: 15px;
        }

        .relation-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 0;
            font-size: 13px;
        }

        .relation-badge {
            display: inline-block;
            background: #e9d5ff;
            color: #6b21a8;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 12px;
            min-width: 30px;
            text-align: center;
        }

        .relation-label {
            color: #6b7280;
            font-weight: 500;
            min-width: 90px;
        }

        .personne-actions {
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
            color: #6b21a8;
        }

        .btn-view:hover {
            background-color: #ddd6fe;
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
            background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
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
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
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
            background: linear-gradient(135deg, #8b5cf6, #a78bfa);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .personnes-grid {
                grid-template-columns: 1fr;
            }

            .modal {
                width: 95%;
                max-height: 95vh;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .personne-header {
                flex-direction: column;
                text-align: center;
                align-items: center;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h2>Personnes</h2>
        <button class="btn btn-primary" id="openModal" style="cursor: pointer;">
            ➕ Ajouter une Personne
        </button>
    </div>

    <!-- Search Section -->
    <div class="search-section">
        <input
            type="text"
            class="search-input"
            id="searchPersonne"
            placeholder="🔍 Rechercher une personne (nom, email, téléphone)..."
        >
    </div>

    <!-- Personnes Grid -->
    @if(isset($personnes) && $personnes->count() > 0)
        <div class="personnes-grid">
            @foreach($personnes as $personne)
                <div class="personne-card"
                     data-personne-name="{{ $personne->getFullName() }}"
                     data-personne-email="{{ $personne->email ?? '' }}"
                     data-personne-tel="{{ $personne->telephone ?? '' }}">
                    <div class="personne-header">
                        <div class="personne-avatar">
                            {{ $personne->getInitials() }}
                        </div>
                        <div class="personne-header-info">
                            <h3>{{ $personne->getFullName() }}</h3>
                            @if($personne->pays)
                                <p>📍 {{ $personne->pays }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="personne-body">
                        <!-- Contact Information -->
                        @if($personne->hasContact())
                            <div class="contact-section">
                                @if($personne->email)
                                    <div class="contact-item">
                                        <span class="contact-label">📧 Email</span>
                                        <span class="contact-value">{{ $personne->email }}</span>
                                    </div>
                                @endif
                                @if($personne->telephone)
                                    <div class="contact-item">
                                        <span class="contact-label">📞 Tel</span>
                                        <span class="contact-value">{{ $personne->telephone }}</span>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <!-- Relations Summary -->
                        <div class="relations-section">
                            <div class="relation-item">
                                <span class="relation-label">Affectations</span>
                                <span class="relation-badge">{{ $personne->countAffectations() }}</span>
                            </div>
                            <div class="relation-item">
                                <span class="relation-label">Événements</span>
                                <span class="relation-badge">{{ $personne->countEvenements() }}</span>
                            </div>
                            <div class="relation-item">
                                <span class="relation-label">Commissions</span>
                                <span class="relation-badge">{{ $personne->countCommissions() }}</span>
                            </div>
                        </div>

                        <div class="personne-actions">
                            <a href="{{ route('personnes.show', $personne->id_personne) }}" class="action-btn btn-view">
                                👁 Voir
                            </a>
                            <a href="{{ route('personnes.edit', $personne->id_personne) }}" class="action-btn btn-edit">
                                ✏ Modifier
                            </a>
                            <form action="{{ route('personnes.destroy', $personne->id_personne) }}" method="POST" style="display: inline; flex: 1;">
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
            <div class="empty-icon">👥</div>
            <div class="empty-title">Aucune personne trouvée</div>
            <p class="empty-text">Commencez par enregistrer une nouvelle personne.</p>
            <button class="btn btn-primary" id="openModalEmpty" style="cursor: pointer;">
                ➕ Ajouter la première personne
            </button>
        </div>
    @endif

    <!-- ===== MODAL ===== -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal">
            <div class="modal-header">
                <h2>Ajouter une nouvelle personne</h2>
                <button class="modal-close" id="closeModal">&times;</button>
            </div>

            <form action="{{ route('personnes.store') }}" method="POST">
                <div class="modal-body">
                    @csrf

                    <!-- Nom -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nom *</label>
                            <input
                                type="text"
                                name="nom"
                                class="form-control"
                                placeholder="Ex: Dupont"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label class="form-label">Prénoms *</label>
                            <input
                                type="text"
                                name="prenoms"
                                class="form-control"
                                placeholder="Ex: Jean Pierre"
                                required
                            >
                        </div>
                    </div>

                    <!-- Email et Téléphone -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Ex: jean@example.com"
                            >
                        </div>

                        <div class="form-group">
                            <label class="form-label">Téléphone</label>
                            <input
                                type="tel"
                                name="telephone"
                                class="form-control"
                                placeholder="Ex: +225 01 23 45 67"
                            >
                        </div>
                    </div>

                    <!-- Pays -->
                    <div class="form-group">
                        <label class="form-label">Pays</label>
                        <input
                            type="text"
                            name="pays"
                            class="form-control"
                            placeholder="Ex: Côte d'Ivoire"
                        >
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelModal">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        ✓ Ajouter la Personne
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
        document.getElementById('searchPersonne').addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.personne-card');

            cards.forEach(card => {
                const name = card.dataset.personneNa me.toLowerCase();
                const email = card.dataset.personneEmail.toLowerCase();
                const tel = card.dataset.personneTel.toLowerCase();

                const matches = name.includes(searchTerm) ||
                               email.includes(searchTerm) ||
                               tel.includes(searchTerm);
                card.style.display = matches ? 'block' : 'none';
            });
        });
    </script>
@endsection
