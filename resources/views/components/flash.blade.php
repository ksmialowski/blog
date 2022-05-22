@if (session()->has('success'))
    <div class="toast-container position-absolute" style="bottom: 16px; right:16px;">
        <div class="toast fade show" id="toast">
            <div class="toast-header">
                <strong class="me-auto"><i class="bi-globe"></i> Powiadomienie </strong>
                <small>Właśnie teraz</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

<script>

    const TimeToHide = setTimeout(hideToast, 4000);
    function hideToast() {
        document.getElementById("toast").className = "toast fade hide";
    }

</script>
