@props([
    'type' => 'primary',
    'size' => 'md',
    'disabled' => false,
    'icon' => null
])

@php
    $base = "btn";
    $typeClass = "btn-$type";
    $sizeClass = "btn-$size";
@endphp

<button
    {{ $attributes->merge([
        'class' => "$base $typeClass $sizeClass"
    ]) }}
    @disabled($disabled)
>
    @if($icon)
        <span class="btn-icon">{{ $icon }}</span>
    @endif
    <span class="btn-text">{{ $slot }}</span>
</button>

<style>
.btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    border: none;
    transition: all .2s ease;
    position: relative;
    white-space: nowrap;
}

/* Focus Accessibility */
.btn:focus-visible {
    outline: none;
    box-shadow: 0 0 0 3px rgba(30,64,175,.3);
}

/* Active press effect */
.btn:active:not(:disabled) {
    transform: scale(.97);
}

.btn:disabled {
    opacity: .5;
    cursor: not-allowed;
}

/* PRIMARY */
.btn-primary {
    background: var(--primary);
    color: white;
}
.btn-primary:hover:not(:disabled) {
    background: #1e3a8a;
}

/* SECONDARY */
.btn-secondary {
    background: #f3f4f6;
    color: #374151;
}
.btn-secondary:hover {
    background: #e5e7eb;
}

/* SUCCESS */
.btn-success {
    background: var(--success);
    color: white;
}
.btn-success:hover {
    background: #059669;
}

/* DANGER */
.btn-danger {
    background: var(--danger);
    color: white;
}

/* OUTLINE */
.btn-outline {
    background: transparent;
    border: 2px solid var(--primary);
    color: var(--primary);
}
.btn-outline:hover {
    background: rgba(30,64,175,.05);
}

/* Sizes */
.btn-sm { padding: 8px 14px; font-size: 12px; }
.btn-md { padding: 10px 20px; font-size: 14px; }
.btn-lg { padding: 14px 28px; font-size: 16px; }
</style>
