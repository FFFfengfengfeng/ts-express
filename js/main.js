/*
 * =====================================================
 * PlugName: Page
 * 分页器
 * =====================================================
 */
+ function (window, $) {
    'use strict';

    //默认参数
    var defaults = {
        size : 0,  //每页显示数据
        total: 0,  //数据总数
    };

    /*
     * 构造函数
     * @param element{jQuery对象}
     * @param options{配置对象}
     */
    function Page(element, options) {
        this.$element = $(element);
        this.options  = $.extend(defaults, options || {});
        this.init();
    }
    
    Page.prototype.init = function () {
        
    }

    Page.prototype.creatDom = function () {
        var _this   = this,
            options = _this.options,
            total   = parseInt(options.total),
            size    = parseInt(options.size),
            pageNum = Math.ceil(total / size);
        for (var i = 0; i < pageNum; i ++) {

        }
    }


}(window, jQuery);