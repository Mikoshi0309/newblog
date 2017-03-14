var highlightindex = -1; //高亮设置（-1为不高亮）
//自动完成
function AutoComplete(auto, search) {
    if ($("#" + search).val() != "") {
        var autoNode = $("#" + auto); //缓存对象（弹出框）
        var carlist = new Array();
        var n = 0;
        var mylist = [];
        var maxTipsCounts = 8 // 最大显示条数
        var aj = $.ajax({
            url: '/ajaxsearch' + "/" + $("#" + search).val(), // 跳转到后台
            data: {},
            type: 'get',
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.error == "0") {
                    mylist = data.info;

                    if (mylist == null) {
                        autoNode.hide();
                        return;
                    }
                    autoNode.empty(); //清空上次的记录
                    for (i in mylist) {
                        if (i < maxTipsCounts) {
                            var wordNode = mylist[i]; //弹出框里的每一条内容
                            var newDivNode = $("<div>").attr("id", i); //设置每个节点的id值

                            //document.querySelector("#auto_div").style.width = $("#search_text").outerWidth(true) + 'px'; //设置提示框与输入框宽度一致
                            document.querySelector("#auto_div").style.width = '220px';
                            newDivNode.attr("style", "font:14px/25px arial;height:25px;padding:0 8px;cursor: pointer;");
                            newDivNode.html(wordNode.title).appendTo(autoNode); //追加到弹出框
                            //鼠标移入高亮，移开不高亮
                            newDivNode.mouseover(function() {
                                if (highlightindex != -1) { //原来高亮的节点要取消高亮（是-1就不需要了）
                                    autoNode.children("div").eq(highlightindex).css("background-color", "white");
                                }
                                //记录新的高亮节点索引
                                highlightindex = $(this).attr("id");
                                $(this).css("background-color", "#ebebeb");
                            });
                            newDivNode.mouseout(function() {
                                $(this).css("background-color", "white");
                            });
                            //鼠标点击文字上屏
                            newDivNode.click(function() {
                                //取出高亮节点的文本内容
                                var comText = autoNode.hide().children("div").eq(highlightindex).text();
                                highlightindex = -1;
                                //文本框中的内容变成高亮节点的内容
                                $("#" + search).val(comText);
                                $("#search-form").submit();
                            })
                            if (mylist.length > 0) { //如果返回值有内容就显示出来
                                autoNode.show();
                            } else { //服务器端无内容返回 那么隐藏弹出框

                                autoNode.hide();
                                //弹出框隐藏的同时，高亮节点索引值也变成-1
                                highlightindex = -1;
                            }
                        }
                    }
                }
            }
        });
    }
}

