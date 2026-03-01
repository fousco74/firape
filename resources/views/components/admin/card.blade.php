@props([
    'title' => '',
    'icon' => '📊',
    'value' => '0',
    'trend' => null,
    'color' => 'var(--primary)'
])

<div class="stat-card">
    <div class="stat-card-header">
        <div class="stat-icon">{{ $icon }}</div>
        <span class="stat-title">{{ $title }}</span>
    </div>

    <div class="stat-value">{{ $value }}</div>

    @if($trend !== null)
        <div class="stat-trend {{ $trend > 0 ? 'up' : 'down' }}">
            {{ $trend > 0 ? '▲' : '▼' }} {{ abs($trend) }}%
        </div>
    @endif
</div>

<style>
.stat-card {
    background: white;
    padding: 24px;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0,0,0,.05);
    transition: all .25s ease;
    border: 1px solid var(--border);
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 30px rgba(0,0,0,.08);
}

.stat-card-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.stat-icon {
    font-size: 22px;
}

.stat-title {
    font-size: 13px;
    color: #6b7280;
    font-weight: 500;
}

.stat-value {
    font-size: 32px;
    font-weight: 700;
    margin-top: 8px;
}

.stat-trend {
    margin-top: 10px;
    font-size: 13px;
    font-weight: 600;
}

.stat-trend.up { color: #16a34a; }
.stat-trend.down { color: #dc2626; }
</style>
