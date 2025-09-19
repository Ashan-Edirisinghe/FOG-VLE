import React, { useState } from 'react';
import axios from 'axios';

const FinalSubmission = () => {
    const [formData, setFormData] = useState({
        title: '',
        description: '',
        file: null,
        submissionType: 'project',
        comments: '',
        teamMembers: '',
        supervisorName: '',
        submissionDate: new Date().toISOString().split('T')[0]
    });

    const [loading, setLoading] = useState(false);
    const [message, setMessage] = useState('');
    const [errors, setErrors] = useState({});
    const [preview, setPreview] = useState(null);

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: value
        }));
    };

    const handleFileChange = (e) => {
        const file = e.target.files[0];
        setFormData(prev => ({
            ...prev,
            file: file
        }));

        // Create preview for PDF files
        if (file && file.type === 'application/pdf') {
            const url = URL.createObjectURL(file);
            setPreview(url);
        } else {
            setPreview(null);
        }
    };

    const validateForm = () => {
        const errors = {};
        if (!formData.title.trim()) {
            errors.title = 'Title is required';
        }
        if (!formData.description.trim()) {
            errors.description = 'Description is required';
        }
        if (!formData.file) {
            errors.file = 'File is required';
        }
        return errors;
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setMessage('');
        setErrors({});

        const validationErrors = validateForm();
        if (Object.keys(validationErrors).length > 0) {
            setErrors(validationErrors);
            setLoading(false);
            return;
        }

        const data = new FormData();
        Object.keys(formData).forEach(key => {
            data.append(key, formData[key]);
        });

        try {
            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            
            const response = await axios.post('/api/final-submission', data, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            setMessage('Submission successful!');
            setFormData({
                title: '',
                description: '',
                file: null,
                comments: ''
            });
        } catch (error) {
            setMessage('Error submitting your work. Please try again.');
            console.error('Submission error:', error);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="container py-5">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header bg-primary text-white">
                            <h3 className="mb-0">Final Project Submission - FOG System</h3>
                            <p className="small mb-0">Submitted by: Himaya</p>
                        </div>
                        <div className="card-body">
                            {message && (
                                <div className={`alert ${message.includes('Error') ? 'alert-danger' : 'alert-success'}`}>
                                    {message}
                                </div>
                            )}
                            
                            <form onSubmit={handleSubmit}>
                                <div className="form-group mb-3">
                                    <label htmlFor="title">Project Title</label>
                                    <input
                                        type="text"
                                        className="form-control"
                                        id="title"
                                        name="title"
                                        value={formData.title}
                                        onChange={handleInputChange}
                                        required
                                    />
                                </div>

                                <div className="form-group mb-3">
                                    <label htmlFor="description">Project Description</label>
                                    <textarea
                                        className="form-control"
                                        id="description"
                                        name="description"
                                        rows="4"
                                        value={formData.description}
                                        onChange={handleInputChange}
                                        required
                                    ></textarea>
                                </div>

                                <div className="form-group mb-3">
                                    <label htmlFor="submissionType">Submission Type</label>
                                    <select
                                        className="form-control"
                                        id="submissionType"
                                        name="submissionType"
                                        value={formData.submissionType}
                                        onChange={handleInputChange}
                                    >
                                        <option value="project">Project (ZIP)</option>
                                        <option value="document">Document (PDF)</option>
                                        <option value="presentation">Presentation</option>
                                    </select>
                                </div>

                                <div className="form-group mb-3">
                                    <label htmlFor="teamMembers">Team Members</label>
                                    <textarea
                                        className="form-control"
                                        id="teamMembers"
                                        name="teamMembers"
                                        value={formData.teamMembers}
                                        onChange={handleInputChange}
                                        placeholder="Enter team member names (one per line)"
                                        rows="2"
                                    ></textarea>
                                </div>

                                <div className="form-group mb-3">
                                    <label htmlFor="supervisorName">Supervisor Name</label>
                                    <input
                                        type="text"
                                        className="form-control"
                                        id="supervisorName"
                                        name="supervisorName"
                                        value={formData.supervisorName}
                                        onChange={handleInputChange}
                                        placeholder="Enter your supervisor's name"
                                    />
                                </div>

                                <div className="form-group mb-3">
                                    <label htmlFor="submissionDate">Submission Date</label>
                                    <input
                                        type="date"
                                        className="form-control"
                                        id="submissionDate"
                                        name="submissionDate"
                                        value={formData.submissionDate}
                                        onChange={handleInputChange}
                                    />
                                </div>

                                <div className="form-group mb-3">
                                    <label htmlFor="file">
                                        {formData.submissionType === 'project' ? 'Project Files (ZIP)' :
                                         formData.submissionType === 'document' ? 'Document (PDF)' :
                                         'Presentation Files'}
                                    </label>
                                    <input
                                        type="file"
                                        className="form-control"
                                        id="file"
                                        name="file"
                                        accept={
                                            formData.submissionType === 'project' ? '.zip' :
                                            formData.submissionType === 'document' ? '.pdf' :
                                            '.ppt,.pptx'
                                        }
                                        onChange={handleFileChange}
                                        required
                                    />
                                    <small className="text-muted">
                                        {formData.submissionType === 'project' ? 'Please upload a ZIP file containing your project files' :
                                         formData.submissionType === 'document' ? 'Please upload your document in PDF format' :
                                         'Please upload your presentation in PPT or PPTX format'}
                                    </small>
                                </div>

                                <div className="form-group mb-3">
                                    <label htmlFor="comments">Additional Comments</label>
                                    <textarea
                                        className="form-control"
                                        id="comments"
                                        name="comments"
                                        rows="3"
                                        value={formData.comments}
                                        onChange={handleInputChange}
                                    ></textarea>
                                </div>

                                <div className="d-flex justify-content-between align-items-center">
                                    <button
                                        type="submit"
                                        className="btn btn-primary px-4"
                                        disabled={loading}
                                    >
                                        {loading ? (
                                            <>
                                                <span className="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                                Submitting...
                                            </>
                                        ) : (
                                            <>
                                                <i className="fas fa-paper-plane me-2"></i>
                                                Submit Project
                                            </>
                                        )}
                                    </button>
                                    <button
                                        type="button"
                                        className="btn btn-outline-secondary"
                                        onClick={() => setFormData({
                                            title: '',
                                            description: '',
                                            file: null,
                                            submissionType: 'project',
                                            comments: ''
                                        })}
                                    >
                                        <i className="fas fa-redo me-2"></i>
                                        Reset Form
                                    </button>
                                </div>
                                {message && (
                                    <div className={`alert mt-3 ${message.includes('Error') ? 'alert-danger' : 'alert-success'} d-flex align-items-center`}>
                                        <i className={`fas fa-${message.includes('Error') ? 'exclamation-circle' : 'check-circle'} me-2`}></i>
                                        {message}
                                    </div>
                                )}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default FinalSubmission;
