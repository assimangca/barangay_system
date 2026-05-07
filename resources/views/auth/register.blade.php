<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white w-full max-w-md p-8 rounded-xl shadow">
    <h1 class="text-2xl font-bold text-center text-blue-900">Barangay System</h1>
    <p class="text-center text-gray-600 mb-6">Create admin account</p>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Role</label>
            <select id="role" name="role" class="w-full border rounded px-3 py-2" required>
                <option value="">Select Role</option>
                <option value="captain">Captain</option>
               
                <option value="secretary">Secretary</option>
            </select>
        </div>

        <div id="admin-key-field" class="mb-4 hidden">
            <label class="block mb-1 font-medium">Admin Registration Key</label>
            <input type="password" name="admin_key" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-6">
            <label class="block mb-1 font-medium">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded">
            Register
        </button>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
            Already have an account?
        </a>
    </div>
</div>

<script>
    const roleSelect = document.getElementById('role');
    const adminKeyField = document.getElementById('admin-key-field');
    const adminKeyInput = adminKeyField.querySelector('input');

    roleSelect.addEventListener('change', function () {
        if (this.value) {
            adminKeyField.classList.remove('hidden');
            adminKeyInput.setAttribute('required', 'required');
        } else {
            adminKeyField.classList.add('hidden');
            adminKeyInput.removeAttribute('required');
            adminKeyInput.value = '';
        }
    });
</script>

</body>
</html>