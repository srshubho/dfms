@extends('admin.layouts.default')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Settings
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            User Settings
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h2 class="text-gray-700 dark:text-gray-400">Change your password here</h2> <br>
            <form action="{{ route('admin.change-password') }}" method="POST" id="checkNewPass">
                {{ csrf_field() }}

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Current Password</span>
                    <input type="password" name="password" id="password" value="{{ old('password') ? old('password') : '' }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Enter Current Password" />
                    @error('password')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                    <p style="color: red;" id="passMessage"></p>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">New Password</span>
                    <input type="password" name="newPassword" id="newPassword" value="{{ old('newPassword') ? old('newPassword') : '' }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Enter New Password" />
                    @error('newPassword')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                    <p style="color: red;" id="newPassMessage"></p>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Confirm Password</span>
                    <input type="password" name="confirmNewpassword" id="confirmNewpassword"
                        value="{{ old('confirmNewpassword') ? old('confirmNewpassword') : '' }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Enter Confirm Password" />
                    @error('confirmNewpassword')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                    <p style="color: red;" id="confirmPassMessage"></p>
                </label>

                <div class="flex items-center justify-between ">
                    <div></div>
                    <button
                        class="mt-6 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <span>Update Password</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#checkNewPass").submit(function() {
                var pass = $('#password').val();
                var newPass = $('#newPassword').val();
                var confirmNewpass = $('#confirmNewpassword').val();
                if (pass == '' || newPass == '' || confirmNewpass == '') {
                    $("#passMessage").text("Must be filled");
                    $("#newPassMessage").text("Must be filled");
                    $("#confirmPassMessage").text("Must be filled");
                    return false;
                }
                if (pass.length < 5) {
                    $("#passMessage").text("Must be more than 5 charcter");
                    return false;
                }
                if (newPass.length < 5) {
                    $("#newPassMessage").text("Must be more than 5 charcter");
                    return false;
                }
                if (confirmNewpass.length < 5) {
                    $("#confirmPassMessage").text("Must be more than 5 charcter");
                    return false;
                }
                if (newPass != confirmNewpass) {
                    $("#confirmPassMessage").text("New Password and Confirm New Password doesn\'t match");
                    return false;
                }
            });
        });
    </script>
@endpush
