<x-profile-layout>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Main Content -->
    <main class="container mt-4">
        <div class="card p-4 shadow-sm">
            <h2 class="fw-bold mb-3 text-start">{{ __('Profile Information') }}</h2>
            <p class="text-start">{{ __('Update your account’s profile information and email address.') }}</p>
            
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="mb-3 text-start">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                </div>

                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                </div>

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="alert alert-warning mt-3 text-start">
                        <p class="mb-1">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="btn btn-link p-0">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="text-success mt-2">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif

                <div class="d-flex justify-content-start gap-3 mt-4">
                    <button type="submit" class="btn btn-primary px-4">{{ __('Save') }}</button>
                    @if (session('status') === 'profile-updated')
                        <p class="text-success mt-2">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>

        <!-- Update Password Section -->
        <div class="card p-4 shadow-sm mt-5">
            <h2 class="fw-bold mb-3 text-start">{{ __('Update Password') }}</h2>
            <p class="text-start">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="mb-3 text-start">
                    <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
                    <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                    @error('current_password')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 text-start">
                    <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
                    <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                    @error('password')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 text-start">
                    <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-start gap-3 mt-4">
                    <button type="submit" class="btn btn-primary px-4">{{ __('Save') }}</button>
                    @if (session('status') === 'password-updated')
                        <p class="text-success mt-2">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>

        <!-- Delete Account Section -->
        <div class="card p-4 shadow-sm mt-5">
            <h2 class="fw-bold mb-3 text-start text-danger">{{ __('Delete Account') }}</h2>
            <p class="text-start">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}</p>

            <div class="text-start mt-3">
                <button id="openDeleteModal" class="btn btn-danger">{{ __('Delete Account') }}</button>
            </div>
        </div>

        <!-- Bootstrap Modal -->
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold text-danger" id="deleteAccountModalLabel">{{ __('Delete Account') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>

                        <form method="post" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')

                            <p class="fw-bold text-start">{{ __('Are you sure you want to delete your account? Please enter your password to confirm.') }}</p>

                            <div class="mb-3 text-start">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" name="password" type="password" class="form-control" placeholder="Enter your password" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript to Trigger Modal Manually -->
    <script>
        document.getElementById('openDeleteModal').addEventListener('click', function () {
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteAccountModal'));
            deleteModal.show();
        });
    </script>
</x-profile-layout>
