function pageViews(e){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}});var t="view"+e;return!$.cookie(t)&&($.ajax({type:"POST",url:"/article/articleViews",dataType:"json",data:{article_id:e},error:function(e){return!1},success:function(e){if(!e.status)return!1;$.cookie(t,t,{expires:1})}}),!1)}
