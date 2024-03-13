@if(session()->has('success'))
    <div id="alertMessage" class="position-fixed bottom-3 end-3 p-3 bg-success text-white rounded-3" style="z-index: 5;">
        <p>{{ session('success') }}</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var alertMessage = document.getElementById('alertMessage');
            var bootstrapAlert = new bootstrap.Toast(alertMessage);

            bootstrapAlert.show();

            setTimeout(function () {
                bootstrapAlert.hide();
            }, 6000);
        });
    </script>
@endif
