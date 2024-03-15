<x-layout>


    <section class="py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-5">
                        <h2 class="display-5 fw-bold text-center">This post is lock</h2>
                        <p class="text-center m-0">If you want to unlock this post you should pay for this</p>
                    </div>
                    <div class="modal-footer">
                        <!-- Display payment button only if the post is locked and has a price -->
                        @if ($post->is_locked && $post->price)
                            <button type="button" class="btn btn-primary">Pay ${{ $post->price }}</button>
                        @endif
                        <form action="/session" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" id="checkout-live-button" class="btn ss-btn">Stripe payment</button>
                        </form>
                    </div
                </div>
            </div>


</x-layout>
