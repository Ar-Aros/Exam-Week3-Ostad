<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .confirmation-container {
            background: #fff;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0px 6px 20px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 650px;
        }
        .confirmation-title {
            color: #28a745;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .file-preview {
            max-width: 200px;
            max-height: 200px;
            border-radius: .5rem;
            margin-top: 10px;
            box-shadow: 0px 3px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="confirmation-container text-center">
        <h2 class="confirmation-title">🎉 Submission Successful!</h2>

        {{-- Check if cookie exists --}}
        @if(Cookie::get('file_uploaded') === 'true')
            <div class="alert alert-success text-start">
                ✅ File uploaded successfully!
            </div>
        @endif

        @if($data)
            <div class="text-start mb-4">
                <p><strong>Name:</strong> {{ $data['name'] }}</p>
                <p><strong>Email:</strong> {{ $data['email'] }}</p>
                <p><strong>Message:</strong> {{ $data['message'] }}</p>

                @if(isset($data['attachment']))
                    <p><strong>Uploaded File:</strong></p>
                    @php
                        $filePath = asset('storage/' . $data['attachment']);
                        $extension = pathinfo($data['attachment'], PATHINFO_EXTENSION);
                    @endphp

                    @if(in_array(strtolower($extension), ['jpg','jpeg','png','gif']))
                        {{-- Show image preview --}}
                        <img src="{{ $filePath }}" alt="Uploaded Image" class="file-preview">
                    @else
                        {{-- Show link for non-image files --}}
                        <a href="{{ $filePath }}" target="_blank" class="btn btn-outline-secondary">
                            View File
                        </a>
                    @endif
                @endif
            </div>
        @else
            <div class="alert alert-danger">No data found!</div>
        @endif

        <a href="{{ route('form.form') }}" class="btn btn-primary w-100">Back to Form</a>
    </div>

    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
