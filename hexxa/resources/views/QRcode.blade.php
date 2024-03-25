<x-layout>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Confirm Two-Factor Authentication Setup</div>
                <div class="card-body">
                    <p>Scan the following QR code into your authenticator App:</p>
                    <form method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">After scanning the QR code or entering the secret key, generate a verification code from your authenticator app and enter it below.</label>
                            <span>Verification Code:</span>
                            <input type="text" class="form-control" id="text" name="text" aria-describedby="" placeholder="Enter your code">

                        </div>
                        <button type="submit" class="btn btn-primary">Confirm Code</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-layout>
