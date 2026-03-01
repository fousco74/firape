@extends('backend.layouts.app')

@section('title', 'Tableau de bord - FIRAPE')
@section('page-title', '📊 Tableau de bord')

@section('styles')
    <style>
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .charts-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .chart-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .chart-title {
            margin-bottom: 14px;
            color: #1f2937;
            font-weight: 800;
        }

        .quick-actions {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
        }

        .quick-actions h3 {
            margin-bottom: 20px;
            color: #1f2937;
            font-weight: 700;
        }

        .actions-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .list-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .list-card h3 {
            margin-bottom: 20px;
            color: #1f2937;
            font-weight: 700;
        }

        .list-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .list-item:last-child {
            border-bottom: none;
        }

        .list-item-main {
            flex: 1;
        }

        .list-item-title {
            font-weight: 600;
            color: #1f2937;
        }

        .list-item-subtitle {
            font-size: 12px;
            color: #6b7280;
            margin-top: 4px;
        }

        .list-item-link {
            color: #1e40af;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .list-item-link:hover {
            color: #1e3a8a;
            text-decoration: underline;
        }

        .empty-state {
            color: #9ca3af;
            text-align: center;
            padding: 20px;
            font-style: italic;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
                margin-bottom: 30px;
            }

            .charts-section {
                grid-template-columns: 1fr;
                gap: 15px;
                margin-bottom: 30px;
            }

            .actions-grid {
                gap: 10px;
            }

            .chart-card,
            .list-card,
            .quick-actions {
                padding: 20px;
                border-radius: 10px;
            }
        }
    </style>
@endsection

