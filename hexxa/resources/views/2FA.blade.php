<x-layout>
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Confirming Two-Factor Authentication</div>
                <div class="card-body">
                    <!-- Form for verifying 2FA -->
                    <form method="POST" action="{{ route('verifyTwoFactor') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email_verify" class="form-label">Enter your email address to verify two-factor authentication</label>
                            <input type="email" class="form-control" id="email_verify" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Verify</button>
                    </form>

                    <!-- Form for disabling 2FA (only shown if 2FA is enabled) -->
{{--                    @if ($authenticatedUser->hasTwoFactorAuthenticationEnabled())--}}
{{--                        <form method="POST" action="{{ route('qr-destroy') }}">--}}
{{--                            @csrf--}}
{{--                            <div class="mb-3">--}}
{{--                                <label for="email_disable" class="form-label">Enter your email address to disable two-factor authentication</label>--}}
{{--                                <input type="email" class="form-control" id="email_disable" name="email" aria-describedby="emailHelp" placeholder="Enter email">--}}
{{--                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn-danger">Disable 2FA</button>--}}
{{--                        </form>--}}
{{--                    @endif--}}

                    @if(session('error'))
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
