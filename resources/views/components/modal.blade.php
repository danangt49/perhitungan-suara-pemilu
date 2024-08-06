<div id="{{ $id }}" class="modal">
    <div class="modal-content">
        <span class="close" data-modal="{{ $id }}">&times;</span>
        <h2>{{ $title }}</h2>
        <div class="modal-body">
            {{ $slot }} <!-- Slot untuk konten modal -->
        </div>
        <div class="modal-footer">
            {{ $footer ?? '' }} <!-- Slot untuk footer modal (opsional) -->
        </div>
    </div>
</div>