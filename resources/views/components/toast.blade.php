@if(Session::has('message'))
    <div aria-live="polite" aria-atomic="true">
        <div class=" position-fixed  bottom-0 m-4" id="toastPlacement">
            <div id="add-meal"
                 class="toast fade show border-0 p-1
                 @if(Session::get('success')) text-bg-success
                 @else text-bg-danger
                 @endif()
                 ">
                <div class="d-flex">
                    <div class="toast-body">
                        {{Session::get('message')}}
                    </div>
                    <button type="button" class="btn-close btn-close-white ms-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
@endif
