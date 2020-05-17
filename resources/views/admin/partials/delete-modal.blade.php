<div class="modal modal-danger fade" id="delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="delete-modal-form">
                @csrf
                @method('DELETE')

                <div class="modal-body text-center">
                    <strong>{{ __('Are you sure you want to delete this ?') }}</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">{{ __('No') }}</button>
                    <button type="submit" class="btn btn-danger btn-outline ">{{ __('Yes, Delete') }}</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
