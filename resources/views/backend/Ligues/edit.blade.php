@extends('backend.layouts.app')

@section('title', 'Modifier la Ligue - FIRAPE')
@section('page-title', '✏️ Modifier la Ligue')

@section('styles')
<style>
    .form-container {
        max-width: 600px;
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .form-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #e5e7eb;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #6b7280;
        font-size: 13px;
        text-transform: uppercase;
    }

    .form-control {
        width: 100%;
        font-size: 16px;
        padding: 12px 16px;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        background: #f9fafb;
    }

    .form-control:focus {
        outline: none;
        border-color: #1e40af;
        background: #fff;
    }

    .actions {
        display: flex;
        gap: 15px;
        margin-top: 35px;
        padding-top: 25px;
        border-top: 1px solid #e5e7eb;
    }

    .btn {
        flex: 1;
        padding: 12px 24px;
        border-radius: 8px;
        border: none;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        transition: 0.2s;
    }

    .btn-primary {
        background: #1e40af;
        color: white;
    }

    .btn-primary:hover {
        background: #1e3a8a;
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #374151;
    }

    .btn-secondary:hover {
        background: #d1d5db;
    }
</style>
@endsection

@section('content')
<div class="form-container">

    <div class="form-header">
        <h2>Modifier la Ligue</h2>
        <p>Mettre à jour les informations de la ligue</p>
    </div>

    <form action="{{ route('ligues.update', $ligue->id_ligue) }}" method="POST">

        @csrf
        @method('PUT')

        <!-- Nom Ligue -->
        <div class="form-group">
            <label class="form-label">Nom de la Ligue</label>
            <input
                type="text"
                name="nom_ligue"
                class="form-control"
                value="{{ old('nom_ligue', $ligue->nom_ligue) }}"
                required
            >
        </div>

        <!-- Type Ligue -->
        <div class="form-group">
            <label class="form-label">Type de Ligue</label>
            <select name="type_ligue" class="form-control">

                <option value="">Sélectionner</option>

                <option value="Professionnelle"
                    {{ old('type_ligue', $ligue->type_ligue) == 'Professionnelle' ? 'selected' : '' }}>
                    Professionnelle
                </option>

                <option value="Semi-Professionnelle"
                    {{ old('type_ligue', $ligue->type_ligue) == 'Semi-Professionnelle' ? 'selected' : '' }}>
                    Semi-Professionnelle
                </option>

                <option value="Amateurs"
                    {{ old('type_ligue', $ligue->type_ligue) == 'Amateurs' ? 'selected' : '' }}>
                    Amateurs
                </option>

                <option value="Jeunesse"
                    {{ old('type_ligue', $ligue->type_ligue) == 'Jeunesse' ? 'selected' : '' }}>
                    Jeunesse
                </option>

            </select>
        </div>

        <!-- Zone -->
        <div class="form-group">
            <label class="form-label">Zone Géographique</label>
            <input
                type="text"
                name="zone"
                class="form-control"
                value="{{ old('zone', $ligue->zone) }}"
            >
        </div>

        <div class="actions">

            <button type="button" class="btn btn-secondary" onclick="window.history.back()">
                ← Annuler
            </button>

            <button type="submit" class="btn btn-primary">
                ✓ Mettre à jour
            </button>

        </div>

    </form>

</div>
@endsection
