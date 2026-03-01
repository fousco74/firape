@extends('layouts.app')

@section('title', 'Créer une Ligue - FIRAPE')
@section('page-title', '🏆 Créer une Ligue')

@section('styles')
    <style>
        .form-container {
            max-width: 600px;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 25px;
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
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #1e40af;
            box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
            background-color: #f0f7ff;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .form-description {
            font-size: 13px;
            color: #6b7280;
            margin-top: 6px;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid #e5e7eb;
        }

        .form-actions button {
            flex: 1;
        }

        .error-message {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .form-group.has-error .form-control {
            border-color: #dc2626;
            background-color: #fef2f2;
        }

        .form-header {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e5e7eb;
        }

        .form-header p {
            color: #6b7280;
            margin-top: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="form-container">
        <div class="form-header">
            <h2>Créer une nouvelle ligue</h2>
            <p>Remplissez les informations pour ajouter une ligue à FIRAPE</p>
        </div>

        <form action="{{ route('ligues.store') }}" method="POST">
            @csrf

            <!-- Nom de la Ligue -->
            <div class="form-group @error('nom_ligue') has-error @enderror">
                <label class="form-label">Nom de la Ligue *</label>
                <input
                    type="text"
                    name="nom_ligue"
                    class="form-control"
                    placeholder="Ex: Ligue Nationale de Football"
                    value="{{ old('nom_ligue') }}"
                    required
                >
                @error('nom_ligue')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <p class="form-description">Le nom officiel de la ligue</p>
            </div>

            <!-- Type de Ligue -->
            <div class="form-group @error('type_ligue') has-error @enderror">
                <label class="form-label">Type de Ligue</label>
                <select name="type_ligue" class="form-control">
                    <option value="">Sélectionner un type</option>
                    <option value="Professionnelle" @selected(old('type_ligue') === 'Professionnelle')>
                        Professionnelle
                    </option>
                    <option value="Semi-Professionnelle" @selected(old('type_ligue') === 'Semi-Professionnelle')>
                        Semi-Professionnelle
                    </option>
                    <option value="Amateurs" @selected(old('type_ligue') === 'Amateurs')>
                        Amateurs
                    </option>
                    <option value="Jeunesse" @selected(old('type_ligue') === 'Jeunesse')>
                        Jeunesse
                    </option>
                    <option value="Féminines" @selected(old('type_ligue') === 'Féminines')>
                        Féminines
                    </option>
                </select>
                @error('type_ligue')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <p class="form-description">Catégorie de la ligue</p>
            </div>

            <!-- Zone -->
            <div class="form-group @error('zone') has-error @enderror">
                <label class="form-label">Zone Géographique</label>
                <input
                    type="text"
                    name="zone"
                    class="form-control"
                    placeholder="Ex: Région Académique d'Abidjan"
                    value="{{ old('zone') }}"
                >
                @error('zone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <p class="form-description">Zone couverte par la ligue</p>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <x-button type="secondary" onclick="window.history.back()">
                    ← Annuler
                </x-button>
                <button type="submit" class="btn btn-primary" style="padding: 12px 24px; font-size: 14px; font-weight: 600;">
                    ✓ Créer la Ligue
                </button>
            </div>
        </form>
    </div>
@endsection
