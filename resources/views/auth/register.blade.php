<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Register</h1>
    <form id="registerForm">
        <input type="text" id="name" placeholder="Name" required>
        <input type="email" id="email" placeholder="Email" required>
        <input type="password" id="password" placeholder="Password" required>
        <input type="password" id="password_confirmation" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            axios.post('/api/register', {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                password_confirmation: document.getElementById('password_confirmation').value
            })
            .then(response => {
                alert('Registration successful');
                window.location.href = '/login';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Registration failed');
            });
        });
    </script>
</body>
</html>
