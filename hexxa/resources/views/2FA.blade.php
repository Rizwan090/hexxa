<x-layout>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Confirming Two-Factor Authentication</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('verifyTwoFactor') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Enter your email address to verify two-factor authentication</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