@section('content')
    @php
        // Fallbacks si base vide / variables non envoyées
        $liguesCount = $liguesCount ?? 3;
        $clubsCount = $clubsCount ?? 12;
        $evenementsCount = $evenementsCount ?? 6;
        $personnesCount = $personnesCount ?? 48;

        $ligues = $ligues ?? collect([
            (object) ['id_ligue' => 1, 'nom_ligue' => 'Ligue Abidjan', 'type_ligue' => 'Urbaine'],
            (object) ['id_ligue' => 2, 'nom_ligue' => 'Ligue Sud-Comoé', 'type_ligue' => 'Régionale'],
            (object) ['id_ligue' => 3, 'nom_ligue' => 'Ligue Gbêkê', 'type_ligue' => 'Régionale'],
        ]);

        $evenements = $evenements ?? collect([
            (object) ['id_evenement' => 1, 'nom' => 'Marche Santé - Plateau', 'date_debut' => '2026-02-20'],
            (object) ['id_evenement' => 2, 'nom' => 'Randonnée Banco', 'date_debut' => '2026-03-05'],
            (object) ['id_evenement' => 3, 'nom' => 'Journée Bien-être', 'date_debut' => '2026-03-18'],
        ]);

        // Données démo pour graphes
        $eventsMonths = $eventsMonths ?? collect(['2025-09','2025-10','2025-11','2025-12','2026-01','2026-02']);
        $eventsTotals = $eventsTotals ?? collect([2, 4, 3, 5, 6, 4]);

        $ligueLabels = $ligueLabels ?? collect(['Ligue Abidjan', 'Ligue Sud-Comoé', 'Ligue Gbêkê']);
        $ligueClubs  = $ligueClubs  ?? collect([6, 3, 3]);

        $roleLabels = $roleLabels ?? collect(['Participant', 'Encadreur', 'Organisation', 'Invité']);
        $roleTotals = $roleTotals ?? collect([72, 10, 6, 5]);
    @endphp

    <!-- 📊 Top Statistics Cards -->
    <div class="dashboard-grid">
        <x-admin.card
            title="Ligues Actives"
            icon="🏆"
            value="{{ $liguesCount ?? 0 }}"
            trend="12"
            bgColor="linear-gradient(135deg, #1e40af, #3b82f6)"
        />

        <x-admin.card
            title="Clubs"
            icon="⚽"
            value="{{ $clubsCount ?? 0 }}"
            trend="8"
            bgColor="linear-gradient(135deg, #7c3aed, #a855f7)"
        />

        <x-admin.card
            title="Événements"
            icon="📅"
            value="{{ $evenementsCount ?? 0 }}"
            trend="15"
            bgColor="linear-gradient(135deg, #f59e0b, #f97316)"
        />

        <x-admin.card
            title="Participants"
            icon="👥"
            value="{{ $personnesCount ?? 0 }}"
            trend="20"
            bgColor="linear-gradient(135deg, #10b981, #14b8a6)"
        />
    </div>

    <!-- 📈 Charts Section -->
    <div class="charts-section">
        <!-- Line Chart: Events by Month -->
        <div class="chart-card">
            <h3 class="chart-title">📈 Événements (6 derniers mois)</h3>
            <canvas id="eventsByMonthChart" height="120"></canvas>
        </div>

        <!-- Bar Chart: Clubs by League -->
        <div class="chart-card">
            <h3 class="chart-title">🏆 Clubs par ligue</h3>
            <canvas id="clubsByLigueChart" height="120"></canvas>
        </div>


    </div>

    <!-- 📋 Lists Section -->
    <div class="charts-section">
        <!-- Dernières Ligues -->
        <div class="list-card">
            <h3>📊 Dernières Ligues</h3>

            @if(isset($ligues) && $ligues->count() > 0)
                @foreach($ligues->take(5) as $ligue)
                    <div class="list-item">
                        <div class="list-item-main">
                            <div class="list-item-title">{{ $ligue->nom_ligue }}</div>
                            <div class="list-item-subtitle">{{ $ligue->type_ligue ?? 'N/A' }}</div>
                        </div>
                        <a href="{{ route('ligues.show', $ligue->id_ligue) }}" class="list-item-link">
                            Voir →
                        </a>
                    </div>
                @endforeach
            @else
                <div class="empty-state">Aucune ligue trouvée</div>
            @endif
        </div>

        <!-- Événements à venir -->
        <div class="list-card">
            <h3>📅 Événements à venir</h3>

            @if(isset($evenements) && $evenements->count() > 0)
                @foreach($evenements->take(5) as $event)
                    <div class="list-item">
                        <div class="list-item-main">
                            <div class="list-item-title">{{ $event->nom }}</div>
                            <div class="list-item-subtitle">
                                @php
                                    $dateStr = is_string($event->date_debut ?? null)
                                        ? $event->date_debut
                                        : optional($event->date_debut)->format('Y-m-d') ?? '';
                                    $formattedDate = \Illuminate\Support\Carbon::parse($dateStr)->format('d/m/Y');
                                @endphp
                                {{ $formattedDate }}
                            </div>
                        </div>
                        <a href="{{ route('evenements.show', $event->id_evenement) }}" class="list-item-link">
                            Voir →
                        </a>
                    </div>
                @endforeach
            @else
                <div class="empty-state">Aucun événement trouvé</div>
            @endif
        </div>
    </div>

    <!-- Chart.js Library (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.6/dist/chart.umd.min.js"></script>

    <!-- Charts Initialization -->
    <script>
        // Pass data from PHP to JavaScript
        const eventsMonths = @json($eventsMonths);
        const eventsTotals = @json($eventsTotals);
        const ligueLabels = @json($ligueLabels);
        const ligueClubs  = @json($ligueClubs);
        const roleLabels = @json($roleLabels);
        const roleTotals = @json($roleTotals);

        // Color scheme
        const colors = {
            primary: '#1e40af',
            secondary: '#7c3aed',
            accent: '#f59e0b',
            success: '#10b981',
            danger: '#ef4444',
        };

        // 1️⃣ Line Chart - Events by Month
        new Chart(document.getElementById('eventsByMonthChart'), {
            type: 'line',
            data: {
                labels: eventsMonths,
                datasets: [{
                    label: 'Événements',
                    data: eventsTotals,
                    borderColor: colors.primary,
                    backgroundColor: 'rgba(30, 64, 175, 0.1)',
                    borderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: colors.primary,
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: { usePointStyle: true, padding: 15 }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0, 0, 0, 0.05)' }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });

        // 2️⃣ Bar Chart - Clubs by League
        new Chart(document.getElementById('clubsByLigueChart'), {
            type: 'bar',
            data: {
                labels: ligueLabels,
                datasets: [{
                    label: 'Clubs',
                    data: ligueClubs,
                    backgroundColor: [
                        'rgba(30, 64, 175, 0.8)',
                        'rgba(124, 58, 237, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                    ],
                    borderColor: [
                        colors.primary,
                        colors.secondary,
                        colors.accent,
                    ],
                    borderWidth: 2,
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: { usePointStyle: true, padding: 15 }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0, 0, 0, 0.05)' }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });

        
    </script>
@endsection
