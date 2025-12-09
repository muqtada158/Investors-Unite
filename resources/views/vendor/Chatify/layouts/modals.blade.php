<style>
    /* Common styles for all screen sizes */
    .app-modal-card {
        width: 90%;
        margin: 0 auto;
        max-width: 400px;
    }

    .app-modal-body,
    .app-modal-footer {
        padding: 10px;
    }

    .app-modal-header,
    .app-modal-body,
    .app-modal-footer {
        font-size: 14px;
        line-height: 1.5;
    }

    .app-btn {
        display: inline-block;
        padding: 8px 16px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        text-decoration: none;
        cursor: pointer;
    }

    .app-btn.cancel {
        background-color: #f0f0f0;
        color: #333;
    }

    .app-btn.delete {
        background-color: #f44336;
        color: #fff;
    }

    /* Responsive adjustments for small screens */
    @media (max-width: 320) {
        .app-modal-card {
            align-items: center;
            justify-content: center;
            width: 50%;
            max-width: 50%;
            height: 40%;
            margin: 0 auto;
            top: 30%;
            border-radius: 5px;
        }
    }

    @media (max-width: 425) {
        .app-modal-card {
            align-items: center;
            justify-content: center;
            width: 50%;
            max-width: 50%;
            height: 28%;
            margin: 0 auto;
            top: 30%;
            border-radius: 5px;
        }
    }

    @media (max-width: 576px) {
        .app-modal-card {
            align-items: center;
            justify-content: center;
            width: 50%;
            max-width: 50%;
            height: 28%;
            margin: 0 auto;
            top: 25%;
            border-radius: 5px;
        }
    }

    /* Responsive adjustments for medium screens */
    @media (min-width: 577px) and (max-width: 992px) {
        .app-modal-card {
            align-items: center;
            justify-content: center;
            width: 50%;
            max-width: 50%;
            height: 30%;
            margin: 0 auto;
            top: 25%;
            border-radius: 5px;
        }
    }

    /* Responsive adjustments for larger screens */
    @media (min-width: 993px) {
        .app-modal-card {
            width: 70%;
            /* Adjust as needed */
        }
    }
</style>
{{-- ---------------------- Image modal box ---------------------- --}}
<div id="imageModalBox" class="imageModal">
    <span class="imageModal-close">&times;</span>
    <img class="imageModal-content" id="imageModalBoxSrc">
</div>

{{-- ---------------------- Delete Modal ---------------------- --}}
<div class="app-modal" data-name="delete">
    <div class="app-modal-container">
        <div class="app-modal-card" data-name="delete" data-modal='0'>
            <div class="app-modal-header">Are you sure you want to delete this?</div>
            <div class="app-modal-body">You cannot undo this action...</div>
            <div class="app-modal-footer">
                <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
                <a href="javascript:void(0)" class="app-btn a-btn-danger delete">Delete</a>
            </div>
        </div>
    </div>
</div>
{{-- ---------------------- Alert Modal ---------------------- --}}
<div class="app-modal" data-name="alert">
    <div class="app-modal-container">
        <div class="app-modal-card" data-name="alert" data-modal='0'>
            <div class="app-modal-header"></div>
            <div class="app-modal-body"></div>
            <div class="app-modal-footer">
                <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
            </div>
        </div>
    </div>
</div>
{{-- ---------------------- Settings Modal ---------------------- --}}
<div class="app-modal" data-name="settings">
    <div class="app-modal-container">
        <div class="app-modal-card" data-name="settings" data-modal='0'>
            <form id="update-settings" action="{{ route('avatar.update') }}" enctype="multipart/form-data"
                method="POST">
                @csrf
                {{-- <div class="app-modal-header">Update your profile settings</div> --}}
                <div class="app-modal-body">
                    {{-- Udate profile avatar --}}
                    <div class="avatar av-l upload-avatar-preview chatify-d-flex"
                        style="background-image: url('{{ Chatify::getUserWithAvatar(Auth::guard('member')->user())->avatar }}');">
                    </div>
                    <p class="upload-avatar-details"></p>
                    <label class="app-btn a-btn-primary update" style="background-color:{{ $messengerColor }}">
                        Upload New
                        <input class="upload-avatar chatify-d-none" accept="image/*" name="avatar" type="file" />
                    </label>
                    {{-- Dark/Light Mode  --}}
                    <p class="divider"></p>
                    <p class="app-modal-header">Dark Mode <span
                            class="
                        {{ Auth::guard('member')->user()->dark_mode > 0 ? 'fas' : 'far' }} fa-moon dark-mode-switch"
                            data-mode="{{ Auth::guard('member')->user()->dark_mode > 0 ? 1 : 0 }}"></span></p>
                    {{-- change messenger color  --}}
                    <p class="divider"></p>
                    {{-- <p class="app-modal-header">Change {{ config('chatify.name') }} Color</p> --}}
                    <div class="update-messengerColor">
                        @foreach (config('chatify.colors') as $color)
                            <span style="background-color: {{ $color }}" data-color="{{ $color }}"
                                class="color-btn"></span>
                            @if (($loop->index + 1) % 5 == 0)
                                <br />
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="app-modal-footer">
                    <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
                    <input type="submit" class="app-btn a-btn-success update" value="Save Changes" />
                </div>
            </form>
        </div>
    </div>
</div>
