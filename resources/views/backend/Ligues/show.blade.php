@extends('backend.layouts.app')

@section('title', 'Détails de la Ligue - FIRAPE')
@section('page-title', '🏆 Détails de la Ligue')

@section('styles')
<style>
    .show-container {
        max-width: 600px;
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .show-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #e5e7eb;
    }

    .info-group {
        margin-bottom: 25px;
    }

    .info-label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #6b7280;
        font-size: 13px;
        text-transform: uppercase;
    }

    .info-value {
        font-size: 16px;
        font-weight: 500;
        color: #1f2937;
        padding: 12px 16px;
        background: #f9fafb;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
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
<div class="show-container">

    <div class="show-header">
        <h2>{{ $ligue->nom_ligue }}</h2>
        <p>Informations de la ligue</p>
    </div>

    <div class="info-group">
        <span class="info-label">Nom de la Ligue</span>
        <div class="info-value">
            {{ $ligue->nom_ligue }}
        </div>
    </div>

    <div class="info-group">
        <span class="info-label">Type de Ligue</span>
        <div class="info-value">
            {{ $ligue->type_ligue ?? 'Non défini' }}
        </div>
    </div>

    <div class="info-group">
        <span class="info-label">Zone Géographique</span>
        <div class="info-value">
            {{ $ligue->zone ?? 'Non définie' }}
        </div>
    </div>

    <div class="actions">

        <button class="btn btn-secondary" onclick="window.history.back()">
            ← Retour
        </button>

        <a href="{{ route('ligues.edit', $ligue->id_ligue) }}" class="btn btn-primary">
            ✏️ Modifier
        </a>

    </div>

</div>
@endsection
