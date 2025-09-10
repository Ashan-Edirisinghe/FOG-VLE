@extends('layouts.app')


@section('title', 'Report Upload - Graduate Studies')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">


            <!-- Tabs -->
            <div class="tab-navigation">
                <a href="javascript:void(0)" class="tab-link active" id="semesterTab"><h5>Semester Report</h5></a>
                <a href="javascript:void(0)" class="tab-link" id="finalTab"><h5>Final Report</h5></a>
            </div>

            <!-- Semester Report Upload -->
            <div id="semesterReport" class="upload-section">
                <h5>Upload your Report</h5><br>
                <div class="upload-card">
                    <div class="upload-header">
                        <i class="fas fa-user"></i>
                        <span>Upload Script</span>
                    </div>
                    <div class="upload-body">
                        <p class="upload-instruction">Specify a script file to upload</p>
                        <div class="upload-area">
                            <div class="upload-content">
                                <p>Drag & Drop File</p>
                                <p>Or</p>
                                <button type="button" class="btn-browse" id="browseSemester">
                                    <i class="fas fa-folder"></i> BROWSE
                                </button>
                                <input type="file" id="semesterFile" style="display:none;" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                            </div>
                        </div>
                        <div class="upload-actions">
                            <button type="button" class="btn-action btn-next">NEXT</button>
                            <button type="button" class="btn-action btn-cancel">CANCEL</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Final Report Upload -->
            <div id="finalReport" class="upload-section" style="display:none;">
                <h5>Upload your Final Report</h5><br>
                <div class="upload-card">
                    <div class="upload-header">
                        <i class="fas fa-user"></i>
                        <span>Upload Script</span>
                    </div>
                    <div class="upload-body">
                        <p class="upload-instruction">Specify a script file to upload</p>
                        <div class="upload-area">
                            <div class="upload-content">
                                <p>Drag & Drop File</p>
                                <p>Or</p>
                                <button type="button" class="btn-browse" id="browseFinal">
                                    <i class="fas fa-folder"></i> BROWSE
                                </button>
                                <input type="file" id="finalFile" style="display:none;" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                            </div>
                        </div>
                        <div class="upload-actions">
                            <button type="button" class="btn-action btn-next">NEXT</button>
                            <button type="button" class="btn-action btn-cancel">CANCEL</button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@push('styles')
<style>

    .tab-navigation {
        background: #d0d0d0;
        padding: 15px 25px;
        display: flex;
        gap: 30px;
        padding-left: 20px;
        border-radius: 4px ;
    }

    .tab-link {
        color: #666;
        text-decoration: none;
        padding: 10px 15px;

        border-radius: 4px;
        font-weight: 500;
    }
    .tab-link.active {
        color: blue;
        font-weight: bold;
    }
    .upload-section {
        background: #d0d0d0;
        padding: 25px;
        margin-top: 10px;
        border-radius: 5px;
    }

    .upload-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .upload-header {
        background: #f8f9fa;
        padding: 15px 20px;
        border-bottom: 1px solid #e0e0e0;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
        color: #333;
    }

    .upload-body {
        padding: 25px;
    }
    .upload-instruction {
        margin-bottom: 20px;
        color: #666;
    }
    .upload-area {
        border: 2px dashed #ccc;
        border-radius: 8px;
        padding: 40px 20px;
        text-align: center;
        background: #f9f9f9;
        margin-bottom: 25px;
    }

    .upload-content p {
        margin: 5px 0;
        color: #666;
        font-size: 1rem;
    }

    .btn-browse {
        background: #333;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-browse:hover {
        background: blue;
    }
    .upload-actions {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
    }
    .btn-action {
        border: none;
        padding: 10px 25px;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-next {
        background: #d0d0d0;
        color: #666;
    }
    .btn-next:hover {
        background: blue;
        color: white;
    }
    .btn-cancel {
        background: #f8f9fa;
        color: #666;
        border: 1px solid #ddd;
    }

    .btn-cancel:hover {
        background: #e9ecef;
        color: #333;
    }
    .file-selected { border-color: green; }
</style>
@endpush

@push('scripts')
<script>
    const semesterTab = document.getElementById("semesterTab");
    const finalTab = document.getElementById("finalTab");
    const semesterReport = document.getElementById("semesterReport");
    const finalReport = document.getElementById("finalReport");

    // Tab switching
    semesterTab.addEventListener("click", () => {
        semesterTab.classList.add("active");
        finalTab.classList.remove("active");
        semesterReport.style.display = "block";
        finalReport.style.display = "none";
    });

    finalTab.addEventListener("click", () => {
        finalTab.classList.add("active");
        semesterTab.classList.remove("active");
        finalReport.style.display = "block";
        semesterReport.style.display = "none";
    });

    // File upload handlers
    function setupUpload(sectionId, fileInputId, browseBtnId) {
        const section = document.getElementById(sectionId);
        const fileInput = document.getElementById(fileInputId);
        const browseBtn = document.getElementById(browseBtnId);
        const uploadArea = section.querySelector('.upload-area');
        const uploadContent = section.querySelector('.upload-content');
        const nextBtn = section.querySelector('.btn-next');
        const cancelBtn = section.querySelector('.btn-cancel');

        // Browse button
        browseBtn.addEventListener("click", () => fileInput.click());

        // File input change
        fileInput.addEventListener("change", () => {
            if (fileInput.files.length > 0) {
                displaySelectedFile(fileInput.files[0]);
            }
        });

        // Drag and drop
        uploadArea.addEventListener("dragover", e => {
            e.preventDefault();
            uploadArea.style.borderColor = "#1e3c72";
        });
        uploadArea.addEventListener("dragleave", e => {
            e.preventDefault();
            uploadArea.style.borderColor = "#ccc";
        });
        uploadArea.addEventListener("drop", e => {
            e.preventDefault();
            uploadArea.style.borderColor = "#ccc";
            if (e.dataTransfer.files.length > 0) {
                fileInput.files = e.dataTransfer.files;
                displaySelectedFile(e.dataTransfer.files[0]);
            }
        });

        // Display selected file
        function displaySelectedFile(file) {
            uploadArea.classList.add("file-selected");
            uploadContent.innerHTML = `
                <p><i class="fas fa-file"></i> ${file.name}</p>
                <p class="file-name">File selected successfully!</p>
                <button type="button" class="btn-browse">
                    <i class="fas fa-folder"></i> CHANGE FILE
                </button>
            `;
            uploadContent.querySelector("button").addEventListener("click", () => fileInput.click());
        }

        // Next button
        nextBtn.addEventListener("click", () => {
            if (fileInput.files.length > 0) {
                alert("File uploaded successfully! Proceeding to next step...");
            } else {
                alert("Please select a file to upload first.");
            }
        });

        // Cancel button
        cancelBtn.addEventListener("click", () => {
            fileInput.value = "";
            uploadArea.classList.remove("file-selected");
            uploadContent.innerHTML = `
                <p>Drag & Drop File</p>
                <p>Or</p>
                <button type="button" class="btn-browse">
                    <i class="fas fa-folder"></i> BROWSE
                </button>
            `;
            uploadContent.querySelector("button").addEventListener("click", () => fileInput.click());
        });
    }

    // Apply to both sections
    setupUpload("semesterReport", "semesterFile", "browseSemester");
    setupUpload("finalReport", "finalFile", "browseFinal");

</script>
@endpush
@endsection
