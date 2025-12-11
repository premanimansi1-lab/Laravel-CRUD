<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #4f46e5, #a151ec);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 480px;
        }

        .card {
            background: #fff;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.66s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #4f46e5;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
            display: block;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4f46e5;
            border: none;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background: #4338ca;
        }

        .preview {
            margin-top: 10px;
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
            display: none;
        }

    </style>
</head>
<body>

    

    <div class="container">
        @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif
        <div class="card">
            <h2>Add Student</h2>


            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth" required>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" id="imageInput" name="image" accept="image/*">
                    <img id="previewImg" class="preview" />
                </div>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        // Image Preview
        const imageInput = document.getElementById('imageInput');
        const previewImg = document.getElementById('previewImg');

        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                previewImg.src = URL.createObjectURL(file);
                previewImg.style.display = 'block';
            }
        });
    </script>

</body>
</html>