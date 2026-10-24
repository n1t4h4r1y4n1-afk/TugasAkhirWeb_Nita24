<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event | Ticketify Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #7057f5; --primary-light: #9988fa; --bg: #f5f6fc; --border: #ececf5; }
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: var(--bg); 
            color: #252643; 
            font-size: 13px; 
            background-image: radial-gradient(circle at 10% 20%, rgba(112,87,245,0.05) 0%, transparent 20%), radial-gradient(circle at 90% 80%, rgba(112,87,245,0.05) 0%, transparent 20%);
        }
        
        .card-form { 
            background: rgba(255, 255, 255, 0.95); 
            backdrop-filter: blur(10px);
            border-radius: 24px; 
            border: 1px solid rgba(255, 255, 255, 0.8); 
            box-shadow: 0 10px 40px rgba(32,34,75,.06); 
            padding: 35px; 
            max-width: 850px; 
            margin: 40px auto; 
        }

        .form-label { font-weight: 700; font-size: 11px; color: #454761; margin-bottom: 8px; display: flex; align-items: center; gap: 5px; }
        .form-label i { color: var(--primary); font-size: 12px; }
        
        .form-control, .form-select { 
            font-size: 12px; 
            padding: 12px 15px; 
            border-radius: 12px; 
            border: 1px solid #e9e9f3; 
            background: #fafaff;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus { 
            border-color: var(--primary-light); 
            box-shadow: 0 0 0 4px rgba(112,87,245,.1); 
            background: white;
        }
        
        .upload-area {
            border: 2px dashed #d1cfff;
            border-radius: 14px;
            padding: 20px;
            text-align: center;
            background: #fafaff;
            cursor: pointer;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }
        .upload-area:hover { background: #f0edff; border-color: var(--primary); }
        .upload-area input[type="file"] { position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer; }
        .upload-icon { font-size: 30px; color: var(--primary-light); margin-bottom: 10px; }
        
        #imagePreview { max-width: 100%; max-height: 200px; border-radius: 10px; display: none; margin-top: 10px; object-fit: cover; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .current-banner { width: 100%; max-height: 200px; object-fit: cover; border-radius: 10px; border: 1px solid #e9e9f3; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }

        .btn-save { 
            background: linear-gradient(110deg, var(--primary), #8b65f6); 
            color: white; 
            border: none; 
            padding: 12px 25px; 
            border-radius: 12px; 
            font-weight: 800; 
            font-size: 12px; 
            transition: 0.3s;
            box-shadow: 0 7px 17px rgba(112,87,245,.25);
        }
        .btn-save:hover { color: white; transform: translateY(-2px); box-shadow: 0 11px 22px rgba(112,87,245,.35); }
        
        .btn-back { 
            background: white; 
            color: #454761; 
            border: 1px solid var(--border); 
            padding: 12px 20px; 
            border-radius: 12px; 
            font-weight: 800; 
            font-size: 12px; 
            transition: 0.3s;
        }
        .btn-back:hover { background: #f6f6fb; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="container">
    <div class="card-form">
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <div>
                <h4 class="fw-bold mb-1" style="font-size: 20px; letter-spacing: -0.5px;">Edit Event <span style="color: var(--primary);">✏️</span></h4>
                <p class="text-muted mb-0" style="font-size: 11px;">Perbarui informasi event <strong>{{ $event->title }}</strong>.</p>
            </div>
            <a href="{{ route('admin.events.index') }}" class="btn-back text-decoration-none">
                <i class="fa-solid fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger" style="border-radius: 12px; font-size: 12px; border: none; background: #fff0f1; color: #df5264;">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row g-4">
                <div class="col-md-8">
                    <label class="form-label"><i class="fa-solid fa-heading"></i> Nama Event <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label"><i class="fa-solid fa-tag"></i> Kategori <span class="text-danger">*</span></label>
                    <select name="category" class="form-select" required>
                        <option value="Concert & Music" {{ old('category', $event->category) == 'Concert & Music' ? 'selected' : '' }}>Concert & Music</option>
                        <option value="Seminar & Workshop" {{ old('category', $event->category) == 'Seminar & Workshop' ? 'selected' : '' }}>Seminar & Workshop</option>
                        <option value="Festival & Lifestyle" {{ old('category', $event->category) == 'Festival & Lifestyle' ? 'selected' : '' }}>Festival & Lifestyle</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label"><i class="fa-solid fa-location-dot"></i> Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="location" class="form-control" value="{{ old('location', $event->location) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><i class="fa-regular fa-calendar"></i> Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="event_date" class="form-control" value="{{ old('event_date', $event->event_date ? $event->event_date->format('Y-m-d') : '') }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><i class="fa-regular fa-clock"></i> Waktu <span class="text-danger">*</span></label>
                    <input type="time" name="event_time" class="form-control" value="{{ old('event_time', $event->event_time) }}" required>
                </div>

                <div class="col-12">
                    <label class="form-label"><i class="fa-solid fa-align-left"></i> Deskripsi Event <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="4" required>{{ old('description', $event->description) }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label"><i class="fa-regular fa-image"></i> Banner Saat Ini</label>
                    @if($event->banner)
                        <img src="{{ asset('storage/' . $event->banner) }}" alt="Banner" class="current-banner mb-3">
                    @else
                        <div class="text-muted mb-3" style="font-size: 11px;">Belum ada banner.</div>
                    @endif
                    
                    <label class="form-label">Ganti Banner (Opsional)</label>
                    <div class="upload-area">
                        <input type="file" name="banner" id="bannerInput" accept="image/*">
                        <div class="upload-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                        <div style="font-size: 11px; font-weight: 600; color: #454761;">Klik untuk ganti gambar</div>
                        <div style="font-size: 9px; color: #a0a2b8; margin-top: 5px;">Biarkan kosong jika tidak ingin mengubah</div>
                        <img id="imagePreview" src="" alt="Preview">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label"><i class="fa-solid fa-toggle-on"></i> Status Event <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="1" {{ old('status', $event->status) == '1' ? 'selected' : '' }}>Aktif (Tampil di Website)</option>
                        <option value="0" {{ old('status', $event->status) == '0' ? 'selected' : '' }}>Nonaktif (Sembunyikan)</option>
                    </select>
                </div>
            </div>

            <div class="mt-5 text-end">
                <button type="submit" class="btn-save">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Update Event
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Script untuk Preview Gambar Baru
    document.getElementById('bannerInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>