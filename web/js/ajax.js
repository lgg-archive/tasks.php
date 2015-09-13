/**
 * Created by littleguga on 11.08.2015.
 */
function action(atype, e, obj){
    e.preventDefault();
    var url = false;
    switch(atype){
        case 'done':
            url = $(obj).attr('href');
            break;
        case 'delete':
            url = $(obj).attr('href');
            break;
        case 'kill':
            url = $(obj).attr('href');
            break;
        case 'restore':
            url = $(obj).attr('href');
            break;
        default:
            console.error('Error: unknown action given');
            break;
    }
    if(url){
        $.ajax({
            type: 'GET',
            url: url,
            success: function(resp) {
                $(obj).parent().parent().addClass('hide-animation');
                setTimeout(function(){
                    $(obj).parent().parent().remove();
                }, 700);
            },
            error: function() {
                console.error('Error: something going wrong');
            }
        });
    }
}

function refresh(obj){
    var tab = $(obj).attr('data-target');
    var target = $(obj).attr('href');
    $.ajax({
        type: 'GET',
        url: 'action.php?action=list&tab=' + tab,
        success: function(resp) {
            $('#tab-table-' + tab).html(resp);
        },
        error: function() {
            console.error('Error: something going wrong');
        }
    });
}


$(document).on('click', '.action-done', function(e){
    action('done', e, $(this));
});

$(document).on('click', '.action-delete', function(e){
    action('delete', e, $(this));
});

$(document).on('click', '.action-kill', function(e){
    action('kill', e, $(this));
});

$(document).on('click', '.action-restore', function(e){
    action('restore', e, $(this));
});

$(document).on('click', '.tabs-nav', function(e){
    refresh($(this));
});