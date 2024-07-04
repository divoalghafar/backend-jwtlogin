<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Login</h1>
    <form id="loginForm">
        <input type="email" id="email" placeholder="Email" required>
        <input type="password" id="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            axios.post('/api/login', {
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            })
            .then(response => {
                alert('Login successful');
                window.location.href = '/dashboard';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Login failed');
            });
        });
    </script>
</body>
</html>
