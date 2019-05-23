function pageViews(articleId){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var viewId = 'view'+articleId;
    if(!$.cookie(viewId)){
        $.ajax({
            type: "POST",
            url: '/article/articleViews',
            dataType: "json",
            data: {article_id:articleId},
            error: function(msg) {
                return false;
            },
            success: function(res) {
                if (res.status) {
                    $.cookie(viewId, viewId,{ expires:1});
                } else {
                    return false;
                }
            }
        });
        return false;
    }else{
        return false;
    }
}
