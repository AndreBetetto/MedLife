<div>
    <div class="user-type-badge">
        @if(Auth::check())
            @if(Auth::user()->role == 'medico')
                Médico
            @elseif(Auth::user()->role == 'paciente')
                Paciente
            @else
                User
            @endif
        @else
            Visitante
        @endif
        <span class="close-badge" onclick="closeUserTypeBadge()">X</span>
    </div>
    
    <script>
        function closeUserTypeBadge() {
            const badge = document.querySelector('.user-type-badge');
            badge.style.display = 'none';
        }
    </script>
</div>