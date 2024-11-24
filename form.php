<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(to right, #6A0DAD, #8A2BE2);
        }

        h2 {
            text-align: center;
            color: #6A0DAD; /* Ungu */
            margin-bottom: 20px;
        }

        /* Form Styles */
        form {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        form label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #6A0DAD; /* Ungu */
        }

        form input, form textarea, form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        form input:focus, form textarea:focus {
            border-color: #6A0DAD; /* Ungu */
            outline: none;
        }

        form button {
            background-color: #6A0DAD; /* Ungu */
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #5A0C9A; /* Ungu lebih gelap */
        }
    </style>
</head>
<body>
    <form id="registrationForm" action="process.php" method="POST" enctype="multipart/form-data">
        <h2>Form Pendaftaran</h2>
        
        <label for="name">Nama (min. 3 karakter):</label>
        <input type="text" id="name" name="name" minlength="3" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="age">Umur:</label>
        <input type="number" id="age" name="age" min="17" max="100" required>

        <label for="bio">Biografi (min. 10 karakter):</label>
        <textarea id="bio" name="bio" minlength="10" required></textarea>

        <label for="file">Upload File (Text, max 2MB):</label>
        <input type="file" id="file" name="file" accept=".txt" required>

        <button type="submit">Submit</button>
    </form>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Client-side validation
            const name = document.getElementById('name').value;
            const bio = document.getElementById('bio').value;
            const file = document.getElementById('file').files[0];

            if (name.length < 3) {
                alert('Nama harus minimal 3 karakter');
                return;
            }

            if (bio.length < 10) {
                alert('Biografi harus minimal 10 karakter');
                return;
            }

            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file maksimal 2MB');
                    return;
                }
                if (file.type !== 'text/plain') {
                    alert('File harus berupa teks (.txt)');
                    return;
                }
            }

            this.submit();
        });
    </script>
</body>
</html>