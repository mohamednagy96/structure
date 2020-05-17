require('./bootstrap');


try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap3');
} catch (e) {}

require('admin-lte/bower_components/select2/dist/js/select2.full');
require('admin-lte');
require('ckeditor');
require('jstree');
// require('chart.js');
// require('bootstrap-datepicker');

require('jquery-validation');

$('form.required').validate();

/**
 * delete modal
 */
$('.delete-modal-btn').click(function () {
    $('#delete-modal').modal('show');
    $('#delete-modal-form').attr('action', $(this).data('url'));
});

$('.select2').select2();


/**
 * ickeck
 */
//check all
$('.checkAll').on('click', function () {
    if ($(this).is(':checked')) {
        $(".icheck[data-group-id='" + $(this).data('group-id') + "']").prop('checked', true);
    } else {
        $(".icheck[data-group-id='" + $(this).data('group-id') + "']").prop('checked', false);
    }
});
$('.checkAll').each(function (i, obj) {
    var childLength = $(".icheck[data-group-id='" + $(this).data('group-id') + "']").length;
    var checkedChildLength = $(".icheck[data-group-id='" + $(this).data('group-id') + "']:checked").length;
    if (childLength == checkedChildLength) {
        $(this).prop('checked', true);
    }
});

/**
 * alert
 */
$('.hide-5s').delay(5000).fadeOut('slow');

/**
 * generate password
 */
$('.show-password').click(function () {
    $('.show-password i').toggleClass('fa-eye fa-eye-slash');
    $('.password').toggleAttr('type', 'password', 'text');
});

$('.generate-password').click(function () {
    var field = $('.password');
    field.val(randString(field));
});


/**
 * js tree for categories
 */
$('#jstree')
    .on('changed.jstree', function (e, data) {
        var i, j, node;
        for(i = 0, j = data.selected.length; i < j; i++) {
            node = data.instance.get_node(data.selected[i]);
        }

        $('#parent-id-input').val(node.id);

    })
    .jstree({
        'core': {
            'data': $('#jstree').data('core'),
            'multiple': false
        }
    });

$('#parent-category-btn').click(function(){
    $('#jstree').jstree("deselect_all");
    $('#parent-id-input').val('');
});

