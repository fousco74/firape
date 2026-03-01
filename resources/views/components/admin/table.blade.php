<div class="table-wrapper">
    <table class="modern-table">
        <thead>
            <tr>
                @foreach($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
                @if($actions)
                    <th class="text-center">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>

<style>
.table-wrapper {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,.05);
}

.modern-table {
    width: 100%;
    border-collapse: collapse;
}

.modern-table th {
    background: #f9fafb;
    padding: 14px 18px;
    text-align: left;
    font-size: 12px;
    text-transform: uppercase;
    color: #6b7280;
}

.modern-table td {
    padding: 16px 18px;
    font-size: 14px;
}

.modern-table tbody tr {
    border-top: 1px solid #f3f4f6;
}

.modern-table tbody tr:hover {
    background: #f9fafb;
}
</style>
