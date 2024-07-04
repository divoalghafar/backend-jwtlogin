<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Dashboard</h1>
    <p>Welcome to your dashboard</p>
    <button id="logoutBtn">Logout</button>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('logoutBtn').addEventListener('click', function() {
            axios.post('/api/logout', {}, {
                headers: {
                    'Authorization': 'Bearer ' + getCookie('token')
                }
            })
            .then(response => {
                document.cookie = 'token=; Max-Age=0';
                window.location.href = '/login';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Logout failed');
            });
        });

        function getCookie(name) {
            let value = "; " + document.cookie;
            let parts = value.split("; " + name + "=");
            if (parts.length == 2) return parts.pop().split(";").shift();
        }
    </script>
</body>
</html>
