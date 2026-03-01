@extends('backend.layouts.app')

@section('title', 'Profil - FIRAPE')
@section('page-title', '👤 Mon Profil')

@section('styles')
    <style>
        .profile-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .profile-section {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }

        .profile-section:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .profile-section-title {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-section-icon {
            font-size: 22px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
            font-size: 14px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #9ca3af;
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-helper {
            font-size: 12px;
            color: #6b7280;
            margin-top: 6px;
        }

        .form-error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 25px;
            align-items: center;
        }

        .button-group.justify-between {
            justify-content: space-between;
        }

        .button-group.justify-end {
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

        .btn-primary {
            background: linear-gradient(135deg, #8b5cf6, #a78bfa);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .btn-danger {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn-danger:hover {
            background: #fecaca;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid #e5e7eb;
            color: #374151;
        }

        .btn-outline:hover {
            background: #f9fafb;
            border-color: #d1d5db;
        }

        .success-message {
            background: #dcfce7;
            color: #166534;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #16a34a;
        }

        .error-message {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #dc2626;
        }

        .profile-avatar {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e7eb;
        }

        .avatar-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #8b5cf6, #a78bfa);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 32px;
        }

        .avatar-info h3 {
            margin: 0 0 6px 0;
            font-size: 16px;
            font-weight: 700;
            color: #1f2937;
        }

        .avatar-info p {
            margin: 0;
            font-size: 13px;
            color: #6b7280;
        }

        .delete-warning {
            background: #fef3c7;
            border: 1px solid #fbbf24;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
        }

        .delete-warning-title {
            font-weight: 700;
            color: #92400e;
            margin-bottom: 8px;
        }

        .delete-warning-text {
            font-size: 14px;
            color: #b45309;
            line-height: 1.5;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-container {
                padding: 0 15px;
            }

            .profile-section {
                padding: 20px;
            }

            .button-group {
                flex-direction: column;
            }

            .button-group.justify-between,
            .button-group.justify-end {
                justify-content: stretch;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
@endsection

@section('content')
    <div class="profile-container">
        {{-- Messages de succès --}}
        @if(session('status') === 'profile-updated')
            <div class="success-message">
                ✓ Votre profil a été mis à jour avec succès!
            </div>
        @endif

        @if(session('status') === 'password-updated')
            <div class="success-message">
                ✓ Votre mot de passe a été modifié avec succès!
            </div>
        @endif

        <!-- Section: Informations de Profil -->
        <div class="profile-section">
            <div class="profile-section-title">
                <span class="profile-section-icon">📋</span>
                Informations du Profil
            </div>

            {{-- Avatar --}}
            <div class="profile-avatar">
                @php
                    $initials = substr(auth()->user()->name ?? 'U', 0, 1) .
                               (strpos(auth()->user()->name ?? '', ' ') ?
                                substr(auth()->user()->name, strpos(auth()->user()->name, ' ') + 1, 1) :
                                '');
                @endphp
                <div class="avatar-image">
                    {{ strtoupper($initials) }}
                </div>
                <div class="avatar-info">
                    <h3>{{ auth()->user()->name }}</h3>
                    <p>{{ auth()->user()->email }}</p>
                </div>
            </div>

            {{-- Formulaire de mise à jour --}}
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <!-- Nom -->
                <div class="form-group">
                    <label class="form-label" for="name">Nom Complet *</label>
                    <input
                        class="form-input @error('name') border-red-500 @enderror"
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', auth()->user()->name) }}"
                        required
                        autofocus
                    >
                    @error('name')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label" for="email">Adresse Email *</label>
                    <input
                        class="form-input @error('email') border-red-500 @enderror"
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', auth()->user()->email) }}"
                        required
                    >
                    @error('email')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Boutons --}}
                <div class="button-group justify-end">
                    <button type="submit" class="btn btn-primary">
                        ✓ Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>

        <!-- Section: Changer le Mot de Passe -->
        <div class="profile-section">
            <div class="profile-section-title">
                <span class="profile-section-icon">🔒</span>
                Changer le Mot de Passe
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <!-- Mot de passe actuel -->
                <div class="form-group">
                    <label class="form-label" for="current_password">Mot de passe actuel *</label>
                    <input
                        class="form-input @error('current_password') border-red-500 @enderror"
                        type="password"
                        id="current_password"
                        name="current_password"
                        required
                        autocomplete="current-password"
                    >
                    @error('current_password')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nouveau mot de passe -->
                <div class="form-group">
                    <label class="form-label" for="password">Nouveau mot de passe *</label>
                    <input
                        class="form-input @error('password') border-red-500 @enderror"
                        type="password"
                        id="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    >
                    <div class="form-helper">Au moins 8 caractères</div>
                    @error('password')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmer le mot de passe -->
                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Confirmer le mot de passe *</label>
                    <input
                        class="form-input @error('password_confirmation') border-red-500 @enderror"
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    >
                    @error('password_confirmation')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Boutons --}}
                <div class="button-group justify-end">
                    <button type="submit" class="btn btn-primary">
                        ✓ Mettre à jour le mot de passe
                    </button>
                </div>
            </form>
        </div>

        <!-- Section: Zone de Danger -->
        <div class="profile-section">
            <div class="profile-section-title">
                <span class="profile-section-icon">⚠️</span>
                Zone de Danger
            </div>

            <div class="delete-warning">
                <div class="delete-warning-title">Supprimer votre compte</div>
                <div class="delete-warning-text">
                    Une fois votre compte supprimé, il n'y a pas de retour en arrière. Veuillez être certain.
                </div>
            </div>

            <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Êtes-vous sûr? Cette action est irréversible!');">
                @csrf
                @method('DELETE')

                <!-- Mot de passe de confirmation -->
                <div class="form-group">
                    <label class="form-label" for="password_delete">Mot de passe pour confirmer la suppression *</label>
                    <input
                        class="form-input @error('password', 'userDeletion') border-red-500 @enderror"
                        type="password"
                        id="password_delete"
                        name="password"
                        required
                        placeholder="Entrez votre mot de passe"
                    >
                    @error('password', 'userDeletion')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Boutons --}}
                <div class="button-group justify-end">
                    <button type="button" class="btn btn-outline" onclick="history.back();">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte? Cette action est irréversible!');">
                        🗑 Supprimer le compte
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Auto-hide success messages after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const messages = document.querySelectorAll('.success-message, .error-message');
            messages.forEach(msg => {
                setTimeout(() => {
                    msg.style.transition = 'opacity 0.3s ease';
                    msg.style.opacity = '0';
                    setTimeout(() => msg.remove(), 300);
                }, 5000);
            });
        });
    </script>
@endsection
