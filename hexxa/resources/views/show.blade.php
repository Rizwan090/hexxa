<x-layout>
    <!-- resources/views/account/two-factor-confirmation/show.blade.php -->


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Confirm Two-Factor Authentication') }}</div>

                        <div class="card-body">
                            <p>Scan the QR code or manually enter the setup key into your authenticator app:</p>

                            <!-- Display QR code SVG -->
                            {!! $qrCodeSvg !!}

                            <!-- Display setup key -->
                            <p>Setup Key: <code>{{ $setupKey }}</code></p>

                            <!-- Confirmation form -->
                            <form method="POST" action="{{ route('account.two-factor-authentication.confirm.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="code">Enter Two-Factor Authentication Code</label>
                                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" required autofocus>
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-layout>
