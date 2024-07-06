@extends('admin.layout.master')

@section('title', 'Profile Info')

@push('styles')
<style>
    .profile-image {
        max-width: 300px;
        border-radius: 50%;
    }
    .image-upload-btn {
        display: none;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded table-darkBGImg">
                <div class="card-body">
                    <div class="col-sm-8">
                        <h3 class="text-white upgrade-info mb-0"> Manage <span class="fw-bold">User Information</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Profile</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group text-center">
                                <img src="{{ asset('assets/images/default/user.png') }}" alt="User Image" class="profile-image img-thumbnail" id="profileImage">
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('imageUpload').click()">Change Image</button>
                                    <input type="file" id="imageUpload" class="image-upload-btn" accept="image/*" onchange="previewImage(event)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name" value="{{ $user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact" placeholder="Enter your contact number">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email" value="{{ $user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="designation" placeholder="Enter your designation">
                            </div>
                            <div class="form-group">
                                <label for="organization">Organization (School/Job Place)</label>
                                <input type="text" class="form-control" id="organization" placeholder="Enter your organization">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" rows="5" placeholder="Enter your address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Account Status</label>
                                <select class="form-control" id="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profileImage');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush
